<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=chatelet', 'root', '');
 
if(isset($_POST['formconnexion'])) 
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);

    if(!empty($mailconnect) AND !empty($mdpconnect)) 
    {
        $requser = $bdd->prepare("SELECT * FROM client WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();

        if($userexist == 1) 
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: profilClient.php?id=".$_SESSION['id']);
        } 
        else 
        {
            $erreur = "Mauvais mail ou mot de passe !";
        }
    } 
    else 
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>

<html>
   <head>
      <title>Clinique Le Chatelet</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>