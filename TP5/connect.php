<?php
require_once 'envierments.php';
require 'config.php';
require 'insert.php';

$doa = new DAOEnvierments($pdo);




if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $lieu = trim($_POST["lieu"] ?? "");
    $titre = trim($_POST["titre"] ?? "");
    $date = trim($_POST["date"] ?? "");
    $option = $_POST["options"] ?? "";

    // Validate lieu
    if (empty($lieu)) {
        $errors["lieu"] = "Le lieu est requis.";
    } elseif (!preg_match("/^[a-zA-ZÄ-Ÿ\s]{3,20}$/u", $lieu)) {
        $errors["lieu"] = "Le lieu doit comporter entre 3 et 20 caractères alphabétiques.";
    }

    // Validate titre
    if (empty($titre)) {
        $errors["titre"] = "Le titre est requis.";
    } elseif (!preg_match("/^[a-zA-ZÄ-Ÿ\s]{3,20}$/u", $titre)) {
        $errors["titre"] = "Le titre doit comporter entre 3 et 20 caractères alphabétiques.";
    }

    // Validate date
    if (empty($date)) {
        $errors["date"] = "La date est requise.";
    } else {
        try {
            $inputDate = new DateTime($date);
            $minDate = new DateTime("1997-01-01");
            if ($inputDate < $minDate) {
                $errors["date"] = "La date ne peut pas être antérieure à 1997.";
            }
        } catch (Exception $e) {
            $errors["date"] = "Format de date invalide.";
        }
    }

  
    if (empty($errors)) {
        try {
            $envierment = new Envierment($titre, $inputDate, $lieu);
            $doa->ajoutEnvierments($envierment);
            echo "<p>Ajouté avec succès</p>";
        } catch (Exception $e) {
            echo "<p class='error'>Erreur lors de l'ajout : " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
}
?>
