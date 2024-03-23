<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un professeur') }}
        </h2>
    </x-slot>

    <div class="container mt-5 mx-auto">
        <div class="bg-white rounded shadow-md p-8 max-w-xl mx-auto">
            <h1 class="text-center mb-8 bg-blue-500 text-white py-2 px-4 rounded">Modifier un professeur</h1>

            <form action="{{ route('professeur.update', $professeur->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="nomprof" class="block text-sm font-medium text-gray-700">Nom du professeur :</label>
                    <input type="text" name="nomprof" id="nomprof" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $professeur->nomprof }}">
                    @error('nomprof')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="prenomprof" class="block text-sm font-medium text-gray-700">Prenom du professeur :</label>
                    <input type="text" name="prenomprof" id="prenomprof" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $professeur->prenomprof }}">
                    @error('prenomprof')
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Prenom du professeur :</label>
                <input type="text" name="email" id="email" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $professeur->email }}">
                @error('email')
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="font-medium">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            </div>

                <div class="text-center">
                    <a href="{{ route('professeur.index') }}" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded">Retour à la liste</a>
                    <button type="submit" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>