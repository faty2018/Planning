<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 dark:text-indigo-300 leading-tight">
            {{ __('Liste des Utilisateurs') }}
        </h2>
    </x-slot>

    <div class="container mt-5 mx-auto w-">
        <div class=" from-green-200 to-blue-200 rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full border border-gray-300 mx-auto">
                <thead class="bg-gradient-to-r from-blue-300 to-indigo-500">
                    <tr>
                        <th class="py-3 px-4 border-b text-left text-white">Nom</th>
                        <th class="py-3 px-4 border-b text-left text-white">Email</th>
                        <th class="py-3 px-4 border-b text-left text-white">Role</th>
                        <th class="py-3 px-4 border-b text-left text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="py-3 px-4 border-b">{{ $user->name }}</td>
                            <td class="py-3 px-4 border-b">{{ $user->email }}</td>
                            <td class="py-3 px-4 border-b">{{ $user->role }}</td>
                            <td class="py-3 px-4 border-b flex justify-center space-x-2">
                                <a href="{{ route('user.edit', $user->id) }}"
                                    class="btn btn-primary bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Éditer</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                                        onclick="return confirm('Voulez-vous supprimer cette utilisateur définitivement?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><br>
        <div class="row">{{ $users->links()}}</div>
        <div class="text-center mt-3">
            <a href="{{ route('user.create') }}"
                class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un utilisateur</a>
        </div>
    </div>
</x-app-layout>
