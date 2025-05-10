<x-layouts.base-header>

    <div id="app">
        {{-- Sidebar Mahasiswa --}}
        @include('partials.sidebar-mahasiswa')
        <div id="main">
            <div id="main-content">
                <main class="container py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <x-layouts.base-scripts />
</x-layouts.base-header>