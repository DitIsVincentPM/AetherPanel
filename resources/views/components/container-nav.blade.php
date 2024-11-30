<x-nav-link href="{{ route('container.index', ['id' => request()->route('id')]) }}" :active="request()->routeIs('container.index')">
    {{ __('Manage') }}
</x-nav-link>
<x-nav-link href="{{ route('container.files', ['id' => request()->route('id')]) }}" :active="request()->routeIs('container.files')">
    {{ __('Filesystem') }}
</x-nav-link>
<x-nav-link href="{{ route('container.users', ['id' => request()->route('id')]) }}" :active="request()->routeIs('container.users')">
    {{ __('Users') }}
</x-nav-link>
<x-nav-link href="{{ route('container.databases', ['id' => request()->route('id')]) }}" :active="request()->routeIs('container.databases')">
    {{ __('Databases') }}
</x-nav-link>
<x-nav-link href="{{ route('container.settings', ['id' => request()->route('id')]) }}" :active="request()->routeIs('container.settings')">
    {{ __('Settings') }}
</x-nav-link>
