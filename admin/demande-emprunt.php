<!DOCTYPE html>
<html style="background: #579DD7;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Demande d'emprunt</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/fontawesome5-overrides.css">
</head>

<body class="bg-gradient-primary" style="background: #579DD7;">
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
                                <h4 class="text-dark mb-4">Bienvenue dans la page de demande d'emprunt<br></h4>
                            </div>
                           <form class="user">
								
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user mb-3" name="titre" placeholder="Titre" required /></div>
                                    <div class="col-sm-6"><input type="text" class="form-control form-control-user mb-3" name="auteur" placeholder="Auteur" required /></div>
                                </div>
							   
							    <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user mb-3" type="text" id="genre" aria-describedby="genre" placeholder="Genre" name="genre"></div>
                                </div>
                      
                   <input type="submit" value="Demande d'emprunt" name="submit" class="box-button btn btn-primary d-block btn-user w-100" href="tableau-inscrit.php">
							   <br>
      <a href="tableau-inscrit.php"onclick="history.go(-1)">Retour</a>
							   
                                         </form>
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