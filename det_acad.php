<?php 


session_start();
session_commit();
if (isset($_SESSION['pseudo'])){
    $pseudo = $_SESSION['pseudo'];

    $info_perso= @$_SESSION["info_perso"];
    $id_inf_pers = @$_SESSION['id_inf_pers'];


    $id = $_SESSION['id_user'];
    // echo"bienvenue'".$pseudo."'";
    // echo"<script language='javascript'>
    //          alert('L identité de votre information personnelle est: .$id_inf_pers')</script>";
}
else{
    echo "veuillez reconnecter";
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
	<title> ...détails académique...</title>
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
			border: 1px solid green;
			margin: 10px;
			padding: 10px;
			border-radius: 10px;
		}
		.labelY{
			font-weight: bold;

		}
		#universite,
		#description{
			font-weight: bold;
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
<section>
<div class="container" style="margin-bottom: 40px;">
	<center class="text-center" style="text-shadow:3px 10px 5px blue;"><h2><strong>DETAILS </strong>&nbsp;<i> ACADEMIQUE</i></h2></center>
</div>
	
 	<div class="container">
 		
		
	 		<div class="row">
	 			<div class="col-lg-4" >
	 				<fieldset class="fieldshet">
	 				<legend class="" style="background-color:#000013;text-align:center;color:white;">DETAILS ACADEMIQUES</legend>
	 					<form method="POST" action="det_acad_insert.php" enctype="multipart/form-data">
	 						
	 					
		 					<div class="form-group">
		 						<input type="text" name="diplome_ch" placeholder="DIPLÔME" class="form-control">
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="universite_ch" placeholder="UNIVERSITE" class="form-control">
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="annee_ch" class="form-control" placeholder="ANNEE D'OBTENTION">
		 					</div>
		 					<!-- <div class="form-group">
		 						<input type="text" name="description_ch" class="form-control" placeholder="DESCRIPTION">
		 					</div> -->
		 					<div class="form-group">
		 						<textarea name="description_ch" class="form-control" placeholder="DESCRIPTION"></textarea>
		 							
		 						
		 					</div>
		 					<input type="submit" name="enregistrer" value="+Ajouter" class="btn btn-success">
	 					</form>
	 				</fieldset>

	 					
	 				
	 				<p>
	 					<!-- <input type="submit" name="enregistrer" class="btn btn-primary" value="Enregistrer"> -->
	 					<a href="cv1.php" class="btn btn-primary">Suivant</a>
	 					<a href="index.php" class="btn btn-danger">Annuler</a>
	 				</p>
	 			</div>

	 		<div class="col-lg-8">
	 			<div class="container">

	 			<?php 

	 				$con= mysqli_connect("localhost","root","","cv");
                    $sql="SELECT * FROM details_academique WHERE id_inf_pers=$id_inf_pers ORDER BY id_det_ac ASC";
                    $res= $con->query($sql);

                    while ($row = $res->fetch_assoc()) {
                    	echo "



	 				<fieldset class='exp'>
	 					<legend>
	 						<label name='diplome'><strong>{$row["diplome"]}</strong></label>
	 					</legend>
	 					<div class='row'>
	 						<div class='col-sm-6'>
	 							<p><label name='universite' id='universite'><i>{$row["universite"]}</i></label></p>
	 							<p><label name='annee' id='annee'></label></p>
	 							<p><label name='description' id='description'>{$row["description"]}</label></p>

	 						</div>
	 						<div class='col-sm-2'>&nbsp;</div>
	 						<div class='col-sm-4'><p></p>
	 							<label name='datee' id='datee'><strong>{$row["annee_d_obtention"]}</strong></label>
	 						</div>
	 					</div>

						<p class='form-selec'>
							<a href='javascript:lien.href;' name='{$row["id_det_ac"]}' style='text-decoration:none;' onClick='modifier(this);' class='selectionner'><img src='images/img/b_inline_edit.png'>
								<i style='color:green;'>modifier</i></a>
							

							<a href='javascript:lien.href;' name='{$row["id_det_ac"]}' onClick='afficherDestination(this);' style='text-decoration:none;' class='selectionner'><img src='images/img/s_cancel.png' title='supprimer'><i style='color:red;'>supprimer</i></a>
 						</p>

	 				</fieldset>

	 				    ";
                    }
	 			 ?>

	 				<!-- <fieldset class="exp">
	 					<legend>
	 						<label name="designation"><strong>LICENCE</strong></label>
	 					</legend>
	 					<div class="row">
	 						<div class="col-sm-6">
	 							<p><label name="universite" id="universite"><i>Institut Supérieur et de Technologie d'Ambositra</i></label></p>
	 							<p><label name="description" id="description">Mention:Très bien</label></p>
	 							<p><label name="description" id="description">2022-2023</label></p>

	 						</div>
	 						<div class="col-sm-2">&nbsp;</div>
	 						<div class="col-sm-4">
	 							<label name="datee" id="datee">2022 - 2023</label>
	 						</div>
	 					</div>

	 				</fieldset> -->
	 			</div>

	 				
	 		</div>
		
	 	
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
	<script language="Javascript">

        function afficherDestination(lien){                  
                 var mess="supprimer_det_acad.php?num=";
                var mess1="det_acad.php";
                if(confirm('Vous etes sur de vouloir supprimer ? ')){
                    lien.href=mess + lien.name;
                 }else{
                        lien.href=mess1;
                    }

            }
    </script>
    <script language="Javascript">

        function modifier(lien){                  
                 var mess="modifier_det_acad.php?num=";
                var mess1="det_acad.php";
                if(confirm('Vous etes sur de vouloir modifier ? ')){
                    lien.href=mess + lien.name;
                 }else{
                        lien.href=mess1;
                    }

            }
    </script>
</body>
</html>