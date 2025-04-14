<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Body - Background with Gradient */
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Card - Styling with Shadow and Rounded Corners */
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
        }

        /* Card Header - Styling */
        .card-header {
            background-color: #2575fc;
            color: white;
            text-align: center;
            font-size: 24px;
            padding: 20px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Card Body - Padding and Background */
        .card-body {
            padding: 30px;
        }

        /* Form Control - Styling for Inputs */
        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 15px;
            font-size: 16px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
        }

        /* Input Focus - Highlight Border */
        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
            outline: none;
        }

        /* Submit Button - Styling */
        .btn-primary {
            background-color: #2575fc;
            border: none;
            border-radius: 5px;
            color: white;
            padding: 12px 30px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        /* Button Hover - Darken on Hover */
        .btn-primary:hover {
            background-color: #1a64d6;
        }

        /* Forgot Password Link - Styling */
        .btn-link {
            color: #2575fc;
            text-decoration: none;
            font-size: 14px;
        }

        /* Forgot Password Link Hover */
        .btn-link:hover {
            text-decoration: underline;
        }

        /* Remember Me Checkbox - Styling */
        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .form-check-label {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">Welcome to SiLapor!</div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                <div style="text-align: center; margin-top: 15px;">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                </div>
                @if (Route::has('register'))
    <div style="text-align: center; margin-top: 10px;">
        New on our platform? <a href="{{ route('register') }}" class="btn-link">Create an account</a>
    </div>
@endif
             
            </form>
        </div>
    </div>
</body>
</html>
