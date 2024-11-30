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
                        <livewire:container-controls :container="$container" />
                    </div>
                </x-card>
            </div>
            <!-- Console UI -->
            <div class="col-span-4 w-full mx-auto bg-gray-800 rounded-lg shadow-lg flex flex-col h-[40vh]">
                <div id="consoleLogs" class="flex-1 overflow-y-auto p-4 bg-gray-900 rounded-t-lg border-b border-gray-700">
                    <p class="text-gray-400">Welcome to the Console Interface! Type commands below.</p>
                </div>

                <div class="p-3 bg-gray-800 rounded-b-lg border-t border-gray-700">
                    <form id="consoleForm" class="flex items-center">
                        <input
                            type="text"
                            id="consoleInput"
                            class="flex-1 p-2 rounded-md bg-gray-700 text-gray-300 placeholder-gray-500 border border-gray-600 focus:outline-none"
                            placeholder="Type your command here...">
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const consoleLogs = document.getElementById('consoleLogs');
            const consoleForm = document.getElementById('consoleForm');
            const consoleInput = document.getElementById('consoleInput');

            const socket = io('http://localhost:3000'); // Adjust if needed

            // Get the containerId from Laravel Blade template
            const containerId = "{{ $container->docker_id }}";

            // Join log streaming for a specific container
            socket.emit('stream-logs', containerId);
            const formatLog = (log, type) => {
                const logElement = document.createElement('p');
                logElement.classList.add('text-sm');
                logElement.classList.add('text-pretty');

                const lines = log.split('\n');

                let cleanedLog = lines.map(line => {
                    // Verwijder niet-standaard karakters (alles behalve letters, cijfers, spaties en gangbare leestekens)
                    let cleanedLine = line.replace(/[^a-zA-Z0-9\s.,!?()-]/g, '');

                    if (cleanedLine.includes('[')) {
                        cleanedLine = cleanedLine.split('[').slice(1).join('[');

                        const timestampEndIndex = cleanedLine.indexOf(']');
                        if (timestampEndIndex !== -1) {
                            cleanedLine = cleanedLine.slice(timestampEndIndex + 1).trim();
                        }
                    }

                    return cleanedLine;
                }).join('\n');

                logElement.textContent = cleanedLog;

                if (type === 'stdout') {
                    logElement.classList.add('text-green-300');
                } else if (type === 'stderr') {
                    logElement.classList.add('text-red-500');
                } else {
                    logElement.classList.add('text-gray-300');
                }

                return logElement;
            };


            // Append logs to console with color formatting
            socket.on('container-logs', (log) => {
                const logElement = formatLog(log, 'stdout');
                consoleLogs.appendChild(logElement);
                consoleLogs.scrollTop = consoleLogs.scrollHeight;
            });

            socket.on('container-logs-end', (message) => {
                const logElement = formatLog(message, 'stdout');
                logElement.classList.add('text-yellow-500'); // Yellow for end of logs
                consoleLogs.appendChild(logElement);
            });

            // Send command to backend
            consoleForm.addEventListener('submit', (e) => {
                e.preventDefault();

                const command = consoleInput.value;
                if (!command.trim()) return;

                socket.emit('send-command', { containerId, command });
                consoleInput.value = '';
            });
        });
    </script>

    <style>
        #consoleLogs p {
            font-family: 'Courier New', Courier, monospace;
            white-space: pre-wrap;
            word-wrap: break-word;
            margin-bottom: 5px;
        }
    </style>
</x-app-layout>
