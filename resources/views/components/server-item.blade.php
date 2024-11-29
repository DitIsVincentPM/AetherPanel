@props(['id' => null, 'name' => null, 'desc' => null, 'image' => null, 'status' => null])
<a href="{{ route('container.index', ['id' => $id]) }}">
<div class="relative bg-white rounded-lg shadow-md flex items-center overflow-hidden mt-4">
    <!-- Linker sectie met afbeelding -->
    <div class="relative flex-shrink-0 w-2/12 h-20">
        <img src="{{ $image }}" alt="Achtergrond" class="absolute top-0 left-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-l from-white via-transparent to-transparent"></div>
    </div>

    <!-- Rechter sectie met tekst en status -->
    <div class="flex-1 flex items-center justify-between px-6 py-4">
        <div>
            <h3 class="text-lg font-bold text-gray-900">{{ $name }}</h3>
            <p class="text-sm text-gray-600">{{ $desc }}</p>
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
            @else
                <i class="text-red-500 fa-solid fa-circle fa-beat mr-2" style="--fa-animation-duration: 1s; --fa-beat-scale: 1.05;"></i>
            @endif
            <span class="text-sm font-medium text-gray-800">{{ $status }}</span>
        </div>
    </div>
</div>
</a>
