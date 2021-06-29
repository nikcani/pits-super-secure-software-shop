<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (session('message'))
        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <pre>CSRF-TOKEN: {{ @csrf_token() }}</pre>
                    <pre>ID: {{ session()->getId() }}</pre>
                    <a href="https://pits-awesome-attacker.test">Testangriff durchführen</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
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
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach(auth()->user()->orders()->orderBy('id', 'desc')->get() as $order)
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ $order->created_at }}:
                        {{ $order->amount }} Lizenzschlüssel wurden an {{ $order->delivery_email }} versendet.
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
