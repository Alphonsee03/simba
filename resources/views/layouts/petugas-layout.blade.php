<x-layouts.base-header>

    <div id="app">
        {{-- Sidebar Petugas --}}
        @include('partials.sidebar-petugas')
        <div id="main" class="layout-navbar">
            <div id="main-content">

                <main class="container py-4">
                    @yield('content')
                </main> 

            </div>


        </div>
    </div>

    <x-layouts.base-scripts/>
</x-layouts.base-header>