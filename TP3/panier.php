<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Panier</title>
</head>
<body>


<h1>Panier</h1>
<form method="post" id="main">
        <div>
            <label for="nom">Nom du produit :</label>
            <select id="panier" name="ID">
                <option value="0">Choisir un produit</option>
                <option value="10">Souris</option>
                <option value="35">Clavier</option>
                <option value="250">Écran</option>
            </select>
        </div>
       
        
        <div>
            
            <input type="submit" value="rechercher 🔎" name="rechercher">
        </div>
        <div>

            <?php
           
            include("functions.php");
            if (!isset($_SESSION["panier"])) {
                $_SESSION["panier"] = [];
            }
            
          
            if (isset($_POST["afficher"])) {

                if (!empty($_SESSION["panier"])) {
                
                    $ID=$_POST["ID"];
                    afficher($ID);
                } else {
                    echo "<p>Aucun produit commandé.</p>";
                    
                }
            }
            
            if (isset($_POST["rechercher"])) {
                $ID=$_POST["ID"];

                if (!empty($_SESSION["panier"])) {
                    afficher($ID);
                } else {
                    echo "<p>Aucun produit commandé.</p>";
                }
            }
           
            
            if (isset($_POST["delete"])) {
                $indexToDelete = $_POST["supprimer"];
                unset($_SESSION["panier"][$indexToDelete]); 
                afficher("0");
                echo "<p style='color: orange;'>Produit supprimé avec succès.</p>";
            }
            ?>
        </div>
    </form>

</body>
</html>