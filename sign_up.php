<?php 




if(isset($_POST['enregistrer'])){

  @$pseudo=$_POST['pseudo_champ'];
  @$email=$_POST['email_champ'];
  @$mdp=md5($_POST['password_champ']);



    if (empty($email) && empty($_POST['password_champ']) && empty($_POST['pseudo_champ'])) {
        // echo "veuillez remplis le champ email et mot de passe";
      $mes= "Veuillez remplis le champ s'il vous plaît...";
      $color = "red";
    }
    elseif(empty($email) && !empty($_POST['password_champ'])){
            $mes= "veuillez entrer votre adresse e-mail <br> s'il vous plaît";
            $color = "red";
    }
    elseif(!empty($email) && empty($_POST['password_champ'])){
        $mes= " veuillez entrer votre mot de passe ";
        $color = "red";
    }
    else{

      if (empty($_POST['pseudo_champ'])) {
        $mes= " veuillez entrer votre pseudo ";
        $color = "red";
      }
      else{
    //----------------------------------
        //connexion au base de données
        
        include("db.php");


        $pdoStat=$pdo->prepare("INSERT INTO user VALUES (NULL,:pseudo,:email,:password)");
        $pdoStat->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
        $pdoStat->bindValue(':email',$email,PDO::PARAM_STR);
        $pdoStat->bindValue(':password',$mdp,PDO::PARAM_STR);

        //éxecution de la requète preparée

        $insertIsOk = $pdoStat->execute();
             

        if($insertIsOk){

        $mes='succès';
        header("location:sign_in.php");
        }
         else{
           $message="Echec d'inscription";
           $color = "red";
         }


            
        }
      }
        
}
    //-------------------------------------
    
else{
  $mes = "S'INSCRIRE";
  $color = "black";
  }


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="curriculum vitae en ligne">
    <meta name="author" content="curriculum vitae en ligne">
    <meta name="generator" content="ernest 0.84.0">
    <link rel="icon" type="image/jpg" size="30x30" href="images/orange.jpg">
    <title>Sign_up</title>



    

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="js/bootstrap.bundle.min.js">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }


      html,
      body {
        height: 100%;
      }

      body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }

      .form-signin .checkbox {
        font-weight: 400;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      .form-signin input[type="email"] {
        margin-bottom: 11px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        margin-top: 10px;
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        margin-top: 10px;
      }

      .mb-4 {
        border: 2px double black;
        
        width: 120px;
        height: 120px;
        border-radius: 50%;
        }
      .tourner{
        width: 60px;
        height: 60px;

        border-radius: 50%;
        border-top:6px solid blue ;
        border-bottom: 6px solid red;
        -webkit-animation:  spin 2s linear infinite;
        animation: spin 2s linear infinite;
      }

      @-webkit-keyframes spin {
        0%{-webkit-transform: rotation(0deg);}
        100%{-webkit-transform: rotate(360deg);}
      }

      @keyframes spin {
        0%{transform: rotate(0deg);}
        100%{transform: rotate(360deg);}
      }
    </style>

    

  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="POST" action="">
    <div class="tourner">&copy;&nbsp;&nbsp;&nbsp;&copy; <br>&nbsp;|&nbsp;</div><img class="mb-4" src="images/img/user-plus.svg" alt="" width="72" height="57">
     <?php if(isset($mes)){ ?>
            
    <!-- <h1 class="h3 mb-3 fw-normal">S'il vous plaît! se connecter </h1> -->
      <h3 class="h3 mb-3 fw-normal" style="color:<?php echo $color; ?>;"> <?php echo $mes; ?> </h3>

    <?php } ?>

    <div class="form-floating">
      <input type="text" class="form-control" id="Pseudo" placeholder="Pseudo" name="pseudo_champ">
      <label for="Pseudo">Pseudo</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="Email" placeholder="name@example.com" name="email_champ">
      <label for="Email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="Password" placeholder="Password" name="password_champ">
      <label for="Password">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <img src="images/img/user.svg" width="20" height="20"> <a href="sign_in.php" style="text-decoration: none;"><b>Se connecter</b></a>&nbsp;&nbsp;&nbsp;
          <a href="index.php" style="text-decoration: none;"><img src='images/img/s_cancel.png' width="20" height="20">annuler</a>
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="enregistrer">S'inscrire</button>
    <!-- <a class="w-100 btn btn-lg btn-primary" type="submit" href="sign_in.php">Submit</a> -->
    <p class="mt-5 mb-3 text-muted">copyright by &copy; ERNERST 2023</p>
  </form>
</main>


    
  </body>
</html>
