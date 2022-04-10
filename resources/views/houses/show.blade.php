<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $house->address }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="mt-5 grid grid-cols-2 gap-4">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        {{ Form::open(array('method' => 'PUT', 'class' => 'col-md-12', 'autocomplete' => 'off')) }}
                                        <div class="overflow-hidden sm:rounded-md">
                                            <div class="px-4 py-5 bg-white sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="address" class="block text-sm font-medium text-gray-700">Адрес</label>
                                                        <input required value="{{ $house->address }}" type="text" name="address" id="address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-3 text-left sm:px-6">
                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Сохранить
                                                </button>
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                        {{ Form::open(array('method' => 'POST', 'class' => 'col-md-12', 'autocomplete' => 'off')) }}
                                        {{ method_field('DELETE') }}
                                        <div class="px-4 py-3 text-left sm:px-6">
                                            <button style="background-color: red;" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Удалить
                                            </button>
                                        </div>
                                        {{ Form::close() }}

                                        <a href="{{ route('houses.barrier-create', ['id' => $house->id]) }}" class="px-6 underline text-blue-600 hover:text-blue-800 visited:text-purple-600">
                                            Добавить шлагбаум
                                        </a>
                                        @if ($house->barriers)
                                            <div class="px-6 py-6">
                                                Шлагбаумы:
                                                @foreach($house->barriers as $barrier)
                                                    <div>
                                                        <a href="{{ route('barriers.show', ['id' => $barrier->id]) }}" class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600">
                                                            {{ $barrier->name }}
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
