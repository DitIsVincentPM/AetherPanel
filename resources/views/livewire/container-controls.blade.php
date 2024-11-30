<div>
    <div class="grid grid-cols-3 gap-2 w-100 justify-center items-center" wire:poll.2s="getStatus">
        @if($containerStatus === 'Online')
            <x-button wire:click="startContainer" class="flex items-center justify-center" disabled>Start</x-button>
        @else
            <x-button wire:click="startContainer" class="flex items-center justify-center">Start</x-button>
        @endif
        @if($containerStatus === 'Online')
            <x-button wire:click="restartContainer" class="flex items-center justify-center bg-blue-600">Restart</x-button>
            <x-button wire:click="stopContainer" class="flex items-center justify-center bg-red-600">Stop</x-button>
        @else
            <x-button wire:click="restartContainer" class="flex items-center justify-center bg-blue-600" disabled>Restart</x-button>
            <x-button wire:click="stopContainer" class="flex items-center justify-center bg-red-600" disabled>Stop</x-button>
        @endif
    </div>
    @if (session()->has('error'))
        <hr>
        <div class="text-red-700 text-base mt-2">{{ session('error') }}</div>
    @endif
    @if (session()->has('message'))
        <hr>
        <div class="text-green-700 text-base mt-2">{{ session('message') }}</div>
    @endif
</div>
