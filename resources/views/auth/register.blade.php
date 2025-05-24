@push('styles')


@endpush


<x-layouts.base-header>
    <div id="auth">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-lg-6 col-md-8">
                    <div class="card shadow p-4 border-0">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="{{ asset('assets/images/logo/mysimbas.png') }}" alt="Logo" style="height: 50px;">
                                <h1 class="auth-title mt-3">Register</h1>
                                <p class="auth-subtitle">Input your data to register to MySimba.</p>
                            </div>

                            <form action="{{ route('register.submit') }}" method="POST">
                                @csrf
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text" name="name" class="form-control form-control-xl" placeholder="Nama Lengkap" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>

                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                </div>

                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="number" name="smester"  class="form-control" placeholder="Semester" required min="1" max="14">
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar"></i>
                                    </div>
                                </div>

                                <div class="form-group position-relative has-icon-left mb-3">                                   
                                    <input type="text" name="prodi"  class="form-control" placeholder="Prodi" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-clipboard"></i>
                                    </div>
                                </div>

                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>

                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="password" name="password_confirmation" class="form-control form-control-xl" placeholder="Konfirmasi Password" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>

                                <button class="btn btn-primary w-100 btn-lg shadow mt-3">Register</button>
                            </form>

                            <div class="text-center mt-4 fs-6">
                                <p class='text-muted'>Already have an account?
                                    <a href="{{ route('login') }}" class="fw-bold text-primary">Log in</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-layouts.base-scripts />
</x-layouts.base-header>