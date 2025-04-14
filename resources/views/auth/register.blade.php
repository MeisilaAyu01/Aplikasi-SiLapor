<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .register-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            overflow: hidden;
        }
        
        .register-header {
            background-color: #764ba2;
            color: white;
            padding: 25px 30px;
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            letter-spacing: 0.5px;
        }
        
        .register-form {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            font-size: 15px;
        }
        
        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            border-color: #764ba2;
            box-shadow: 0 0 0 2px rgba(118, 75, 162, 0.2);
            outline: none;
        }
        
        .invalid-feedback {
            display: block;
            color: #e3342f;
            font-size: 13px;
            margin-top: 5px;
        }
        
        .is-invalid {
            border-color: #e3342f;
        }
        
        .is-invalid:focus {
            border-color: #e3342f;
            box-shadow: 0 0 0 2px rgba(227, 52, 47, 0.2);
        }
        
        .form-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
            width: 100%;
            text-align: center;
        }
        
        .btn-primary {
            background-color: #764ba2;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #663d91;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-link {
            color: #764ba2;
            text-decoration: none;
            background: none;
            padding: 5px;
        }
        
        .btn-link:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 576px) {
            .register-container {
                border-radius: 0;
            }
            
            .register-form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            Create Account
        </div>
        
        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf
            
            <div class="form-group">
                <label for="name" class="form-label">Full Name</label>
                <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" 
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus 
                    placeholder="Enter your full name">
                
                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" 
                    name="email" value="{{ old('email') }}" required autocomplete="email" 
                    placeholder="Enter your email address">
                
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" 
                    name="password" required autocomplete="new-password" 
                    placeholder="Create a strong password">
                
                @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-input" 
                    name="password_confirmation" required autocomplete="new-password" 
                    placeholder="Confirm your password">
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Register Now
                </button>
                
                <a class="btn-link" href="{{ route('login') }}">
                    Already have an account? Login here
                </a>
            </div>
        </form>
    </div>
</body>
</html>