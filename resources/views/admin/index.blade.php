<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin | Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-10">
                <div>
                        <div class="flex items-center justify-between">
                            <h1 class="uppercase font-bold">Container List</h1>
                            <x-button>Create New</x-button>
                        </div>
                        <div class="overflow-hidden">
                            @forelse($containers as $container)
                                <x-server-item id="{{ $container->id }}" name="{{ $container->name }}" desc="{{ $container->description }}" status="{{ $container->status }}"/>
                            @empty
                                <x-card class="mt-6">It seems like there are no containers.</x-card>
                            @endforelse
                        </div>
                </div>
                <div>
                        <div class="flex items-center justify-between">
                            <h1 class="uppercase font-bold">Nodes List</h1>
                            <x-button>Create New</x-button>
                        </div>
                        <div class="overflow-hidden">
                            @forelse($nodes as $node)
                                <x-node-item id="{{ $node->id }}" name="{{ $node->name }}" status="{{ $node->status }}"/>
                            @empty
                                <x-card class="mt-6">It seems like there are no containers.</x-card>
                            @endforelse
                        </div>
                 </div>
            </div>
    </div>
</x-admin-layout>
