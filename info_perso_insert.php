<?php 


session_start();
session_commit();
if (isset($_SESSION['pseudo'])){
    if ($_SESSION["autoriser"]!="oui") {
            echo"<script language='javascript'>
        alert('veuillez reconnecter ultérieurement')</script>";

        header("location:sign_in.php");
    }
    else{
        $pseudo = $_SESSION['pseudo'];
        $id = $_SESSION['id_user'];
        // echo"bienvenue'".$pseudo."'";
        // echo"<script language='javascript'>
        //         alert('bienvenue .$pseudo')</script>";
    }
}
else{
    echo"<script language='javascript'>
        alert('veuillez reconnecter ultérieurement')</script>";

    header("location:sign_in.php");
    }
?>




<?php
    //include("db.php");

    $nom = $_POST['nom_ch'];
    $adresse1 = $_POST['adresse1_ch'];
    $adresse2 = $_POST['adresse2_ch'];
    $adresse3 = $_POST['adresse3_ch'];
    $adresse4 = $_POST['adresse4_ch'];
    $email = $_POST['email_ch'];
    $phone = $_POST['phone_ch'];
    $datee = $_POST['date_ch'];
    $situation = $_POST['situation_ch'];
    $langue = $_POST['langue_ch'];
    $nationalite = $_POST['nationalite_ch'];
    // $photo = $_POST["photo_champ"];
    //$photo = $_FILES["photo_champ"]["name"];
    $photo = $_FILES['image_ch']['name'];

    $objetPdo=new PDO('mysql:host=localhost;dbname=cv','root','');

    $pdoStat=$objetPdo->prepare("INSERT INTO informations_personnelles VALUES (NULL, :id, :nom, :adresse1, :adresse2, :adresse3, :adresse4, :email, :phone, :datee, :situation, :langue, :nationalite, :photo)");
    // $pdoStat=$objetPdo->prepare("INSERT INTO informations_personnelles ('id_inf_pers', 'id_user', 'nom', 'adresse1', 'adresse2', 'adresse3', 'email', 'telephone', 'date_naissance', 'situation_familiale', 'langue', 'nationalite', 'photo') VALUES (NULL, $id, $nom, $adresse1, $adresse2, $adresse3, $email, $phone, $datee, $situation, $langue, $nationalite, $photo)");
    

    $pdoStat->bindValue(':id', $id, PDO::PARAM_INT);
    $pdoStat->bindValue(':nom', $nom, PDO::PARAM_STR);
    $pdoStat->bindValue(':adresse1', $adresse1, PDO::PARAM_STR);
    $pdoStat->bindValue(':adresse2', $adresse2, PDO::PARAM_STR);
    $pdoStat->bindValue(':adresse3', $adresse3, PDO::PARAM_STR);
    $pdoStat->bindValue(':adresse4', $adresse4, PDO::PARAM_STR);
    $pdoStat->bindValue(':email', $email, PDO::PARAM_STR);
    $pdoStat->bindValue(':phone', $phone, PDO::PARAM_STR);
    $pdoStat->bindValue(':datee', $datee, PDO::PARAM_STR);
    $pdoStat->bindValue(':situation', $situation, PDO::PARAM_STR);
    $pdoStat->bindValue(':langue', $langue, PDO::PARAM_STR);
    $pdoStat->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
    $pdoStat->bindValue(':photo', $photo, PDO::PARAM_STR);
        
    $insertIsOk = $pdoStat->execute();
    // var_dump($pdoStat);
    // var_dump($insertIsOk);
    if($insertIsOk){

        echo"<script language='javascript'>
             alert('information bien enregistré')</script>";
        
            $pdoStat2=$objetPdo->prepare("SELECT * FROM `informations_personnelles` WHERE `id_inf_pers`=( SELECT MAX(id_inf_pers) FROM informations_personnelles) LIMIT 1;");

             // $pdoStat2=$objetPdo->prepare("SELECT *  FROM `informations_personnelles` WHERE `nom` LIKE '%$nom%' AND `adresse2` LIKE '%$adresse2%' AND `email` LIKE '%$email%' AND `telephone` LIKE '%$phone%' AND `date_naissance` LIKE '%$datee%' LIMIT 1");

            $pdoStat2->execute();
            $tab=$pdoStat2->fetchAll();
            //var_dump($tab);
    

            if(count($tab)>0){
                session_start();
                $info_perso=$_SESSION["info_perso"]=ucfirst(strtolower($tab[0]["id_inf_pers"]))." ".strtoupper($tab[0]["id_inf_pers"]);
                $id_inf_pers = $_SESSION["id_inf_pers"]= ($tab[0]["id_inf_pers"]);
                session_commit();


                echo"info perso";
                var_dump($id_inf_pers);
                echo "id inf pers";
                var_dump($id_inf_pers);
                echo " information bien trouvé";
                header("location:exp_prof.php");
            }
            else{
                echo "aucun information trouvé";
                //$mes="aucune information trouvé";
                header("location:exp_prof.php");
            }

        // header("location:exp_prof.php");
    }
    else{
        echo"<script language='javascript'>
             alert('echec d'enregistrement')</script>";
        // echo echec d insertion;
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        ... insertion information personnelle...
    </title>

</head>
<body>
    <link rel="stylesheet" type="text/css" href="js/jquery-3.6.0.js">
</body>
</html>