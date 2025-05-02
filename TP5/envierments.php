<?php
    $errors = [];
    $lieu = $titre = $date = "";
   class Envierment {
    public $titre;
    public $date;
    public $lieu;

    public function __construct($titre, $date, $lieu) {
        $this->titre = $titre; 
        $this->date = $date; 
        $this->lieu = $lieu; 
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getDate(){
        return $this->date;
    }
    public function getLieu(){
        return $this->lieu;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Envierment</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>

<h2>Envierment</h2>
<form action="" method="post">
    <fieldset>
        <legend>Envierment inforamtion</legend>

       
        <label for="titre">Titre:
            <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($titre); ?>">
        </label>
        <div class="error"><?php echo $errors["titre"] ?? ""; ?></div>
        <br>
        <label for="lieu">Lieu:
            <input type="text" id="lieu" name="lieu" value="<?php echo htmlspecialchars($lieu); ?>">
        </label>
        <div class="error"><?php echo $errors["lieu"] ?? ""; ?></div>
        <br>


        <label for="date">Date:
            <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($date); ?>">
        </label>
        <div class="error"><?php echo $errors["date"] ?? ""; ?></div>
        <br><br>
    </fieldset>

    

    <br>
    <input type="submit" value="S'inscrire">
</form>

</body>
</html>
