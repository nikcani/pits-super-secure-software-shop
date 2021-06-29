<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    CSRF-TOKEN: {{ @csrf_token() }}
                    <br>
                    ID: {{ session()->getId() }}
                    <br>
                    <hr>
                    <br>
                    <form action="/order" method="get">
                        @csrf
                        Menge <input type="number" name="amount" value="42" title="amount">
                        <br>
                        Werden versendet an
                        <input type="email" name="email" value="{{ auth()->user()->email }}" title="email" readonly>
                        <br>
                        <button type="submit">Bestellen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
