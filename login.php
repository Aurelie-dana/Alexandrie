<!DOCTYPE html>
<html style="background: #579DD7;">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Se connecter</title>
    <link rel="stylesheet" href="/admin/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?	family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/admin/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/admin/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/admin/fonts/fontawesome5-overrides.css">
</head>
<body class="bg-gradient-primary" style="background: #579DD7;">
<?php
require('config.php');
session_start();
if (isset($_POST['nom'])){
  $nom = stripslashes($_REQUEST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom);
  $_SESSION['nom'] = $nom;
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE nom='$nom' 
  and password='".hash('sha256', $password)."'";
  
  $result = mysqli_query($conn,$query) or die(mysql_error());
  
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    if ($user['type'] == 'admin') {
      header('location: admin/tableau-employe.php');      
    }else{
      header('location: admin/tableau-inscrit.php');
    }
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10" style="background: #579DD7;">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex" style="background: url(/admin/img/livre.png) no-repeat;">
                                <div class="flex-grow-1 bg-login-image"></div>
                            </div>
                            <div class="col-lg-6" style="background: url(/admin/img/point.png);">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Bienvenue !&nbsp;</h4>
                                    </div>
                                    <form class="box user" action="" method="post" name="login">
                                <div class="mb-3"><input type="text" class="box-input form-control form-control-user" name="nom" placeholder="Nom">
                                </div>
                                <div class="mb-3"><input type="password" class="box-input form-control form-control-user" name="password" placeholder="Mot de passe">
                                </div>
                                <input type="submit" value="Connexion " name="submit" class="box-button btn btn-primary d-block btn-user w-100">
                                <hr>
                                <div class="text-center"><a class="small" href="mot-de-passe-oublie.html">Mot de passe oublié ?</a>
                                </div>
                                <a href="/index.php"onclick="history.go(-1)">Retour</a>
                                <?php if (! empty($message)) { ?>
                                    <p class="errorMessage"><?php echo $message; ?></p>
                                <?php } ?>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<script src="/js/script.js"></script>
    <script src="/js/theme.js"></script>
	</body>
</html>