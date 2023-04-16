<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    {{--boxiconsjs.com--}}
    <script src="https://unpkg.com/boxicons"></script>
    @vite('resources/css/auth.css')
</head>
<body>
<div class="register-container">
    <div class="register-box">
        <div class="logo">
            <box-icon type='logo' name='graphql' color="#ea732e" size="60px"></box-icon>
        </div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter name" required autofocus>
                @error('name')
                <span class="msg error" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" required>
                @error('email')
                <span class="msg error" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" placeholder="Enter password" required>
                @error('password')
                <span class="msg error" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="terms" id="terms" class="@error('terms') is-invalid @enderror" required>
                <label for="terms">I agree to the <a href="#">terms and conditions</a></label>
                @error('terms')
                <span class="msg error" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
        <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</div>
</body>
</html>
