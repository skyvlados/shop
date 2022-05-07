<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список производителей') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('manufacturers.create')}}" class="px-2 py-3 border" style="background-color: lightgreen">
                        {{ __('Добавить производителя') }}</a>
                    <table class="mt-4 table table-sm border">
                        <thead>
                        <tr class="border-b-2">
                            <th class="px-2 py-3 text-left">{{ __('id') }}</th>
                            <th class="px-2 py-3 text-left">{{ __('Название') }}</th>
                            <th class="px-2 py-3 text-right">{{ __('Страна') }}</th>
                            <th class="px-2 py-3 text-right">{{ __('Автор') }}</th>
                            <th class="px-2 py-3 text-right">{{ __('Редактор') }}</th>
                            <th width="280px">{{ __('Действия') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($manufacturers as $manufacturer)
                            <tr class="border b-2">
                                <td class="p-2 text-left">{{ $manufacturer->id }}</td>
                                <td class="p-2 text-left">{{ $manufacturer->name }}</td>
                                <td class="p-2 text-right">{{ $manufacturer->country->name }}</td>
                                <td class="p-2 text-right">{{ $manufacturer->user?->name }}</td>
                                <td class="p-2 text-right">{{ $manufacturer->editor?->name }}</td>
                                <td>
                                    <form action="{{route('manufacturers.destroy',$manufacturer)}}" method="POST">
                                        <a class="btn btn-info border" href="{{route('manufacturers.show',$manufacturer)}}" style="background-color: gray">
                                            {{__('Просмотр')}}</a>
                                        <a class="btn btn-primary border" href="{{route('manufacturers.edit',$manufacturer)}}" style="background-color: lightskyblue">
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
