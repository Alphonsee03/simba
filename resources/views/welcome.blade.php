<x-layouts.base-header>

    <nav role="navigation" aria-label="Primary Navigation">
        <div class="logo">MySimba</div>
        <div class="user-menu" aria-haspopup="true" aria-expanded="false">
            <button aria-label="User menu" class="avatar-button" aria-controls="user-dropdown" aria-haspopup="true" aria-expanded="false" id="avatarButton">
                <img src="https://randomuser.me/api/portraits/lego/1.jpg" alt="User Avatar" class="avatar" />
            </button>
            <div id="user-dropdown" class="dropdownn" role="menu" aria-labelledby="avatarButton">
                <a href="{{ route('register') }}" role="menuitem" tabindex="0">Sign In</a>
                <a href="{{ route('login') }}" role="menuitem" tabindex="0">Log In</a>
            </div>
        </div>
    </nav>

    <main class="d-flex justify-content-center align-items-center mx-auto">
        <div class="containerr mt-4" role="main">
            <section class="contentt" aria-label="Welcome text and call to action">
                <h1>Welcome to MySimba</h1>
                <h4>Sistem Informasi Manajemen Beasiswa >-< </h4>

                <p>Website ini dibuat untuk memudahkan mahasiswa dalam mengelola beasiswa.</p>
                <div class="btn-groupp">
                    <button class="btn btn-primaryy" aria-label="Get started with MySimba">
                        <a href="{{ route('register') }}" style="color: white;">Get Started</a>
                    </button>
                    <button class="btn btn-secondaryy" aria-label="Learn more about MySimba">
                        <a href="{{ url('/learnmore') }}">Learn More</a>
                    </button>
                </div>
            </section>
            <div  class="image-section">
                <section aria-hidden="true"></section>
            </div>
        </div>
    </main>

   

<x-layouts.base-scripts/>
</x-layouts.base-header>
