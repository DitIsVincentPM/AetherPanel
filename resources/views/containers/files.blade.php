<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Container - {{ $container->name }}
            </h2>
            <div>
                <livewire:container-status :containerId="$container->id" />
            </div>
        </div>
    </x-slot>

    <x-slot name="subnav">
        <x-container-nav></x-container-nav>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="w-full mb-4 flex justify-between items-center">
                <div>
                    <h1 class="uppercase font-bold">File System</h1>
                    <nav class="text-sm text-gray-500 mb-4">
                        <a href="#" class="hover:underline">Root</a>
                        <span class="mx-2">/</span>
                        <a href="#" class="hover:underline">Project</a>
                        <span class="mx-2">/</span>
                        <span class="text-gray-700">Bestanden</span>
                    </nav>
                </div>
                <div>
                    <x-button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Upload bestand
                    </x-button>
                </div>
            </div>


            <div>
                <!-- Files Table -->
                <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="py-3 px-4 text-left">Naam</th>
                        <th class="py-3 px-4 text-left">Type</th>
                        <th class="py-3 px-4 text-right">Grootte</th>
                        <th class="py-3 px-4 text-right">Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">docker-compose.yml</td>
                        <td class="py-3 px-4">Bestand</td>
                        <td class="py-3 px-4 text-right">2 KB</td>
                        <td class="py-3 px-4 text-right space-x-2">
                            <button class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Openen</button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Verwijderen
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">app</td>
                        <td class="py-3 px-4">Map</td>
                        <td class="py-3 px-4 text-right">-</td>
                        <td class="py-3 px-4 text-right space-x-2">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Bekijken</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>
