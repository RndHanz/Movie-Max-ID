<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/login_form/stylelogin.css" />
</head>

<body>
    <img src="/img/logo.png" alt="logo" style="width: 40%" />
    <div class="login-container">
        <h2>Login</h2>

        @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
        @endif

        @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
        </ul>
        @endif

        <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf
            <input type="text" name="login" placeholder="Username atau Email" required value="{{ old('login') }}" />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" value="Login" />
        </form>
        <div class="text-info">
            <a href="https://t.me/MovieMaxID">Need Help?</a>
            <p>Belum Punya Akun? <a href="/signup">Sign Up Now</a></p>
        </div>
    </div>

    <!-- Footer start-->
    <footer>
        <div class="socials">
            <a href="https://t.me/MovieMaxID"><i data-feather="twitter"></i></a>
        </div>

        <div class="links">
            <a href="/">Home</a>
        </div>

        <div class="credit">
            <p>Movie <a href="">Max</a> Indonesia | &copy; 2024.</p>
        </div>
    </footer>
    <!-- Footer end-->
</body>

</html>