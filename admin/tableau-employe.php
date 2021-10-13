<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["nom"])){
    header("Location: login.php");
    exit();
  }
?>
<?php
  $host = '';
  $dbname = '';
  $username = '';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les livres
  $sql = "SELECT * FROM livres";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tableau employé</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/fontawesome5-overrides.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="color: #579DD7;background: #579DD7;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" class="border rounded-circle" style="font-size: 51px;">
                            <path d="M12 6.25278V19.2528M12 6.25278C10.8321 5.47686 9.24649 5 7.5 5C5.75351 5 4.16789 5.47686 3 6.25278V19.2528C4.16789 18.4769 5.75351 18 7.5 18C9.24649 18 10.8321 18.4769 12 19.2528M12 6.25278C13.1679 5.47686 14.7535 5 16.5 5C18.2465 5 19.8321 5.47686 21 6.25278V19.2528C19.8321 18.4769 18.2465 18 16.5 18C14.7535 18 13.1679 18.4769 12 19.2528" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></div>
                    <div class="sidebar-brand-text mx-3"><span style="font-size: 9px;">La médiathèque d'alexandrie</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="ajout-de-livre.php"><i class="fas fa-book-open"></i><span>Ajouter un livre dans le catalogue</span></a></li>
					<li class="nav-item"><a class="nav-link" href="add_user.php"><i class="fas fa-book-open"></i><span>Ajouter un utilisateur</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content" style="background: url(&quot;/img/point.png&quot;);">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="background: linear-gradient(-101deg, white 0%, rgb(169,205,235) 56%, #579DD7 98%);">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Pour chercher quelque chose, c'est par ici."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION['nom']; ?></span><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400">
											</i></a>
									
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
										
										<a class="dropdown-item" href="ajout-de-livre.php">
											<i class="fas fa-book-open">
											</i>&nbsp;Ajouter un livre dans le catalogue</a>

                                        <div class="dropdown-divider">
										</div>
										
										<a class="dropdown-item" href="/index.php">
											<i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400">
											</i>&nbsp;Deconnexion</a>
										
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-light mb-4" style="background: linear-gradient(-94deg, white 0%, #579DD7 100%);">Tableau de bord</h3>
                    <div class="card shadow">
                        <div class="card-header py-3" style="background: linear-gradient(-101deg, white 0%, #579DD7 100%);">
                            <p class="text-light m-0 fw-bold">Tableau employé</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Afficher <select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Rechercher"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
 										<thead>
                                        <tr>
											<th><strong>ID</strong></th>
                                            <th>Titre du livre</th>
                                            <th>Auteur</th>
                                            <th>Genre</th>
                                            <th>Date De Parution</th>
											 <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
								<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                                        <tr>
                                           <td><?php echo htmlspecialchars($row['id']); ?></td>
       									   <td><?php echo htmlspecialchars($row['titre']); ?></td>
										   <td><?php echo htmlspecialchars($row['auteur']); ?></td>
       									   <td><?php echo htmlspecialchars($row['genre']); ?></td>
										   <td><?php echo htmlspecialchars($row['datedeparution']); ?></td>
       									   <td><?php echo htmlspecialchars($row['description']); ?></td>
                                        </tr>
										<?php endwhile; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
											<th><strong>ID</strong></th>
                                            <td><strong>Titre du livre</strong></td>
                                            <td><strong>Auteur</strong></td>
											<td><strong>Genre</strong></td>
											<td><strong>Date De Parution</strong></td>
                                            <td><strong>Description<br></strong></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Affichage de 1 à 10 sur 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © La Médiathèque d'Alexandrie 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="js/script.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>