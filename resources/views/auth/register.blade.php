{{-- <h2>Register</h2> --}}

{{-- @if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
@endif --}}

<form method="POST" action="{{ route('register') }}">
    @csrf 
    <label>Nama Lengkap:</label><br>
    <input type="text" name="nama" required><br>
    
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    
    <label>Alamat:</label><br>
    <input type="text" name="alamat" required><br>
    
    <label>No HP:</label><br>
    <input type="text" name="no_hp" required><br>
    
    <label>No KTP:</label><br>
    <input type="text" name="no_ktp" required><br>
    
    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    
    <label>Konfirmasi Password:</label><br>
    <input type="password" name="password_confirmation" required><br><br>

    <button type="submit">Daftar</button>
</form>

<p>Sudah punya akun? <a href="{{route('login') }}"><b>Login</b></a></p>

<x-layouts.guest>
    <div class="login-box d-flex flex-column justify-content-center align-items-center w-100 vh-100">
        <div class="login-logo">
            <a href="/login"><b>Poliklinik</b></a>
        </div>
        <!-- /.login-logo -->
         <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Harap Daftar terlebih dahulu!</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama" required placeholder="Nama Lengkap" >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" required placeholder="Email"  >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-location-dot"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="no_hp" placeholder="No HP" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-mobile"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="no_ktp" required placeholder="No KTP">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <ul style="color:red">
                            @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="row">
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </div>
                </form>

                <p class="mb-0">
                    Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
         </div>
    </div>
</x-layouts.guest>