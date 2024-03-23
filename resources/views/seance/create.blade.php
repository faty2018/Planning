<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 dark:text-dark-200 leading-tight">
            {{ __('Ajouter une seance') }}
        </h2>
    </x-slot>

    <div class="container mt-5 mx-auto">
        <div class="bg-white rounded shadow-md p-8 max-w-xl mx-auto">
            <h1 class="text-center mb-8 bg-gradient-to-r from-blue-500 to-purple-500 text-white py-2 px-4 rounded">
                Ajouter une seance</h1>

            <form action="{{ route('seance.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="mb-6">
                    <label for="codeSeance" class="block text-sm font-medium text-gray-700">Code séance:</label>
                    <input type="text" name="codeSeance" id="codeSeance"
                        class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('codeSeance')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="semestre_id" class="block text-sm font-medium text-gray-700">code Semestre :</label>
                    <select name="semestre_id" id="semestre_id"
                        class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option disabled selected>Selectionnez Une Semestre</option>
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id }}">{{ $semestre->codeSemestre }}</option>
                        @endforeach
                    </select>
                    @error('semestre_id')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="groupe_id" class="block text-sm font-medium text-gray-700">Id de groupe :</label>
                    <select name="groupe_id" id="groupe_id"
                        class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option disabled selected>Selectionnez Un Groupe</option>
                        @foreach ($groupes as $groupe)
                            <option value="{{ $groupe->id }}">{{ $groupe->nomgrp }}</option>
                        @endforeach
                    </select>
                    @error('groupe_id')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="matiere_id" class="block text-sm font-medium text-gray-700">Nom de matiere :</label>
                    <select name="matiere_id" id="matiere_id"
                        class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option disabled selected>Selectionnez Une matiere</option>
                        @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                        @endforeach
                    </select>
                    @error('matiere_id')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="professeur_id" class="block text-sm font-medium text-gray-700">Nom et prenom :</label>
                    <select name="professeur_id" id="professeur_id"
                        class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option disabled selected>Selectionnez Un Professeur</option>
                        @foreach ($professeurs as $professeur)
                            <option value="{{ $professeur->id }}">{{ $professeur->nomprof }}
                                {{ $professeur->prenomprof }}</option>
                        @endforeach
                    </select>
                    @error('professeur_id')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="local_id" class="block text-sm font-medium text-gray-700">Nom du local :</label>
                    <select name="local_id" id="local_id"
                        class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option disabled selected>Selectionnez Un local</option>
                        @foreach ($locals as $local)
                            <option value="{{ $local->id }}">{{ $local->nom }}</option>
                        @endforeach
                    </select>
                    @error('local_id')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="dateSeance" class="block text-sm font-medium text-gray-700">Date de la seance :</label>
                    <input type="date" name="dateSeance" id="dateSeance"
                        class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('dateSeance')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="heureDebut" class="block text-sm font-medium text-gray-700">heure de Debut :</label>
                    <input type="time" name="heureDebut"  id="heureDebut"
                        class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('heureDebut')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="heureFin" class="block text-sm font-medium text-gray-700">heure de Fin :</label>
                    <input type="time" name="heureFin" id="heureFin"
                        class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('heureFin')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>


                <div class="text-center">
                    <a href="{{ route('seance.index') }}"
                        class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded">Retour à la
                        liste</a>
                    <button type="submit"
                        class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
