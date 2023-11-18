

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | CPanel</title>
    <link rel="stylesheet" href="/assets/css/csslogin.css">

    <link rel="icon" href="{{ 'assets/img/tt2.png' }}">

    @include('partials.stylinglogin')
    

</head>
<body>
    
        
        <div class="container" id="container">
            <div class="form-container sign-up">
                @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="" method="POST">
                
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon">
                        <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-github"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>
                <span>or use your email for Register</span>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="" method="POST">
                @csrf
                <h1>Welcome back!</h1>
                <div class="social-icons">
                    <a href="#" class="icon">
                        <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-github"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>
                <span>or use your email and password</span>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="email">
                <input type="password" name="password" class="form-control" placeholder="password">
                <a href="#">Forget Your Password?</a>
                <button name="submit" type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <span><img src="/assets/img/tt2.png" class=""></span>
                    <h1>Welcome Back, Teman Transit!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <span><img src="/assets/img/tt2.png" class=""></span>
                    <h1>Hello, <br> Teman Transit!</h1>
                    <p>Register your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <img class="dood" src="/assets/img/doodleart.png" alt=""> --}}
</body>
@include('partials.scriptslogin')

</html>