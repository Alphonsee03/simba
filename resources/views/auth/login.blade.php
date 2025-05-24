@push('styles')
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        background: #f2f2f2;
    }

    #auth {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #auth-left {
        background: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    .auth-logo {
        text-align: center;
        margin-bottom: 20px;
    }
</style>
@endpush

<x-layouts.base-header>
    <div id="auth">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="#"><img src="{{ asset('assets/images/logo/mysimbas.png') }}" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Log in</h1>
            <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>


            <form action="{{ route('auth.submit') }}" method="post">
                @csrf

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control form-control-xl" placeholder="Email" required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" required>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>

                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>

                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>

                
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </form>
        </div>
    </div>

    <x-layouts.base-scripts />
</x-layouts.base-header>

