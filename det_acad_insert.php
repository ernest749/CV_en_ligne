	
<?php 


	session_start();
	session_commit();
	if (isset($_SESSION['pseudo'])){
	    $pseudo = $_SESSION['pseudo'];
		$id = $_SESSION['id_user'];
	    
	    $info_perso= @$_SESSION["info_perso"];
	    $id_inf_pers = @$_SESSION['id_inf_pers'];
	    //$id_inf_pers=3;


	    
	    // echo"bienvenue'".$pseudo."'";
	    // echo"<script language='javascript'>
	    //          alert('L identité de votre information personnelle est: .$id_inf_pers')</script>";
	}
	else{
	    echo "veuillez reconnecter";
	    header("location:sign_in.php");
	}
?>





<?php
    //include("db.php");

    $dip = $_POST['diplome_ch'];
    $univ = $_POST['universite_ch'];
    $an = $_POST['annee_ch'];
    $desc = $_POST['description_ch'];

    var_dump($_POST);

    //$photo = $_FILES['image_ch']['name'];

    $objetPdo=new PDO('mysql:host=localhost;dbname=cv','root','');

    $pdoStat=$objetPdo->prepare("INSERT INTO details_academique VALUES (NULL, :id, :diplome, :universite, :annee, :description)");
    //INSERT INTO `details_academique` (`id_det_ac`, `id_inf_pers`, `diplome`, `universite`, `annee_d_obtention`, `description`) VALUES (NULL, '3', 'res', 'des', 'set', 'der');
   

    $pdoStat->bindValue(':id', $id_inf_pers, PDO::PARAM_INT);
    $pdoStat->bindValue(':diplome', $dip, PDO::PARAM_STR);
    $pdoStat->bindValue(':universite', $univ, PDO::PARAM_STR);
    $pdoStat->bindValue(':annee', $an, PDO::PARAM_STR);
    $pdoStat->bindValue(':description', $desc, PDO::PARAM_STR);

        
    $insertIsOk = $pdoStat->execute();
    var_dump($insertIsOk);

    if($insertIsOk){

        echo"<script language='javascript'>
          alert(' Enregistrement effectué ')</script>";
    	echo"<script>document.location = 'det_acad.php'</script>";
		//header("location:det_acad.php");  
    }
    else{

    	echo"<script language='javascript'>
          alert(' Echec d'enregistrement  ')</script>";
        echo"<script>document.location = 'det_acad.php'</script>";
        //header("location:det_acad.php");
    }

    

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        ... insertion détails académiques...
    </title>
    <style type="text/css">
    	body{
    		height: 600px;
    		width: 100%;
    		background-image: linear-gradient(-45deg,rgb(7, 133, 3) 15%,rgb(1, 13, 182) 50%,rgb(255, 217, 0) 50%,rgba(247, 101, 4, 0.993) 75%,rgb(91, 255, 15) 70%); 
    	}
    </style>

</head>
<body>
	<link rel="stylesheet" type="text/css" href="js/jquery-3.6.0.js">
</body>
</html>

