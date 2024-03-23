<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 dark:text-indigo-300 leading-tight">
            {{ __('Fonctionnaire') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-500 to-purple-500">
        <div class="max-w-3xl mx-auto p-8 text-white">
            <h1 class="text-4xl font-extrabold mb-4">{{ __("Bienvenue dans la Section du Fonctionnaire !") }}</h1>
            <p class="text-lg leading-relaxed">{{ __("Vous êtes connecté. Créez et gérez votre emplois du temps  en toute simplicité.") }}</p>
        </div>
    </div>
</x-app-layout>
