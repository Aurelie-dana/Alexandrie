v<!DOCTYPE html>
<html style="background: #579DD7;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ajout de Livre</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/fontawesome5-overrides.css">
</head>

<body class="bg-gradient-primary" style="background: #579DD7;">
	
<?php
require('../config.php');

if (isset($_REQUEST['titre'], $_REQUEST['auteur'], $_REQUEST['genre'], $_REQUEST['datedeparution'], $_REQUEST['description'])){
  // récupérer le titre
  $titre = stripslashes($_REQUEST['titre']);
  $titre = mysqli_real_escape_string($conn, $titre); 
  // récupérer l'auteur 
  $auteur = stripslashes($_REQUEST['auteur']);
  $auteur = mysqli_real_escape_string($conn, $auteur);
  // récupérer le genre 
  $genre = stripslashes($_REQUEST['genre']);
  $genre = mysqli_real_escape_string($conn, $genre);
  // récupérer la date
  $datedeparution = stripslashes($_REQUEST['datedeparution']);
  $datedeparution = mysqli_real_escape_string($conn, $datedeparution);
	 // récupérer la description
  $description = stripslashes($_REQUEST['description']);
  $description = mysqli_real_escape_string($conn, $description);
  
    $query = "INSERT into `livres` (titre, auteur, genre, datedeparution, description)
          VALUES ('$titre', '$auteur', '$genre', '$datedeparution', '$description')";
    $res = mysqli_query($conn, $query);

    if($res){
       echo 
"<div class='container'>
    <div class='card shadow-lg o-hidden border-0 my-5'>
        <div class='card-body p-0' style='background: url(&quot;/img/point.png&quot;);'>
            <div class='row'>
                    <div class='p-5'>
                        <div class='text-center'>
                            <h3>Le livre à été ajouté au catalogue avec succès ! </h3>
                            <p>Pour retourner au tableau de bord cliquez<a href='tableau-employe.php'</a> ici</p>
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
                                <h4 class="text-dark mb-4">Bienvenue dans la page d'ajout de livre<br></h4>
                            </div>
                           <form class="user" action="" method="post">
								
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user mb-3" name="titre" placeholder="Titre" required /></div>
                                    <div class="col-sm-6"><input type="text" class="form-control form-control-user mb-3" name="auteur" placeholder="Auteur" required /></div>
                                </div>
							   
							    <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user mb-3" type="text" id="genre" aria-describedby="genre" placeholder="Genre" name="genre"></div>
                                    <div class="col-sm-6"><input type="date" class="form-control form-control-user mb-3" name="datedeparution" placeholder="Date De Parution" required /></div>
                                </div>
							   
                                <div class="col mb-3"><input type="text" class="form-control form-control-user mb-3 " name="description" placeholder="Description" required /></div>
                      
                   <input type="submit" value="Ajouter un livre" name="submit" class="box-button btn btn-primary d-block btn-user w-100" href="tableau-employe.php">
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