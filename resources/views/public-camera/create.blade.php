<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить камеру
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
                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <form method="POST" autocomplete="off">
                                        @csrf
                                        <div class="shadow overflow-hidden sm:rounded-md">
                                            <div class="px-4 py-5 bg-white sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-8 sm:col-span-3">
                                                        <label for="name" class="block text-sm font-medium text-gray-700">Название</label>
                                                        <input required type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3"></div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="link" class="block text-sm font-medium text-gray-700">Ссылка</label>
                                                        <input required type="text" name="link" id="link" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3"></div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="lat" class="block text-sm font-medium text-gray-700">Широта</label>
                                                        <input required type="text" name="lat" id="lat" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3"></div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="lng" class="block text-sm font-medium text-gray-700">Долгота</label>
                                                        <input required type="text" name="lng" id="lng" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3"></div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="with_support_of" class="block text-sm font-medium text-gray-700">При поддержке</label>
                                                        <input type="text" name="with_support_of" id="with_support_of" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3"></div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="support_link" class="block text-sm font-medium text-gray-700">При поддержке (ссылка)</label>
                                                        <input type="text" name="support_link" id="support_link" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Сохранить
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
