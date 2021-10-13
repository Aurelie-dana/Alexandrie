<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ajout d'utilisateur</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/fontawesome5-overrides.css">
</head>
<body>

<?php
require('../config.php');
if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['email'],  $_REQUEST['datedenaissance'],  $_REQUEST['adressepostale'], $_REQUEST['type'], $_REQUEST['password'])){
  // récupérer le nom  
  $nom = stripslashes($_REQUEST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom); 
	 // récupérer le prenom
  $prenom = stripslashes($_REQUEST['prenom']);
  $prenom = mysqli_real_escape_string($conn, $prenom);
  // récupérer l'email 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
	 // récupérer la date de naissance
  $datedenaissance = stripslashes($_REQUEST['datedenaissance']);
  $datedenaissance = mysqli_real_escape_string($conn, $datedenaissance);
	 // récupérer l'adresse postale
  $adressepostale = stripslashes($_REQUEST['adressepostale']);
  $adressepostale = mysqli_real_escape_string($conn, $adressepostale);
	 // récupérer le type
  $type = stripslashes($_REQUEST['type']);
  $type = mysqli_real_escape_string($conn, $type);
  // récupérer le mot de passe 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  
  $query = "INSERT into `users` (nom, prenom, email, datedenaissance, adressepostale, type, password)
        VALUES ('$nom', '$prenom', '$email', '$datedenaissance', '$adressepostale', '$type', '".hash('sha256', $password)."')";
  $res = mysqli_query($conn, $query);
	
    if($res){
       echo 
		   "<div class='container'>
    <div class='card shadow-lg o-hidden border-0 my-5'>
        <div class='card-body p-0' style='background: url(&quot;/img/point.png&quot;);'>
            <div class='row'>
                    <div class='p-5'>
                        <div class='text-center'>
							<h1>Félicitations ! </h1>
                            <h3>L'utilisateur a été créée avec succès.</h3>
             				<p>Cliquez <a href='tableau-employe.php'>ici</a> pour retourner sur votre tableau de bord</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>";
    }
}else{
?>

<div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex" style="background: url(&quot;img/point.png&quot;);">
                        <div class="flex-grow-1 bg-register-image" style="background: url(img/livreblanc.png) center no-repeat;"></div>
                    </div>
                    <div class="col-lg-7" style="background: url(&quot;/img/point.png&quot;);">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Bienvenue dans la page d'ajout d'utilisateur<br></h4>
                            </div>
                            <form class="user" action="" method="post">
								
                                <div class="row mb-3">
									<div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user" name="nom" placeholder="Nom" required /></div>
                                    <div class="col-sm-6"> <input type="text" class="form-control form-control-user" name="prenom" placeholder="Prenom" required /></div>
                              </div>
								
								<div class="row mb-3">
									<div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="email" id="email" aria-describedby="email" placeholder="Adresse e-mail" name="email"></div>
                                    <div class="col-sm-6"><input type="date" class="form-control form-control-user" name="datedenaissance" placeholder="Date de Naissance" required /></div>
                              </div>	
								
									<div class="mb-3"><input type="text" class="form-control form-control-user" name="adressepostale" placeholder="Adresse Postale" required /></div>


								<div class="row mb-3">
											<div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="password" placeholder="Mot de passe" name="password"></div>

									  <div class="col-sm-6">
											<select class="form-control form-control-user box-input " name="type" id="type" required>
											 <option value="" disabled selected>Veuillez sélectionner le type</option>
											 <option value="admin">Admin</option>
											 <option value="user">User</option>
											</select>
                             		  </div>
									
                              </div>		      
                          
                   <input type="submit" value="Ajouter utilisateur " name="submit" class="box-button btn btn-primary d-block btn-user w-100" href="admin/tableau-employe.php">
								<br>
      <a href="tableau-employe.php"onclick="history.go(-1)">Retour</a>
                                                              <?php if (! empty($message)) { ?>
                                                              <p class="errorMessage"><?php echo $message; ?></p>
                                                              <?php } ?>
                                          </form>
                                          <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="js/script.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>