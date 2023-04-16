<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/auth.css')
</head>
<body>
<div class="register-container">
    <div class="register-box">
        {{--<div class="logo">
            <img src="logo.png" alt="Logo">
        </div>--}}
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">?????????????????????????????
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="terms" id="terms">
                <label for="terms">I agree to the <a href="#">terms and conditions</a></label>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
            <div class="form-group">
                <span class="msg error">{{ $errors->first('name') }}</span>
                <span class="msg error">{{ $errors->first('email') }}</span>
                <span class="msg error">{{ $errors->first('password') }}</span>
                <span class="msg error">{{ $errors->first('password_confirmation') }}</span>
                <span class="msg error">{{ $errors->first('terms') }}</span>
            </div>
        </form>
        <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</div>
</body>
</html>
