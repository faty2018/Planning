<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 dark:text-indigo-300 leading-tight">
            {{ __('Liste des étudiants') }}
        </h2>
    </x-slot>

    <div class="container mt-5 mx-auto">
        <div class=" from-green-200 to-blue-200 rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full border border-gray-300 mx-auto">
                <thead class="bg-gradient-to-r from-green-300 to-blue-300">
                    <tr>
                        <th class="py-3 px-4 border-b text-left text-white">Nom du groupe</th>
                        <th class="py-3 px-4 border-b text-left text-white">Nom</th>
                        <th class="py-3 px-4 border-b text-left text-white">Prenom</th>
                        <th class="py-3 px-4 border-b text-left text-white">Email</th>
                        <th class="py-3 px-4 border-b text-left text-white">Adresse</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $etudiant)
                        <tr>
                            <td class="py-3 px-4 border-b">{{ $etudiant->groupe->nomgrp }}</td>
                            <td class="py-3 px-4 border-b">{{ $etudiant->nom }}</td>
                            <td class="py-3 px-4 border-b">{{ $etudiant->prenom }}</td>
                            <td class="py-3 px-4 border-b">{{ $etudiant->email }}</td>
                            <td class="py-3 px-4 border-b">{{ $etudiant->adresse }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>