<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Container - {{ $container->name }}
            </h2>
            <div>
                <div class="flex items-center">
                    @if($container->status === 'Online')
                        <i class="text-green-500 fa-solid fa-circle fa-beat mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                    @elseif($container->status === 'Starting')
                        <i class="text-yellow-500 fa-solid fa-circle fa-beat mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                    @elseif($container->status === 'Stopping')
                        <i class="text-red-700 fa-solid fa-spinner fa-spin-pulse mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                    @elseif($container->status === 'Installing')
                        <i class="text-orange-500 fa-solid fa-spinner fa-spin-pulse mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                    @else
                        <i class="text-red-500 fa-solid fa-circle fa-beat mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                    @endif
                    <span class="text-sm font-medium text-gray-800">{{ $container->status }}</span>
                </div>
            </div>
        </div>

    </x-slot>

    <div class="justify-center items-center flex">
        <div class="py-12 container">
            <div class="w-full mb-4">
                <div class="flex items-center justify-between">
                    <h1 class="uppercase font-bold">Console Interface</h1>
                </div>
            </div>
            <div class="grid grid-cols-6 gap-10">
                <div class="col-span-2">
                    <x-card title="{{ $container->name }}">
                        <div class="uppercase grid grid-cols-2 grid-rows-1">
                            <p class="font-bold">Memory:</p> <p class="text-right"><span id="memory">100MB</span> / 1000MB</p>
                            <p class="font-bold">Disk:</p> <p class="text-right"><span id="memory">10GB</span> / 100GB</p>
                            <p class="font-bold">CPU:</p> <p class="text-right"><span id="memory">23%</span></p>
                        </div>
                        <hr class="my-3 font-bold">
                        <div class="w-full flex justify-center">
                            <div class="grid grid-cols-3 gap-2 w-2/3 justify-center items-center">
                                <x-button class="flex items-center justify-center">Start</x-button>
                                <x-button class="flex items-center justify-center bg-blue-600">Restart</x-button>
                                <x-button class="flex items-center justify-center bg-red-400">Stop</x-button>
                            </div>
                        </div>
                    </x-card>
                </div>
                <div class="col-span-4 w-full mx-auto bg-gray-800 rounded-lg shadow-lg flex flex-col h-[40vh]">
                    <div id="consoleLogs" class="flex-1 overflow-y-auto p-4 bg-gray-900 rounded-t-lg border-b border-gray-700">
                        <p class="text-gray-400">Welcome to the Console Interface! Type commands below.</p>
                    </div>

                    <div class="p-3 bg-gray-800 rounded-b-lg border-t border-gray-700">
                        <form id="consoleForm" class="flex items-center">
                            <input
                                type="text"
                                id="consoleInput"
                                class="flex-1 p-2 rounded-md bg-gray-700 text-gray-300 placeholder-gray-500 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Type your command here..."
                                autofocus>
                            <button
                                type="submit"
                                class="ml-3 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md focus:outline-none">
                                Run
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
