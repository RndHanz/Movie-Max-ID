<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up</title>
    <link rel="stylesheet" href="assets/login_form/stylelogin.css" />
</head>

<body>
    <img src="/img/logo.png" alt="logo" style="width: 40%" />
    <div class="login-container">
        <h2>Sign up</h2>

        {{-- show simple success / error messages --}}
        @if(session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif
        @if($errors->any())
            <ul style="color:red">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('signup.store') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}" />
            <input type="text" name="username" placeholder="Username" required value="{{ old('username') }}" />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" value="Sign up" />
        </form>

        <div class="text-info">
            <a href="https://t.me/MovieMaxID">Need Help?</a>
            <p>Sudah Punya Akun? <a href="/login">Login Now</a></p>
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