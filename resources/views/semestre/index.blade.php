<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 dark:text-indigo-300 leading-tight">
            {{ __('Liste des Semestres') }}
        </h2>
    </x-slot>

    <div class="container mt-5 mx-auto w-">
        <div class=" from-green-200 to-blue-200 rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full border border-gray-300 mx-auto">
                <thead class="bg-gradient-to-r from-blue-300 to-indigo-500">
                    <tr>
                        <th class="py-3 px-4 border-b text-left text-white">Code Semestre</th>
                        <th class="py-3 px-4 border-b text-left text-white">Année</th>
                        <th class="py-3 px-4 border-b text-left text-white">Nom Groupe</th>
                        <th class="py-3 px-4 border-b text-left text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semestres as $semestre)
                        <tr>
                            <td class="py-3 px-4 border-b">{{ $semestre->codeSemestre }}</td>
                            <td class="py-3 px-4 border-b">{{ $semestre->annee }}</td>
                            <td class="py-3 px-4 border-b"><a  class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('semestre.show', [$semestre->id]) }}">Afficher</a></td>
                            <td class="py-3 px-4 border-b flex justify-center space-x-2">
                                <a href="{{ route('semestre.edit', $semestre->id) }}"
                                    class="btn btn-primary bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Éditer</a>
                                <form action="{{ route('semestre.destroy', $semestre->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                                        onclick="return confirm('Voulez-vous supprimer cette semestre définitivement?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div><br>
        <div class="row">{{ $semestres->links()}}</div>
        <div class="text-center mt-3">
            <a href="{{ route('semestre.create') }}"
                class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une
                Semestre</a>
        </div>
    </div>
</x-app-layout>
