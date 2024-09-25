<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

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
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Nom"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Prénom"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Adresse mail"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Mot de passe"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>J'accepte les politiques du site</label>
                            </div>
                            <div class="form-group form-button">
                                <a href="../index.html" class="btn btn-primary form-submit" role="button" style=" text-decoration: none;">S'inscrire</a>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sign up image"></figure>
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
                        <figure><img src="images/signin-image.jpg" alt="sign in image"></figure>
                        <a href="javascript:void(0);" class="signup-image-link" id="create-account-link" >Crér un compte</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">S'identifier</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Adresse"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Mot de passe"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Rappeler moi</label>
                            </div>
                            <div class="form-group form-button">
                                <a href="../index.html" class="btn btn-primary form-submit" role="button" style=" text-decoration: none;">S'identifier</a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script>
        document.getElementById('already-member-link').addEventListener('click', function() {
            document.getElementById('signup-section').classList.add('hidden');
            document.getElementById('signin-section').classList.remove('hidden');
        });

        document.getElementById('create-account-link').addEventListener('click', function() {
            document.getElementById('signin-section').classList.add('hidden');
            document.getElementById('signup-section').classList.remove('hidden');
        });
    </script>
</body>
</html>
