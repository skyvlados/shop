<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список Товаров') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('items.create')}}" class="px-2 py-3 border" style="background-color: lightgreen">
                        {{ __('Добавить товар') }}</a>
                    <table class="mt-4 table table-sm border">
                        <thead>
                        <tr class="border-b-2">
                            <th class="px-2 py-3 text-left">{{ __('id') }}</th>
                            <th class="px-2 py-3 text-left">{{ __('Название') }}</th>
                            <th class="px-2 py-3 text-right">{{ __('Производитель') }}</th>
                            <th class="px-2 py-3 text-right">{{ __('Цена, руб') }}</th>
                            <th class="px-2 py-3 text-right">{{ __('Автор') }}</th>
                            <th class="px-2 py-3 text-right">{{ __('Редактор') }}</th>
                            <th width="280px">{{ __('Действия') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="border b-2">
                                <td class="p-2 text-left">{{ $item->id }}</td>
                                <td class="p-2 text-left">{{ $item->name }}</td>
                                <td class="p-2 text-right">{{ $item->manufacturer->name }}</td>
                                <td class="p-2 text-right">{{ $item->price }}</td>
                                <td class="p-2 text-right">{{ $item->user?->name }}</td>
                                <td class="p-2 text-right">{{ $item->editor?->name }}</td>
                                <td>
                                    <form action="{{route('items.destroy',$item)}}" method="POST">
                                        <a class="btn btn-info border" href="{{route('items.show',$item)}}" style="background-color: gray">
                                            {{__('Просмотр')}}</a>
                                        <a class="btn btn-primary border" href="{{route('items.edit',$item)}}" style="background-color: lightskyblue">
                                            {{__('Редактировать')}}</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger border" style="background-color: indianred">
                                            {{__('Удалить')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
