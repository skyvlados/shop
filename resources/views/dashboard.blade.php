<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Страница приветствия') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Добро пожаловать {{auth()->user()->name}}!
                </div>
                <div class="p-6">
                <a href="{{route('countries.index')}}" class="px-2 py-3 text-left border">
                    {{ __('К списку стран') }}
                </a>
                    <a href="{{route('manufacturers.index')}}" class="px-2 py-3 text-left border">
                        {{ __('К списку производителей') }}
                    </a>
                    <a href="{{route('items.index')}}" class="px-2 py-3 text-left border">
                        {{ __('К списку товаров') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
