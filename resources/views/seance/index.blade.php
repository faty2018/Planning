<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 dark:text-indigo-300 leading-tight">
            {{ __('Liste des seances') }}
        </h2>
    </x-slot>
 
    <div class="container mt-5 mx-auto">
        <div class=" from-green-200 to-blue-200 rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full border border-gray-300 mx-auto">
                <thead class="bg-gradient-to-r from-blue-300 to-indigo-500">
                    <tr>
                        <th class="py-3 px-4 border-b text-left text-white">Code Seance</th>
                        <th class="py-3 px-4 border-b text-left text-white">Code Semestre</th>
                        <th class="py-3 px-4 border-b text-left text-white">Nom Groupe</th>
                        <th class="py-3 px-4 border-b text-left text-white">Nom Matière</th>
                        <th class="py-3 px-4 border-b text-left text-white">Nom et Prenom Professeur</th>
                        <th class="py-3 px-4 border-b text-left text-white">Nom Local</th>
                        <th class="py-3 px-4 border-b text-left text-white">Date du seance</th>
                        <th class="py-3 px-4 border-b text-left text-white">Heure de Debut</th>
                        <th class="py-3 px-4 border-b text-left text-white">Heure de Fin</th>
                        <th class="py-3 px-4 border-b text-left text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seances as $seance)
                        <tr>
                            <td class="py-3 px-4 border-b">{{ $seance->codeSeance }}</td>
                            <td class="py-3 px-4 border-b">{{ $seance->semestre->codeSemestre }}</td>
                            <td class="py-3 px-4 border-b">{{ $seance->groupe->nomgrp }}</td>
                            <td class="py-3 px-4 border-b">{{ $seance->matiere->nom }}</td>
                            <td class="py-3 px-4 border-b">{{ $seance->professeur->nomprof }} {{ $seance->professeur->prenomprof }}</td>
                            <td class="py-3 px-4 border-b">{{ $seance->local->nom }}</td>
                            <td class="py-3 px-4 border-b">{{ $seance->dateSeance }}</td>
                            <td class="py-3 px-4 border-b">{{ $seance->heureDebut }}</td>
                            <td class="py-3 px-4 border-b">{{ $seance->heureFin }}</td>
                            <td class="py-3 px-4 border-b flex justify-center space-x-2">
                      
                                <a href="{{ route('seance.edit', ['seance'=>$seance]) }}" class="btn btn-primary bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Éditer</a> 
                                <form action="{{ route('seance.destroy', ['seance'=>$seance ]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Voulez-vous supprimer ce seance définitivement?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><br>
        <div class="row">{{ $seances->links()}}</div>
        <div class="text-center mt-3">
            <a href="{{ route('seance.create') }}" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une seance</a>
        </div>
    </div>
</x-app-layout>
