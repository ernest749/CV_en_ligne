

<?php 


session_start();
session_commit();
if (isset($_SESSION['pseudo'])){
    $pseudo = $_SESSION['pseudo'];
    $id = $_SESSION['id_user'];

    $id_inf_pers = $_SESSION['id_inf_pers'];
    //$id_inf_pers = 3;
    
    // echo"bienvenue'".$pseudo."'";
    // echo"<script language='javascript'>
    //         alert('bienvenue .$pseudo')</script>";
}
else{
    echo "veuillez reconnecter";
    header("location:sign_in.php");
    }
?>

<?php

    $organisation = $_POST['organisation_ch'];
    $designation = $_POST['designation_ch'];
    $datee = $_POST['date_ch'];
    $role = $_POST['role_ch'];
    $description = $_POST['description_ch'];

    // $photo = $_FILES['image_ch']['name'];

    $objetPdo=new PDO('mysql:host=localhost;dbname=cv','root','');

    //$pdoStat=$objetPdo->prepare("INSERT INTO informations_personnelles VALUES (NULL, :id, :nom, :adresse1, :adresse2, :adresse3, :adresse4, :email, :phone, :datee, :situation, :langue, :nationalite, :photo)");
    // $pdoStat=$objetPdo->prepare("INSERT INTO informations_personnelles ('id_inf_pers', 'id_user', 'nom', 'adresse1', 'adresse2', 'adresse3', 'email', 'telephone', 'date_naissance', 'situation_familiale', 'langue', 'nationalite', 'photo') VALUES (NULL, $id, $nom, $adresse1, $adresse2, $adresse3, $email, $phone, $datee, $situation, $langue, $nationalite, $photo)");
    $pdoStat=$objetPdo->prepare("INSERT INTO experience_professionnelle  VALUES (NULL, :id_inf_pers, :organisation, :designation, :datee, :role, :description)");

    $pdoStat->bindValue(':id_inf_pers', $id_inf_pers, PDO::PARAM_STR);
    $pdoStat->bindValue(':organisation', $organisation, PDO::PARAM_STR);
    $pdoStat->bindValue(':designation', $designation, PDO::PARAM_STR);
    $pdoStat->bindValue(':datee', $datee, PDO::PARAM_STR);
    $pdoStat->bindValue(':role', $role, PDO::PARAM_STR);
    $pdoStat->bindValue(':description', $description, PDO::PARAM_STR);

        
    $insertIsOk = $pdoStat->execute();
    var_dump($pdoStat);
    var_dump($insertIsOk);
    if($insertIsOk){
        echo"<script language='javascript'>
            alert('données bien enregistrée dans la base de donnée')</script>";
        //echo "donnée bien enregistré";

        header("location:exp_prof.php");
           
        
    }
    else{
        echo"<script language='javascript'>
            alert('Echec! veuillez réssayer ultérieurement')</script>";
            header("location:exp_prof.php");
         //echo "Echec d'enregistrement";
        // echo echec d insertion;
    }

?>

<?php
    // $con = mysqli_connect("localhost","root","","cv");

    // $action = $_POST["action"];
    // if ($action =="insert") {
    //     $organisation = mysqli_real_escape_string($con,$_POST["organisation_ch"]);
    //     $designation = mysqli_real_escape_string($con,$_POST["desig_ch"]);
    //     $date = mysqli_real_escape_string($con,$_POST["dat_ch"]);
    //     $role = mysqli_real_escape_string($con,$_POST["rol_ch"]);
    //     $description = mysqli_real_escape_string($con,$_POST["descr_ch"]);
    //     $sql = "insert into experience_professionnelle (id_exp_prof, id_inf_pers, organisation, designation, date, role, description) values (NULL,'($id)','($organisation)','($designation)','($date)','($role)','($description)')";
    //     if($con->query($sql)){

    //         echo "
    //             <tr>
                    
    //                 <td>{$organisation}</td>
    //                 <td>{$designation}</td>
    //                 <td>{$date}</td>
    //                 <td>{$role}</td>
    //                 <td>{$description}</td>
    //                 <td><a href='' class='btn btn-primary'>Edit</a>
    //                 <td><a href='' class='btn btn-danger'>Delete</a></td>
                    
    //             </tr>

    //         ";
    //         header("location:exp_prof.php");

    //     }else{
    //         echo false;
    //     }
    // }
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

</body>
</html>