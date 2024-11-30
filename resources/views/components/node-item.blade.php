@props(['id' => null, 'name' => null, 'desc' => null, 'image' => null, 'status' => null])
<a href="{{ route('container.index', ['id' => $id]) }}">
    <div class="relative bg-white rounded-lg shadow-md flex items-center overflow-hidden mt-4">
        <div class="flex-1 flex items-center justify-between px-6 py-4">
            <div>
                <h3 class="text-lg font-bold text-gray-900">{{ $name }}</h3>
            </div>
            <div class="flex items-center">
                @if($status === 'Online')
                    <i class="text-green-500 fa-solid fa-circle fa-beat mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                @elseif($status === 'Starting')
                    <i class="text-yellow-500 fa-solid fa-circle fa-beat mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                @elseif($status === 'Stopping')
                    <i class="text-red-700 fa-solid fa-spinner fa-spin-pulse mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                @elseif($status === 'Installing')
                    <i class="text-orange-500 fa-solid fa-spinner fa-spin-pulse mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                @elseif($status === 'Not Connected')
                    <i class="text-red-500 fa-solid fa-circle mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                @elseif($status === 'Error')
                    <i class="text-red-900 fa-solid fa-circle mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                @else
                    <i class="text-red-500 fa-solid fa-circle fa-beat mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
                @endif
                <span class="text-sm font-medium text-gray-800">{{ $status }}</span>
            </div>
        </div>
    </div>
</a>
