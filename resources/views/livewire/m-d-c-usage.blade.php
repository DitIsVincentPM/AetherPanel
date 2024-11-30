<div class="uppercase grid grid-cols-2 grid-rows-1" wire:poll.2s="fetchUsage">
    <p class="font-bold">Memory:</p>
    <p class="text-right">
        <span id="memory">{{ $memoryUsage }}</span> / {{ $memoryLimit }}
    </p>

    <p class="font-bold">Disk:</p>
    <p class="text-right">
        <span id="disk">{{ $diskUsed }}</span> / {{ $diskTotal }}
    </p>

    <p class="font-bold">CPU:</p>
    <p class="text-right">
        <span id="cpu">{{ $cpuUsage }}</span>
    </p>
</div>
