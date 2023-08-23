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
	<title> ...loisir et intérêt...</title>
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
			border: 1px solid black;
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
	<center class="text-center" style="text-shadow:3px 10px 5px blue;"><h2><strong>LOISIRS <b>&nbsp;et </b><i> INTERÊTS</i></strong></h2></center>
</div>
	
 	<div class="container">
 		
		
	 		<div class="row">
	 			<div class="col-lg-4" >
	 				<fieldset class="fieldshet">
	 				<legend class="" style="background-color:#FFFFFF;text-align:center;color:#000013;"><strong><i>LOISIRS & INTERÊTS</i></strong></legend>
	 					<form method="POST" action="loisir_interet_insert.php" >
	 						<!--  -->
	 					
		 					<div class="form-group">
		 						<label for="titre_ch" class="form-label">Titre</label>
		 					</div>
		 					<div class="form-group">
		 						<input type="text" name="titre_ch" placeholder="exemple:Sport" class="form-control">
		 					</div>
		 					<div class="form-group">
		 						<label for="description_ch"  class="text-primary">Description</label>
		 					</div>

		 					<div class="form-group">
		 						<textarea name="description_ch" class="form-control" placeholder="exemple:hand-Ball,football"></textarea>
		 							
		 						
		 					</div>
		 					<input type="submit" name="enregistrer" value="+Ajouter" class="btn btn-success">
	 					</form>
	 				</fieldset>

	 					
	 				
	 				<p>
	 					<!-- <input type="submit" name="enregistrer" class="btn btn-primary" value="Enregistrer"> -->
	 					<a href="details academique.php" class="btn btn-primary">Suivant</a>
	 					<a href="index.php" class="btn btn-danger">Annuler</a>
	 				</p>
	 			</div>

	 		<div class="col-lg-8">
	 			<div class="container">

	 			<?php 

	 				$con= mysqli_connect("localhost","root","","cv");
	 				// var_dump($con);
	 				$sql="SELECT * FROM loisir_et_interet WHERE id_inf_pers=$id_inf_pers ORDER BY id_lois_int ASC;";
	 				//$sql="SELECT * FROM l_i ORDER BY id_lois_int ASC;";
                    //$sql="SELECT * FROM 'loisir_&_interets';";
                    $res= $con->query($sql);

                    // var_dump($res);

                    while ($row = $res->fetch_assoc()) {
                    	echo "



	 				<fieldset class='exp'>
	 					<legend>
	 						<label name='diplome'><strong>&nbsp;</strong></label>
	 					</legend>
	 					<div class='row'>
	 						<div class='col-sm-3'>
	 							<p><label name='universite' id='universite'><strong>{$row["titre"]}&nbsp; &nbsp;:</strong></label></p>
	 							

	 						</div>
	 						
	 						<div class='col-sm-6'><p></p>
	 							<label name='datee' id='datee'><strong>{$row["description"]}</strong></label>
	 						</div>
	 					
							<div class='col-sm-3'>
							<p class='form-selec'>
								<a href='javascript:lien.href;' name='{$row["id_lois_int"]}' style='text-decoration:none;' onClick='modifier(this);' class='selectionner'><img src='images/img/b_inline_edit.png'>
									<i style='color:green;'></i></a>
								

								<a href='javascript:lien.href;' name='{$row["id_lois_int"]}' onClick='afficherDestination(this);' style='text-decoration:none;' class='selectionner'><img src='images/img/s_cancel.png' title='supprimer'><i style='color:red;'></i></a>
	 						</p>
							</div>
						</div>
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
                 var mess="supprimer_lois_int.php?num=";
                var mess1="loisir-interet.php";
                if(confirm('Vous etes sur de vouloir supprimer ? ')){
                    lien.href=mess + lien.name;
                 }else{
                        lien.href=mess1;
                    }

            }
    </script>
    <script language="Javascript">

        function modifier(lien){                  
                 var mess="modifier_lois_int.php?num=";
                var mess1="loisir_interet.php";
                if(confirm('Vous etes sur de vouloir modifier ? ')){
                    lien.href=mess + lien.name;
                 }else{
                        lien.href=mess1;
                    }

            }
    </script>
</body>
</html>