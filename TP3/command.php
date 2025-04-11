<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestion des paniers</h1>

    <form method="post" id="main">
        <div>
            <label for="nom">Nom du produit :</label>
            <select id="panier" name="nom">
                <option value="0">Choisir un produit</option>
                <option value="10">Souris</option>
                <option value="35">Clavier</option>
                <option value="250">Écran</option>
            </select>
        </div>
       
        <div>
            <label for="quantite">Quantité commandée :</label>
            <input type="number" id="quantite" name="quantite">
        </div>
        <div>
            <input type="submit" value="Commander 🛍️" name="commander">
            <input type="submit" value="Afficher 🛒" name="afficher">
        </div>
        <div>
            
<?php

$_SESSION["test"] = "Hello, Session!";
include "functions.php";
if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = [];
}



if (isset($_POST["commander"])) {
    if (!empty($_POST["quantite"]) && $_POST["nom"] != "0" && $_POST["quantite"] > 0) {
        $ID = $_POST["nom"];
        $quantite = $_POST["quantite"];
        $nom = "Produit inconnu";

        switch ($ID) {
            case "10":
                $nom = "Souris";
                break;
            case "35": 
                $nom = "Clavier";
                break;
            case "250":
                $nom = "Écran";
                break;
        }

        addToCart($ID, $nom, $quantite);
        echo "<p style='color: green;'>Produit ajouté avec succès</p>";
    } else {
        if ($_POST["nom"] == "0") {
            echo "<p style='color: red;'>Veuillez choisir un produit</p>";
        }
        if (empty($_POST["quantite"])) {
            echo "<p style='color: red;'>Veuillez entrer la quantité.</p>";
        } else if ($_POST["quantite"] <= 0) {
            echo "<p style='color: red;'>Erreur: quantité négative ou zéro.</p>";
        }
    }
}

if (isset($_POST["afficher"])) {
    $ID=$_POST["nom"];
    if (isset($_POST["afficher"])) {
        if (!empty($_SESSION["panier"])) {
            header("Location: panier.php");
            exit();
        } else {
            echo "<p>Aucun produit commandé.</p>";
        }
    }
    
   


 
}


?>
        </div>
    </form>


</body>
</html>
