<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!--Fontawesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-7">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="bg-light text-center">
                                        <h2 class="mt-1 mb-3 pb-1" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                            <b>
                                                <i class="fas fa-user" style="font-size: 1.2em;"></i> <!-- User icon with maroon color -->
                                                <span style="font-style: italic;">e</span><span>-Aduan </span><span style="color: #800000;">FGVIC</span>
                                            </b>
                                        </h2>                                 
                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="email">Emel</label>
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan emel" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="password">Kata laluan</label>
                                            <div class="input-group">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan kata laluan" name="password" required autocomplete="current-password">
                                                <span class="input-group-text">
                                                    <i class="fas fa-eye" id="togglePassword"></i>
                                                </span>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember" style="color: #A5A4A4"> 
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button class="btn btn-dark btn-block fa-lg" type="submit" style="min-width:100%;">Log Masuk</button>
                                        </div>

                                        <div class="form-outline d-flex justify-content-center">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #d8363a;">Lupa kata laluan</a>
                                            @endif
                                        </div>

                                    </form>

                                </div>
                            </div>
                            
                            <div class="col-lg-5 d-flex align-items-center gradient-custom-2">
                                <!-- <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h2 class="mb-2">FGV BunchTracker</h2>
                                    <p class="medium mb-0">Tracking . Quality . Sustainability</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            togglePassword.classList.toggle("fa-eye");
            togglePassword.classList.toggle("fa-eye-slash");
        });
    </script>

    <style>
    .gradient-custom-2 {
        position: relative;
        background: url('{{ asset("images/fgvic.jpg") }}') center/cover;

        /* Overlay */
        &:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Adjust the alpha value (last parameter) for the desired transparency */
        }
    }

    .gradient-custom-2 .text-white {
        position: relative;
        z-index: 1; /* Ensure the text is on top of the overlay */
    }
        @media (min-width: 768px) {
            .gradient-form {
                min-height: 100vh !important;
                display: flex;
                align-items: center;
            }
        }
        @media (min-width: 769px) {
            .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
            }
        }

    </style>
</body>

