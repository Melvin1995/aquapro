<x-layout>
    <x-slot:title>Aquaria</x-slot:title>
    <div class="space-y-5 sm:space-y-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Alle Aquaria
            </h3>
        </div>
        <div class="p-5 border-t border-gray-100 dark:border-gray-800 sm:p-6">
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
                <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                            Aquaria
                        </h3>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="/aquaria/create" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                            <img src="{{ asset('images/icons/plus.svg') }}" class="h-4 w-4">
                            Aquarium
                        </a>
                    </div>
                </div>

                <div class="w-full overflow-x-auto">
                    @if (!empty($aquaria))
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-gray-100 border-y dark:border-gray-800">
                                    <th class="py-3">
                                        <div class="flex items-center">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Naam
                                            </p>
                                        </div>
                                    </th>
                                    <th class="py-3">
                                        <div class="flex items-center">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Type
                                            </p>
                                        </div>
                                    </th>
                                    <th class="py-3">
                                        <div class="flex items-center">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Draaiend sinds
                                            </p>
                                        </div>
                                    </th>
                                    <th class="py-3">
                                        <div class="flex items-center col-span-2">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Laatste waterwissel
                                            </p>
                                        </div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                @foreach ($aquaria as $aquarium)
                                    <tr>
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <div class="flex items-center gap-3">
                                                    <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                                                        <img src="{{ asset('images/avatars/default.png') }}" alt="Product" />
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                            {{ $aquarium->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <p class="text-white text-theme-sm">
                                                    {{ $aquarium->aquarium_type_id }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <p class="text-white text-theme-sm">
                                                    {{ date('d F Y', strtotime($aquarium->created_at)) }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <p class="text-white text-theme-sm">
                                                    {{ isset($aquarium->last_time_maintenance) ? $aquarium->last_time_maintenance : 'Nog geen waterwissel uitgevoerd.' }}
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <span class="text-white">Er zijn nog geen aquaria toegevoegd.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
