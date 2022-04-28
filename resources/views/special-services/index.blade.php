<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Спец. службы
        </h2>
        <a href="{{ route('special-services.create') }}">Добавить</a>
    </x-slot>

    <div class="py-12">
        @if ($message = Session::get('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    {{ $message }}
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                @if ($users->isNotEmpty())
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Название
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="{{ route('special-services.show', ['id' => $user->id]) }}">
                                                        <div class="flex items-center">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $user->name }}
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="{{ route('special-services.show', ['id' => $user->id]) }}">
                                                        <div class="flex items-center">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $user->email }}
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
