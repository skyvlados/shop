<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создание производителя') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('manufacturers.store') }}">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 form-group">
                        <x-label for="name" :value="__('Название производителя:')" />
                        <input id="name" type="text" name="name"
                                 placeholder="{{__('Введите название производителя')}}"
                        value="@if($errors->has('name')){{old('name')}}@else{{''}}@endif"/>
                        @if ($errors->has('name'))
                            <div style="color:red" class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                        <x-label for="country_id" :value="__('Страна:')" />
                        <select id="country_id" name="country_id" class="form-control custom-select">
                            <option value="" selected disabled hidden></option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('country_id'))
                            <div style="color:red" class="alert alert-danger">{{ $errors->first('country_id') }}</div>
                        @endif
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
