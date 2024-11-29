@props(['title' => null])

<div {{ $attributes->merge(['class' => "shadow-2xl", "style" => ""]) }}>
    @if($title != null)

    <div class="bg-gray-100 p-2 border-2 border-b-0 rounded-t-2xl">
        <h3 class="font-bold uppercase text-mb ml-2">{{ $title }}</h3>
    </div>
    @endif
    <div class="bg-white p-4 border-2 @if($title != null) border-t-0 rounded-b-2xl @else rounded-2xl @endif ">
        {{ $slot }}
    </div>
</div>
