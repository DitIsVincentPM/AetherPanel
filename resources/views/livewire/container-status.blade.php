<div class="flex items-center" wire:poll.2s="getStatus">
    @if($containerStatus === 'Online')
        <i class="text-green-500 fa-solid fa-circle fa-beat mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
    @elseif($containerStatus === 'Starting')
        <i class="text-yellow-500 fa-solid fa-circle fa-beat mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
    @elseif($containerStatus === 'Stopping')
        <i class="text-red-700 fa-solid fa-spinner fa-spin-pulse mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
    @elseif($containerStatus === 'Installing')
        <i class="text-orange-500 fa-solid fa-spinner fa-spin-pulse mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
    @else
        <i class="text-red-500 fa-solid fa-circle fa-beat mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
    @endif
    <span class="text-sm font-medium text-gray-800">{{ $containerStatus }}</span>
</div>
