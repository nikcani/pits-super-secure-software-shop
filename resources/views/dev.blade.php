<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dev') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <pre>CSRF-TOKEN: {{ @csrf_token() }}</pre>
                    <pre>ID: {{ session()->getId() }}</pre>
                    <a href="https://pits-awesome-attacker.test">Testangriff durchführen</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
