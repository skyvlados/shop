<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактирование производителя') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('items.update', $item) }}">
        @csrf
        @method("PUT")
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 form-group">
                        <x-label for="name" :value="__('Название товара:')" />
                        <input id="name" type="text" name="name"
                               value="@if ($errors->any() ){{old('name')}}@else{{$item->name}}@endif"/>
                        @if ($errors->has('name'))
                            <div style="color:red" class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                        <x-label for="price" :value="__('Цена, руб:')" />
                        <input id="price" type="text" name="price"
                               value="@if ($errors->any()){{old('price')}}@else{{$item->price}}@endif"/>
                        @if ($errors->has('price'))
                            <div style="color:red" class="alert alert-danger">{{ $errors->first('price') }}</div>
                        @endif
                        <x-label for="manufacturer" :value="__('Производитель:')" />
                        <select id="manufacturer" name="manufacturer_id" class="form-control custom-select">
                            @php
                            $value=null;
                            /**
                            * @var $errors
                            * @var \App\Models\Item $item
                            */
                                if ($errors->any()){
                                    $value=(int)old('manufacturer_id');
                                }
                                else{
                                    $value=$item->manufacturer_id;
                                }
                            @endphp
                            @foreach($manufacturers as $manufacturer)
                                <option name="manufacturer" value="{{$manufacturer->id }}" {{($manufacturer->id===$value) ? 'selected' : ''}}>
                                    {{$manufacturer->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('manufacturer_id'))
                            <div style="color:red" class="alert alert-danger">{{ $errors->first('manufacturer_id') }}</div>
                        @endif

                        <br>
                        <x-button class="mt-4">
                            {{ __('Сохранить') }}
                        </x-button>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{route('items.index')}}" class="px-2 py-3 border">{{ __('К списку') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
