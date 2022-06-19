<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Просмотр товара') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('items.store') }}">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 form-group">
                        <x-label :value="__('Название производителя:')" />
                        <input disabled width="280px" type="text" name="name" value="{{$item->name}}"/>
                        <x-label :value="__('Цена, руб:')" />
                        <input disabled width="280px" type="text" name="price" value="{{$item->price}}"/>
                        <x-label :value="__('Страна:')" />
                        <select disabled name="countryName" class="form-control custom-select">
                            <option>{{$item->manufacturer->name}}</option>
                        </select>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{route('items.index')}}" class="px-2 py-3 border">{{ __('К списку') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
