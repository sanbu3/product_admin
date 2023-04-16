<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://unpkg.com/boxicons"></script>
    @vite('resources/css/auth.css')
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <div class="logo">
            <box-icon type='logo' name='graphql' color="#ea732e" size="60px"></box-icon>
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter password">
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            <div class="form-group">
                <span class="msg error">{{ $errors->first('email') }}</span>
                <span class="msg error">{{ $errors->first('password') }}</span>
            </div>
        </form>
        <div class="signup-link">
            Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </div>
</div>
</body>
</html>
