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
         <h2>Edition de mon profil</h2>
        <div>
        <form method="POST" action="">
            <label>Nom:</label>
            <input type="text" name="newnom" value="" /><br/>
            <label>description</label>
            <textarea name="newdescription" value="Etudiant performant prêt à apprendre, à développer mes compétences dans le domaine du développement informatique et apporter une certaine valeur ajoutée à une entreprise dans le cadre d'un stage. Ayant l'esprit d'équipe, je suis capable de m'auto-gérer et de travailler de façon indépendante ou en collaboration avec d'autres sur des projets de groupe"></textarea>
            <input type="submit" value=" mettre à jour mon profile" /><br/>
        </form>
        </div>
    </div>
    <?php 
    
    if(isset($_POST["newnom"]) && !empty($_POST["newnom"]) && isset($_POST["newdescription"]) && !empty($_POST["newdescription"])){
        $newnom=htmlspecialchars($_POST["newnom"]);
        $newdescription=htmlspecialchars($_POST["newdescription"]);
       $info_update=$db->prepare("UPDATE apropos SET apropos_nom=?,apropos_description=? WHERE 1" ) ;
        $info_update->execute(array($newnom,$newdescription));
        
    } else{ echo "la modification n'a pas pu être éffectuée"; } ?>
              
    </body>
</html>    
    
<?php    
}
?>


