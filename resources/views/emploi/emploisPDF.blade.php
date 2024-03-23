<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 mx-autoA">
        <div class=" from-green-200 to-blue-200 rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full border border-gray-300 mx-auto" border="1px">
                <thead class="bg-gradient-to-r from-blue-300 to-indigo-500">
                    <tr>
                        <th class="py-3 px-4 border-b text-left text-white"></th>
                        @for ($i = 8; $i <= 18; $i++)
                            @php
                                $start = sprintf('%02d:00', $i);
                                $end = sprintf('%02d:00', $i + 1);
                            @endphp
                            <th class="py-3 px-4 border-b text-left text-white">{{ $start }} -
                                {{ $end }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-3 px-4 border-b">Lundi</td>
                        @for ($i = 8; $i <= 18; $i++)
                            <td class="py-3 px-4 border-b lundi">
                                @foreach ($seances as $seance)
                                    @php
                                        $dayOfWeek = date('N', strtotime($seance->dateSeance));
                                    @endphp
                                    @if (
                                        $dayOfWeek == '1' &&
                                            $seance->heureDebut <= sprintf('%02d:00:00', $i) &&
                                            $seance->heureFin > sprintf('%02d:00:00', $i))
                                        <span style="background-color: aqua">
                                            {{ $seance->heureDebut }}
                                            {{ $seance->heureFin }}
                                            {{ $seance->matiere->nom }}
                                            {{ $seance->professeur->nomprof }}
                                            {{ $seance->groupe->nom }}</span>
                                        @if (substr($seance->heureFin, -2) == '30')
                                            <style>
                                                .py-3:last-child span {
                                                    width: 50%;
                                                }
                                            </style>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                    <tr>
                        <td class="py-3 px-4 border-b">Mardi</td>
                        @for ($i = 8; $i <= 18; $i++)
                            <td class="py-3 px-4 border-b">
                                @foreach ($seances as $seance)
                                    @php
                                        $dayOfWeek = date('N', strtotime($seance->dateSeance));
                                    @endphp
                                    @if (
                                        $dayOfWeek == '2' &&
                                            $seance->heureDebut <= sprintf('%02d:00:00', $i) &&
                                            $seance->heureFin > sprintf('%02d:00:00', $i))
                                        <span style="background-color: red">{{ $seance->matiere->nom }}
                                            {{ $seance->professeur->nomprof }}
                                            {{ $seance->groupe->nom }}</span>
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                    <tr>
                        <td class="py-3 px-4 border-b">Mercredi</td>
                        @for ($i = 8; $i <= 18; $i++)
                            <td class="py-3 px-4 border-b">
                                @foreach ($seances as $seance)
                                    @php
                                        $dayOfWeek = date('N', strtotime($seance->dateSeance));
                                    @endphp
                                    @if (
                                        $dayOfWeek == '3' &&
                                            $seance->heureDebut <= sprintf('%02d:00:00', $i) &&
                                            $seance->heureFin > sprintf('%02d:00:00', $i))
                                        <span style="background-color: red">{{ $seance->matiere->nom }}
                                            {{ $seance->professeur->nomprof }}
                                            {{ $seance->groupe->nom }}</span>
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                    <tr>
                        <td class="py-3 px-4 border-b">Jeudi</td>
                        @for ($i = 8; $i <= 18; $i++)
                            <td class="py-3 px-4 border-b">
                                @foreach ($seances as $seance)
                                    @php
                                        $dayOfWeek = date('N', strtotime($seance->dateSeance));
                                    @endphp
                                    @if (
                                        $dayOfWeek == '4' &&
                                            $seance->heureDebut <= sprintf('%02d:00:00', $i) &&
                                            $seance->heureFin > sprintf('%02d:00:00', $i))
                                        <span style="background-color: red">{{ $seance->matiere->nom }}
                                            {{ $seance->professeur->nomprof }}
                                            {{ $seance->groupe->nom }}</span>
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                    <tr>
                        <td class="py-3 px-4 border-b">Vendredi</td>
                        @php
                            $previousContent = null;
                            $colspan = 1;
                        @endphp
                        @for ($i = 8; $i <= 18; $i++)
                            @php
                                $content = '';
                            @endphp
                            @foreach ($seances as $seance)
                                @php
                                    $dayOfWeek = date('N', strtotime($seance->dateSeance));
                                @endphp
                                @if (
                                    $dayOfWeek == '5' &&
                                        ($seance->heureDebut <= sprintf('%02d:00:00', $i) ||$seance->heureDebut <= sprintf('%02d:30:00', $i))
                                         &&
                                        $seance->heureFin > sprintf('%02d:00:00', $i))
                                    @php
                                        $content .=
                                            $seance->heureDebut .
                                            ' ' .
                                            $seance->heureFin .
                                            ' ' .
                                            $seance->matiere->nom .
                                            ' ' .
                                            $seance->professeur->nomprof .
                                            ' ' .
                                            $seance->local->nom .
                                            '';
                                    @endphp
                                @endif
                            @endforeach
                            @if ($content !== $previousContent)
                                @if ($previousContent !== null)
                                    <td class="py-3 px-4 border-b seance" colspan="{{ $colspan }}">
                                        @if (!empty($previousContent))
                                        <style>
                                            .seance{
                                                background-color: rgb(228, 241, 252);
                                                border: 1px black solid
                                            }
                                        </style>
                                            <span>{{ $previousContent }}</span>
                                        @endif
                                    </td>
                                @endif
                                @php
                                    $previousContent = $content;
                                    $colspan = 1;
                                @endphp
                            @else
                                @php
                                    $colspan++;
                                @endphp
                            @endif
                        @endfor
                        @if ($previousContent !== null)
                            <td class="py-3 px-4 border-b" colspan="{{ $colspan }}">
                                @if (!empty($previousContent))
                                    <span>{{ $previousContent }}</span>
                                @endif
                            </td>
                        @endif
                    </tr>


                    <tr>
                        <td class="py-3 px-4 border-b">Samedi</td>
                        @for ($i = 8; $i <= 18; $i++)
                            <td class="py-3 px-4 border-b">
                                @foreach ($seances as $seance)
                                    @php
                                        $dayOfWeek = date('N', strtotime($seance->dateSeance));
                                    @endphp
                                    @if (
                                        $dayOfWeek == '6' &&
                                            $seance->heureDebut <= sprintf('%02d:00:00', $i) &&
                                            $seance->heureFin > sprintf('%02d:00:00', $i))
                                        <span style="background-color: red">{{ $seance->matiere->nom }}
                                            {{ $seance->professeur->nomprof }}
                                            {{ $seance->groupe->nom }}</span>
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                </tbody>
            </table>
        </div><br>
</body>
</html>

