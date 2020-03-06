<?php

//modification des information de l'utilisateur
session_start();
include("connectiondb.php");
if($_SESSION["id_user"]){
?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    
    <title>mon evaluation php</title>
    <link href="../css/portfolio.css" rel="stylesheet"/>
</head>
<!--formulaire permettant d'effectuer les modifications-->
<body>
    <div class= "mecontacter division">
         <h2>ajout du projet</h2>
        <div>
        <form method="POST" action="">
            <label>titre du projet:</label>
            <input type="text" name="projettitre" value="" /><br/>
            
            <label>lien vers le projet</label>
            <input name="projetlien"><input/><br/>
            
            <label>description du projet</label>
            <textarea name="projetdescription"></textarea>
            
            
            
            <input type="submit" value="ajouter le projet" /><br/>
        </form>
        </div>
    </div>
    <?php 
    
    if(isset($_POST["projettitre"])){
        $projettitre=htmlspecialchars($_POST["projettitre"]);
        $projetlien=htmlspecialchars($_POST["projetlien"]);
        $projetdescription=htmlspecialchars($_POST["projetdescription"]);
        $ajout_projet=$db->prepare("INSERT INTO projet(projet_nom,projet_description,projet_lien) VALUES (?,?,?)") ;
        $ajout_projet->execute(array($projettitre,$projetdescription,$projetlien));
        
    } else{ echo "ajout impossible. informations manquantes"; } ?>
              
    </body>
</html>    
    
<?php    
}
?>


