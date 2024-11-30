<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h1 class="uppercase font-bold">Server List</h1>
                <x-button>Create New</x-button>
            </div>
            <div class="overflow-hidden">
                @forelse($containers as $container)
                    <x-server-item id="{{ $container->id }}" name="{{ $container->name }}" desc="{{ $container->description }}" image="{{ $container->containerType->image }}" status="{{ $container->status }}"/>
                @empty
                    <x-card class="mt-6">It seems like you don't have any containers yet.</x-card>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
