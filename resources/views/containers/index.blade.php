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
                    <livewire:m-d-c-usage :container="$container" />
                    <hr class="my-3 font-bold">
                    <div class="w-full flex justify-center">
                        <livewire:container-controls :container="$container" />
                    </div>
                </x-card>
            </div>
            <!-- Terminal UI -->
            <div class="col-span-4 w-full mx-auto rounded-lg flex flex-col h-[40vh]">
                <div id="terminal-container" class="flex-1 overflow-hidden rounded-lg"></div>
            </div>
        </div>
    </div>

    <!-- Add required styles for xterm.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xterm/xterm/css/xterm.css">

    <script src="https://cdn.jsdelivr.net/npm/socket.io-client/dist/socket.io.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@xterm/xterm"></script>
    <script src="https://cdn.jsdelivr.net/npm/xterm-addon-fit@0.8.0/lib/xterm-addon-fit.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const terminalContainer = document.getElementById('terminal-container');
            const socket = io('http://localhost:3000'); // Adjust WebSocket URL as needed

            // Get the containerId from Laravel Blade template
            const containerId = "{{ $container->docker_id }}";

            // Initialize XTerm.js Terminal
            const term = new Terminal({ cursorBlink: true, theme: { background: '#1e1e1e', foreground: '#d4d4d4' } });
            const fitAddon = new window.FitAddon.FitAddon();
            term.loadAddon(fitAddon);

            // Open terminal in the container
            term.open(terminalContainer);
            fitAddon.fit();

            // Emit the start-terminal event to the server
            socket.emit('start-terminal', { containerId });

            // Listen for terminal output
            socket.on('terminal-output', (data) => {
                term.write(data);
            });

            term.onData((data) => {
                // Ensure the input is a string
                socket.emit('terminal-input', data.toString());
            });

            // Handle window resizing
            window.addEventListener('resize', () => {
                fitAddon.fit();
            });

            // Display terminal session end or error messages
            socket.on('terminal-end', () => {
                term.write('\r\nTerminal session ended.\r\n');
            });

            socket.on('terminal-error', (error) => {
                term.write(`\r\nError: ${error}\r\n`);
            });
        });
    </script>
</x-app-layout>
