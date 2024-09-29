<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('auth/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup hidden" id="signup-section">
            <div class="container" style="top:10%;left: 50%;">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
    @csrf
    <div class="form-group">
    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
    <input type="text" name="name" id="name" placeholder="Nom" required />
</div>
<div class="form-group">
    <label for="contactdetails"><i class="zmdi zmdi-phone"></i></label>
    <input type="text" name="contactdetails" id="contactdetails" placeholder="Contact Details" required />
</div>

<div class="form-group">
    <label for="email"><i class="zmdi zmdi-email"></i></label>
    <input type="email" name="email" id="email" placeholder="Adresse mail" required />
</div>
<div class="form-group">
    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
    <input type="password" name="password" id="pass" placeholder="Mot de passe" required />
</div>
<div class="form-group">
    <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
    <input type="password" name="password_confirmation" id="re_pass" placeholder="Confirmez le mot de passe" required />
</div>

<div class="form-group form-button">
    <button type="submit" class="btn btn-primary form-submit">S'inscrire</button>
</div>

</form>

                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('auth/images/signup-image.jpg') }}" alt="sign up image"></figure>
                        <a href="javascript:void(0);" class="signup-image-link" id="already-member-link">Déjà un membre?</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sign in form (hidden by default) -->
        <section class="sign-in" id="signin-section">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                    <figure><img src="{{ asset('auth/images/signup-image.jpg') }}" alt="sign up image"></figure>
                    <a href="javascript:void(0);" class="signup-image-link" id="create-account-link" >Crér un compte</a>
                    <a href="javascript:void(0);" class="signup-image-link" id="create-agence-link">Créer Compte Agence</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">S'identifier</h2>
                        <form id="login-form" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
        <input type="email" name="email" id="your_name" placeholder="Adresse" required />
    </div>
    <div class="form-group">
        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
        <input type="password" name="password" id="your_pass" placeholder="Mot de passe" required />
    </div>
    <div class="form-group">
        <input type="checkbox" name="remember" id="remember-me" class="agree-term" />
        <label for="remember-me" class="label-agree-term">
            <span><span></span></span>Rappeler moi
        </label>
    </div>
    <div class="form-group form-button">
        <button type="submit" class="btn btn-primary form-submit">S'identifier</button>
    </div>
</form>


                        
                    </div>
                </div>
            </div>
        </section>
        <section class="signup  hidden" id="signup-agence-section">
    <div class="container" style="top:10%;left: 50%;">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Inscription agences</h2>
                <form method="POST" action="{{ route('registerAgence') }}" class="register-form" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="Nom de l'agence" required/>
                    </div>
                    <div class="form-group">
                        <label for="lieu"><i class="zmdi zmdi-home"></i></label>
                        <input type="text" name="lieu" id="lieu" placeholder="Lieu de l'agence" required/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Adresse email" required/>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe" required/>
                    </div>
                    <div class="form-group">
                        <label for="re_pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="password_confirmation" id="re_pass" placeholder="Confirmer le mot de passe" required/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required/>
                        <label for="agree-term" class="label-agree-term">
        <span><span></span></span>J'accepte les politiques du site
    </label>
                    </div>
                    <div class="form-group form-button">
                        <button type="submit" class="btn btn-primary form-submit">S'inscrire</button>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{ asset('auth/images/signup-image.jpg') }}" alt="sign up image"></figure>
                <a href="javascript:void(0);" class="signup-image-link" id="already-member-link-agence">Déjà un membre?</a>
            </div>
        </div>
    </div>
</section>

    </div>

    <!-- JS -->
    <script src="{{ asset('auth/js/script.js') }}"></script>
    <script src="{{ asset('auth/vendor/jquery/jquery.min.js') }}"></script>
    <script>
document.getElementById('already-member-link').addEventListener('click', function() {
    document.getElementById('signup-section').classList.add('hidden');
    document.getElementById('signin-section').classList.remove('hidden');
    document.getElementById('login-form').style.display = 'block'; // Show the login form
});

document.getElementById('create-account-link').addEventListener('click', function() {
    document.getElementById('signin-section').classList.add('hidden');
    document.getElementById('signup-section').classList.remove('hidden');
});
document.getElementById('create-agence-link').addEventListener('click', function() {
    document.getElementById('signin-section').classList.add('hidden');
    document.getElementById('signup-agence-section').classList.remove('hidden');

});
document.getElementById('already-member-link-agence').addEventListener('click', function() {
            document.getElementById('signup-agence-section').classList.add('hidden');
            document.getElementById('signin-section').classList.remove('hidden');
        });
    </script>
</body>
</html>
