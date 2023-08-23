<?php 


session_start();
session_commit();
if (isset($_SESSION['pseudo'])){
    $pseudo = $_SESSION['pseudo'];
    $id = $_SESSION['id_user'];
    // echo"bienvenue'".$pseudo."'";
    // echo"<script language='javascript'>
    //         alert('bienvenue .$pseudo')</script>";
}
else{
    echo"<script language='javascript'>
        alert('veuillez reconnecter ultérieurement')</script>";

    header("location:sign_in.php");
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="index" content="index">
    <meta name="ernest" content="cv,curriculum, vitae, en, ligne">
	<title> ...information personnelles...</title>
	<link rel="icon" type="image/jpg" size="30x30" href="images/orange.jpg">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.bundle.min.js">
	<style type="text/css">
		.form-control{
			margin-top: 20px;
			font-weight: bolder;
			width: 98%;
			float: center;
			border: solid grey;
			margin-left: 5px;
			margin-bottom: 20px;
		}
		fieldset{
			/*border: 1px solid green;*/

		}
		.labelY{
			font-weight: bold;

		}
/*		input[radio]:{
			margin-right: 30px;
		}*/

		.radioinput {
			margin-right: 20px;
		}
		.afficheimg {
			background-image:url('images/inscrire .jpg');
			background-repeat: no-repeat;
			background-size: cover;
			position: center;
	
			margin-bottom: 30px;
			width: 160px;
			height: 130px;
			background-color: grey;
			border: 2px solid grey;
			float: right;
			padding:5px;
		}
		/*.image-form{
			width: 60px;
			background-color: red;
		}*/

	</style>
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
<div class="container" style="margin-bottom: 40px;">
	<center class="text-center" style="text-shadow:3px 10px 5px blue;"><h2><strong>INFORMATIONS </strong>&nbsp;<i> PERSONNELLES</i></h2></center>
</div>
	<!-- <div class="container">
	 	<div class="row">
	 		<div class="col-lg-3">
	 			<div class="menu-items">
	 				<a href="" class="btn btn-secondary" id="bouton" style="width:250px;margin-top:20px;">informations personnelles</a>
	 				<a href="" class="btn btn-info" id="bouton" style="width:250px;margin-top:20px;">expérience proféssionnelle</a>
	 				<a href="" class="btn btn-warning" id="bouton" style="width:250px;margin-top:20px;">détails academique</a>
	 				<a href="" class="btn btn-primary" id="bouton" style="width:250px;margin-top:20px;">loisir et intérêt</a>
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
 	</div> -->

 	<div class="container">
 		
		<form method="POST" action="info_perso_insert.php" enctype="multipart/form-data">
	 		<div class="row">
	 			<div class="col-lg-7">
	 				<fieldset class="field-marg">
	 					<legend class="legen-borderer">IDENTITE</legend>
	 					<div class="form-group">
	 						<input type="text" name="nom_ch" placeholder="NOM et PRENOMS" class="form-control" required>
	 						<label></label>
	 					</div>
	 					<div class="form-group">
	 						<input type="text" name="date_ch" placeholder="DATE DE NAISSANCE" class="form-control">
	 						<label></label>
	 					</div>
	 				</fieldset>
	 					<div class="form-group">
	 						<fieldset class="field-marg">
	 							<legend class="legen-borderer">SITUATION FAMILIALE</legend>
	 							<label class="labelY" for="celibataire">celibataire</label>
	 								<input type="radio" class="radioinput" name="situation_ch" value="celibataire" checked>
	 							<label class="labelY"  for="marie">marié(e)</label>
	 								<input type="radio" class="radioinput" name="situation_ch" value="marié(e)">
	 							<label class="labelY"  for="divorcée" >divorcé(e)</label>
	 								<input type="radio" class="radioinput" name="situation_ch" value="divoré(e)">
	 							<label class="labelY"  for="veuve(f)">veuve(f)</label>
	 								<input type="radio" class="radioinput" name="situation_ch" value="veuve(f)">
	 							
	 						</fieldset>
	 					</div>
	 					<fieldset class="field-marg">
	 						<legend class="legen-borderer">Adresse</legend>
		 					<div class="form-group">
		 						<input type="email" name="email_ch" placeholder="E-MAIL" class="form-control">
		 						<label></label>
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="phone_ch" placeholder="NUMERO TELEPHONE" class="form-control">
		 						<label></label>
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="adresse1_ch" placeholder="LOT" class="form-control">
		 						<label></label>
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="adresse2_ch" placeholder="QUARTIER" class="form-control">
		 						<label></label>
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="adresse3_ch" placeholder="VILLE" class="form-control">
		 						<label></label>
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="adresse4_ch" placeholder="PAYS" class="form-control">
		 						<label></label>
		 					</div>
		 				</fieldset>
	 				
	 				<p>
	 					<input type="submit" name="enregistrer" id="enregistrer" class="btn btn-primary" value="Enregistrer">
	 					<!-- <a href="exp_prof.php" class="btn btn-primary">Suivant</a> -->
	 					<a href="index.php" class="btn btn-danger">Annuler</a>
	 				</p>
	 			</div>

	 			<div class="col-lg-5">
	 				<div class="image-form">
		 				
		 				<div class="afficheimg" style="">

		 					
		 					<center> 
		 						<img src="" name="image" id="affiche_image" alt="photo d'identité"  height="120" width="150">
		 					</center>
		 					<!-- <strong><center>photo</center></strong> -->
		 				</div>
		 				<center><input type="file" name="image_ch" placeholder="IMAGES" class="form-control" width="60" onselect="selection()"></center>
		 			</div>
		 			<div class="container" style="margin-top: 50%;">
			 			<fieldset class="field-marg">
			 				<legend class="legen-borderer">LANGUES</legend>
			 				<input type="text" name="langue_ch" placeholder="LANGUES" class="form-control">
			 				<label></label>
			 			</fieldset>
			 			<fieldset class="field-marg">
			 				<legend class="legen-borderer">NATIONALITE</legend>
			 				<input type="text" name="nationalite_ch" placeholder="NATIONALITE" class="form-control">
			 				<label></label>
			 			</fieldset>
	 				</div>
	 			</div>
	 		</div>
		</form>
	 	
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
	<link rel="stylesheet" type="text/css" href="js/jquery-3.6.0.js">

	<script type="text/javascript">
		function selection(){
			var a = document.getElementById('image_ch');
			var res = document.getElementById('affiche_image');
			res.value = a.value;
			alert(res.value);
		}
	</script>
	<script>
$(function (){
// Réinitialisation
	$('#enregistrer').click(function(){
	localStorage.clear();
	location.reload() ;
});

});
</script>
</body>
</html>