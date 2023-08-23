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

<?php 
	if (isset($_POST['enregistrer']) && sizeof($_POST)>0) {
	    //$id_inf_pers = $_POST['id_inf_pers'];
	    //$num = $_POST['id'];
	    //$id_inf_pers =3;
	    $titre = $_POST['titre_ch'];
	    $description = $_POST['description_ch'];
	    var_dump($_POST);

	 	$objetPdo= new PDO('mysql:host=localhost;dbname=cv','root','');

	   $pdoStat2=$objetPdo->prepare(" INSERT INTO loisir_et_interet VALUES (NULL,:id_inf_perss, :titre, :descriptionn )");

	    
	    $pdoStat2->bindValue(':id_inf_perss', $id_inf_pers, PDO::PARAM_INT);
	    $pdoStat2->bindValue(':titre', $titre, PDO::PARAM_STR);
	    $pdoStat2->bindValue(':descriptionn', $description, PDO::PARAM_STR);


	    $executionIsOk = $pdoStat2->execute();

	    var_dump($pdoStat2);
	    var_dump($executionIsOk);

	    if($executionIsOk){
	   		echo"<script language='javascript'>
	         alert('enregistrement bien effectué')</script>";
	        //var_dump($pdoStat2);
	        
	        
	    }
	   	else{
	   		echo"<script language='javascript'>
	         alert('erreur d'enregistrement')</script>";
	         
	   	}
	   	echo"<script>document.location = 'loisir_interet.php'</script>";
		//header('Location: liste_mention.php');
	}


	?>