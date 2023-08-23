<?php 


session_start();
session_commit();
if (isset($_SESSION['pseudo'])){
    $pseudo = $_SESSION['pseudo'];

    $info_perso= @$_SESSION["info_perso"];
    // $id_inf_pers = @$_SESSION['id_inf_pers'];


    $id = $_SESSION['id_user'];
    // echo"bienvenue'".$pseudo."'";
    // echo"<script language='javascript'>
    //          alert('L identité de votre information personnelle est: .$id_inf_pers')</script>";
}
else{
    echo "veuillez réssayer ultérieurement";
    header("location:sign_in.php");
    }
?>

<?php
	//if ($_POST['id']) {
		 $idd=$_GET["num"];
		 // var_dump($idd);
	
		//Ouverture d'une connexion à la base agenda
		$objetPdo = new PDO('mysql:host=localhost;dbname=cv','root','');
		// echo "objetPdo";
		// var_dump($objetPdo);

		//Préparation de la requête
		$pdoStat = $objetPdo->prepare(" SELECT * FROM experience_professionnelle WHERE id_exp_prof= $idd LIMIT 1");
		// $pdoStat = $objetPdo->prepare("DELETE FROM experience_professionnelle WHERE id_inf_pers=:id LIMIT 1");

		//liaison du parametre nommé
		// $pdoStat->bindValue(':id', $idd, PDO::PARAM_INT);
		// echo "pdoStat";
		// var_dump($pdoStat);
		//éxecution de la requête
		$executeIsOk = $pdoStat->execute();
		$donnee = $pdoStat->fetch();
		// echo "execute";
		// var_dump($executeIsOk);
		// var_dump($donnee);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="index" content="index">
    <meta name="ernest" content="cv,curriculum, vitae, en, ligne">
	<title> ...experience professionnelles...</title>
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
		.fieldshet{
			border: 1px solid #000013;
			margin: 10px;
			padding: 10px;
			border-radius: 10px;
			text-shadow:3px 10px 5px grey;
			background-color: white;
		}
		.labelY{
			font-weight: bold;

		}
		#organisation,
		#description{
			font-weight: bold;
			color: grey;
		}
		.exp{
			border: 1px solid #CCCCCC;
			margin-top: 10px;
			margin-bottom: 20px;
			padding: 5px;
		}
		.exp legend{
			color: red;
			background-color: #CCCCCC;
		}
		.form-selec{
			position: bottom;

		}
		.selectionner{
			margin-right: 30px;
			float: right;
		}
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
<section style="background:linear-gradient(75deg, white,grey);">
<div class="container" style="margin-bottom: 40px;">
	<center class="text-center" style="text-shadow:3px 10px 5px blue;"><h2><strong> EXPERIENCES</strong>&nbsp;<i> PROFESSIONNELLES</i></h2></center>
</div>


 	<div class="container">
 		
		
	 		<div class="row">

	 			<div class="col-lg-4"></div>
	 			<div class="col-lg-4">
	 				<fieldset class="fieldshet">
	 				<legend class="" style="background-color:#000013;text-align:center;color:white;"><strong>modification d'expérience professionnelle</strong></legend>
	 					<form  method="POST" action="" enctype="multipart/form-data">
	 						
	 						<input type="hidden" name="id" value="<?= $donnee['id_exp_prof'] ?>" >
	 						<input type="hidden" name="id_inf_pers" value="<?= $donnee['id_inf_pers'] ?>" >
	 					
		 					<div class="form-group">
		 						<input type="text" name="organisation_ch" placeholder="ORGANISATION" class="form-control" value="<?= $donnee['organisation'] ?>" required>
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="designation_ch" placeholder="DESIGNATION" class="form-control" value="<?= $donnee['designation'] ?>" required>
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="date_ch" class="form-control" placeholder="DATE" value="<?= $donnee['date'] ?>" required>
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="role_ch" class="form-control" placeholder="RÔLE" value="<?= $donnee['role'] ?>" required>
		 					</div>
		 					<div class="form-group">
		 						<textarea name="description_ch" class="form-control" placeholder="DESCRIPTION" value="<?= $donnee['description'] ?>"><?= $donnee['description'] ?></textarea>
		 					</div>
		 					<input type="submit" name="modifier" value="modifier" class="btn btn-success">

	 					</form>
	 				</fieldset>

	 					
	 				
	 				<p>
	 					<!-- <input type="submit" name="enregistrer" class="btn btn-primary" value="Enregistrer"> -->
	 					<a href="exp_prof.php" class="btn btn-warning" style="margin-left:15px; margin-right:30px;">retour</a>
	 					<a href="">&nbsp;</a>
	 					<a href="index.php" class="btn btn-danger">Accueill</a>
	 				</p>
	 			</div>

	 			<div class="col-lg-4">
	 			<div class="container">

	 			</div>

	 				
	 		</div>
		
	 	
 	</div>

	<?php 
		if (isset($_POST['modifier']) && sizeof($_POST)>0) {
			    $id_inf_pers = $_POST['id_inf_pers'];
			    $num = $_POST['id'];
			    $organisation = $_POST['organisation_ch'];
			    $designation = $_POST['designation_ch'];
			    $datee = $_POST['date_ch'];
			    $role = $_POST['role_ch'];
			    $description = $_POST['description_ch'];

			 	// $objetPdo= new PDO('mysql:host=localhost;dbname=cv','root','');

			   $pdoStat2=$objetPdo->prepare("UPDATE experience_professionnelle  SET id_inf_pers=:id_inf_perss, organisation=:organisationn, designation=:designationn, date=:datee, role=:rolee, description=:descriptionn WHERE id_exp_prof=:num");

			    $pdoStat2->bindValue(':num', $num, PDO::PARAM_INT);
			    $pdoStat2->bindValue(':id_inf_perss', $id_inf_pers, PDO::PARAM_INT);
			    $pdoStat2->bindValue(':organisationn', $organisation, PDO::PARAM_STR);
			    $pdoStat2->bindValue(':designationn', $designation, PDO::PARAM_STR);
			    $pdoStat2->bindValue(':datee', $datee, PDO::PARAM_STR);
			    $pdoStat2->bindValue(':rolee', $role, PDO::PARAM_STR);
			    $pdoStat2->bindValue(':descriptionn', $description, PDO::PARAM_STR);

        
			    $executionIsOk = $pdoStat2->execute();

			    if($executionIsOk){
			   		echo"<script language='javascript'>
    		         alert('modification effectué')</script>";
    		        //var_dump($pdoStat2);
    		        
    		        
			    }
			   	else{
			   		echo"<script language='javascript'>
    		         alert('erreur de modification')</script>";
    		         
			   	}
			   	echo"<script>document.location = 'exp_prof.php'</script>";
				//header('Location: liste_mention.php');
		}
	

 	?>
	
</section>

<footer>
    <div class="footer-t">
    	<hr class="footer-line">

	    <div class="footer-last-section">
	        <div class="container">
	            <span>Copyright By &copy; <a href="mailto:ernest749@gmail.com" target="_blank">ernest </a> &reg;  2023</span>
	        </div>
	    </div>

	    <hr class="footer-line">
	    </div>
</footer>
	<link rel="stylesheet" type="text/css" href="js/jquery-3.6.0.js">

	<script language="Javascript">

        function afficherDestination(lien){                  
                 var mess="supprimer_exp_prof.php?num=";
                var mess1="exp_prof.php";
                if(confirm('Vous etes sur de vouloir supprimer ? ')){
                    lien.href=mess + lien.name;
                 }else{
                        lien.href=mess1;
                    }

        }
    </script>

</body>
</html>