<?php 




if(isset($_POST['connexion'])){

  @$email=$_POST['email_champ'];
  @$mdp=md5($_POST['password_champ']);



    if (empty($email) && empty($_POST['password_champ'])) {
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
    //----------------------------------
        //connexion au base de données
        session_start();
        include("db.php");
        //var_dump($pdo);
        $pdoStat=$pdo->prepare("select * from user where email=? and password=? limit 1");
        $pdoStat->execute(array($email,$mdp));
        $tab=$pdoStat->fetchAll();
        //var_dump($mdp);
        //var_dump($tab);
        if(count($tab)>0){
            $_SESSION["pseudo"]=ucfirst(strtolower($tab[0]["pseudo"])).
            " ".strtoupper($tab[0]["pseudo"]);
            $_SESSION["autoriser"]="oui";
            $id = $_SESSION["id_user"]= ($tab[0]["id_user"]);
            var_dump($id);
            session_commit();
            header("location:info_perso.php");
        }
        else{
            //echo "Mauvais login ou mot de passe!";
            $mes="Mot de passe et E-mail incorrect!veuillez réssayer";
            $color = "red";
        }
    }
    //-------------------------------------
    }
else{
  $mes = "Veuillez connecter s'il vous plaît";
  $color = "blue";
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
    <title>Signin</title>



    

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
        margin-bottom: 10px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
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
        0%{transform: rotate(0deg);color: red;}
        50%{color: red;}
        60%{color: blue;}
        100%{transform: rotate(360deg);color: blue;}
      }

    </style>

    

  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="POST" action="" >
    <div class="tourner"><b>|</b> </div><img class="mb-4" src="images/img/user.svg" alt="" width="82" height="67" >
    
    <?php if(isset($mes)){ ?>
            
    <!-- <h1 class="h3 mb-3 fw-normal">S'il vous plaît! se connecter </h1> -->
        <h3 class="h3 mb-3 fw-normal" style="color:<?php echo $color; ?>;"> <?php echo $mes; ?> </h3>

    <?php } ?>


    <div class="form-floating">
      <input type="email" class="form-control" id="emailInput" name="email_champ" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="PasswordInput" name="password_champ" placeholder="Password">
      <label for="PasswordInput">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <img src="images/img/user-plus.svg" width="20" height="20"> <a href="sign_up.php" style="text-decoration: none;"><b>S'inscrire</b></a>
        &nbsp;&nbsp;&nbsp;
          <a href="index.php" style="text-decoration: none;"><img src='images/img/s_cancel.png' width="20" height="20">annuler</a>
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="connexion" >connexion</button>
    <!-- <a class="w-100 btn btn-lg btn-primary" type="submit" href="info_perso.php">connexion</a> -->
    <p class="mt-5 mb-3 text-muted">copyright by &copy; ERNERST 2023</p>
  </form>
</main>


    
  </body>
</html>
