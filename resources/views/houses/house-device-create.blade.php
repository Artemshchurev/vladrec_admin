<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить устройство - {{ $house->address }}
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
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    {{ Form::open(array('method' => 'POST', 'class' => 'col-md-12', 'autocomplete' => 'off')) }}
                                    <div class="overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="name" class="block text-sm font-medium text-gray-700">Название</label>
                                                    <input required type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                <div class="col-span-6 sm:col-span-3"></div>
                                                <div class="col-span-12 sm:col-span-3">
                                                    <label for="link" class="block text-sm font-medium text-gray-700">Ссылка на открытие</label>
                                                    <input required type="text" name="link" id="link" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                <div class="col-span-6 sm:col-span-3"></div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="camera_link" class="block text-sm font-medium text-gray-700">Ссылка на камеру</label>
                                                    <input required type="text" name="camera_link" id="camera_link" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                <div class="col-span-6 sm:col-span-3"></div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="type" id="flexRadioDefault1" value="barrier" checked>
                                                        <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                                                            Шлагбаум
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3"></div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="type" id="flexRadioDefault2" value="door">
                                                        <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault2">
                                                            Дверь
                                                        </label>
                                                    </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>