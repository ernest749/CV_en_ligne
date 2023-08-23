
<?php 

    // session_start();
    // session_commit();

    // if ($_SESSION["autoriser"]!="oui") {
    //     header("location:connexion.html");
    
    // }


session_start();
session_commit();
if ($_SESSION["autoriser"]!="oui") {
    header("location:sign_in.php");
    
}
else{
	if (isset($_SESSION['pseudo'])){
	    $pseudo = $_SESSION['pseudo'];
	    $id = $_SESSION['id_user'];
	    echo"bienvenue'".$pseudo."'";
	    echo"<script language='javascript'>
	            alert('bienvenue .$pseudo')</script>";
	}
	else{
	    echo "veuillez reconnecter";
	    header("location:sign_in.php");
	    }

}
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="index" content="index">
    <meta name="ernest" content="cv,curriculum, vitae, en, ligne">
	<title> cv en ligne</title>
	<link rel="icon" type="image/jpg" size="30x30" href="images/orange.jpg">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.bundle.min.js">
</head>
<body>
<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-1 col-lg-3">
		
				<div class="top-header-left">
					<span class="titre">cv en ligne</span>
				</div>
			</div>
		
			<div class="col-lg-6"></div>
			<div class=" col-lg-3">
				<div class="top-header-right">
					<div class="dec"><a href="deconnexion.php" class="btn btn-danger">Déconnexion</a></div>
				</div>
			
			</div>
		</div>



	</div>

</header>
<section>
<div class="container">
	<p class="text-center">creation cv en ligne</p>
</div>
	<div class="container">
	 	<div class="row">
	 		<div class="col-lg-3">
	 			<div class="menu-items">
	 				<a href="" class="btn btn-secondary" id="bouton" style="width:250px;margin-top:20px;">informations personnelles</a>
	 				<a href="" class="btn btn-info" id="bouton" style="width:250px;margin-top:20px;">expérience proféssionnelle</a>
	 				<a href="" class="btn btn-warning" id="bouton" style="width:250px;margin-top:20px;">détails academique</a>
	 				<a href="" class="btn btn-primary" id="bouton" style="width:250px;margin-top:20px;">loisir et intérêt</a>
	 				<a href="cv1.php" class="btn btn-success" id="bouton" style="width:250px;margin-top:20px;">Générer</a>
	 			</div>
	 		</div>
	 		<div class="col-lg-3">
	 			<img src="images/image1.JPG" class="image-fond">
	 		</div>
	 		<div class="col-lg-6">
	 			<span class="description-page">
	 				
	 				    cette application permettra aux utilisateurs de <b><a href="" style="text-decoration:none;"> créer CV </a></b>
                            il permettra à l'utilisateur de saisir les données de base pour son CV 
                            telles que son nom, son adresse, ses compétences, son expérience professionnelle,
                             et bien plus encore.
                             
	 			</span>
	 		</div>
	 	</div>
 	</div>
 	<div class="row">
 		<div class="col-lg-1"></div>
 		<div class="col-lg-10">
 			<span class="description-page2">
 				La page devrait inclure des modèles pour les CV ainsi qu'un ensemble de règles de mise en forme pour assurer l'homogénéité des différents modèles de CV
                La page doit également être capable de traduire ces données entrées par l'utilisateur en un CV bien structuré et formaté automatiquement,</span>
                <p class="style2"> ce qui permettra
                à l'utilisateur de gagner du temps et d'obtenir un CV professionnel en quelques clics.</p>
 			
 		</div>
 		<div class="col-lg-1"></div>
 	</div>
	
</section>

<footer>
    <div class="footer-t">
    <hr class="footer-line">

    <div class="footer-last-section">
        <div class="container">
            <span>Copyright By &copy; <a href="mailto:ernest749@gmail.com" target="_blank">ernest </a> &reg;  2023</span>
        </div>
    </div>

    <hr class="footer-line"></div>
</footer>
	<link rel="stylesheet" type="text/css" href="css/jquery-3.6.0.js">
</body>
</html>