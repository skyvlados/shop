<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Просмотр производителя') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('manufacturers.store') }}">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 form-group">
                        <x-label for="manufacturerName" :value="__('Название производителя:')" />
                        <input disabled width="280px" id="manufacturerName" type="text" name="manufacturerName" value="{{$manufacturer->name}}"/>
                        <x-label for="manufacturer" :value="__('Страна:')" />
                        <select disabled name="countryName" class="form-control custom-select">
                            <option>{{$country->name}}</option>
                        </select>

                        <br>
                        <x-button class="mt-4">
                            {{ __('Сохранить') }}
                        </x-button>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{route('manufacturers.index')}}" class="px-2 py-3 border">{{ __('К списку') }}</a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
