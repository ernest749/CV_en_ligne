
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
    echo "veuillez réssayer ultérieurement";
    header("location:sign_in.php");
    }
?>

<?php
	//if ($_POST['id']) {
		 $idd=$_GET["num"];
		 var_dump($idd);
	
		//Ouverture d'une connexion à la base agenda
		$objetPdo = new PDO('mysql:host=localhost;dbname=cv','root','');
		echo "objetPdo";
		var_dump($objetPdo);

		//Préparation de la requête
		$pdoStat = $objetPdo->prepare("DELETE FROM loisir_et_interet WHERE id_lois_int= $idd LIMIT 1");

		//liaison du parametre nommé
		// $pdoStat->bindValue(':id', $idd, PDO::PARAM_INT);
		echo "pdoStat";
		var_dump($pdoStat);
		//éxecution de la requête
		$executeIsOk = $pdoStat->execute();
		echo "execute";
		var_dump($executeIsOk);

		if($executeIsOk){
			echo"<script language='javascript'>
            	alert('suppression effectué')</script>";
			header("Location: loisir_interet.php");
		}
		else{
			echo"<script language='javascript'>
            	alert('erreur! suppression non effectué')</script>";
			header('Location: loisir_interet.php');
		}
 // 	}
	// else{
	// 	$message = 'pas d\'action';
	// 	header('Location: liste_mention.php');
	// }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>