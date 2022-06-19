<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактирование страны') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('countries.update', $country) }}">
        @csrf
        @method('PUT')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 form-group">
                        <x-label for="name" :value="__('Название страны:')" />
                        <input id="name" type="text" name="name" value="@if ($errors->has('name')){{old('name')}}@else{{$country->name}}@endif"
                                 />
                        @if ($errors->has('name'))
                            <div style="color:red" class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                        <br>
                        <x-button class="mt-4">
                            {{ __('Сохранить') }}
                        </x-button>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{route('countries.index')}}" class="px-2 py-3 border">{{ __('К списку') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
