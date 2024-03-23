// TimetableComponent.jsx
import React, { useState, useEffect } from 'react';
import './TimetableComponent.css'; // Import your custom styles if needed

const TimetableComponent = () => {
  const [timetableData, setTimetableData] = useState([]);

  useEffect(() => {
    fetchDataFromLaravel();
  }, []);

  const fetchDataFromLaravel = async () => {
    try {
      const response = await fetch('http://127.0.0.1:8000/api/timetables');
      if (!response.ok) {
        throw new Error(`Error: ${response.status} ${response.statusText}`);
      }
      const data = await response.json();
      setTimetableData(data);
    } catch (error) {
      console.error('Error fetching timetable data:', error.message);
    }
  };

  const daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  const hoursOfDay = Array.from({ length: 11 }, (_, index) => index + 8);

  const renderedCells = {}; // To keep track of rendered cells for each session

  return (
    <div className="timetable-container">
      <table className="timetable-table">
        <thead>
          <tr>
            <th></th>
            {hoursOfDay.map((hour, hourIndex) => (
              <th key={hourIndex}>{`${hour}:30`}</th>
            ))}
          </tr>
        </thead>
        <tbody>
          {daysOfWeek.map((day, dayIndex) => (
            <tr key={dayIndex}>
              <td className="timetable-cell day">{day}</td>
              {hoursOfDay.map((hour, hourIndex) => {
                const startTime = `${String(hour).padStart(2, '0')}:30:00`;
                const endTime = `${String(hour + 1).padStart(2, '0')}:30:00`;

                const timetableEntries = timetableData.filter(
                  (entry) =>
                    entry.day === day &&
                    entry.start_time + 1 <= endTime &&
                    entry.end_time >= startTime
                );

                if (timetableEntries.length === 0) {
                  return <td key={`${day}-${hour}`} className="timetable-cell"></td>;
                }

                const sessionKey = `${day}-${timetableEntries[0].subject}`;

                if (renderedCells[sessionKey]) {
                  return null;
                }

                const colSpan = calculateColSpan(timetableEntries[0]);

                renderedCells[sessionKey] = true;

                return (
                  <td
                    key={`${day}-${hour}`}
                    className={`timetable-cell filled`}
                    colSpan={colSpan}
                  >
                    <div>
                      <strong>{timetableEntries[0].subject}</strong>
                      <p>{timetableEntries[0].professor}</p>
                      <p>{timetableEntries[0].room}</p>
                    </div>
                  </td>
                );
              })}
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

// Helper function to calculate colSpan based on session start and end times
const calculateColSpan = (session, startTime) => {
  const startHour = parseInt(session.start_time.split(':')[0]);
  const startMinute = parseInt(session.start_time.split(':')[1]);
  const endHour = parseInt(session.end_time.split(':')[0]);
  const endMinute = parseInt(session.end_time.split(':')[1]);

  const startMinutes = startHour * 60 + startMinute;
  const endMinutes = endHour * 60 + endMinute;

  const colSpan = Math.max((endMinutes - Math.max(startMinutes)) / 30, 0);

  return colSpan - 1;
};


export default TimetableComponent;
