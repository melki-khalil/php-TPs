<?php
$errors = array();
$cin = $nom = $prenom = $age = $type = "";
$option = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cin = trim($_POST["cin"]);
    if (empty($cin)) $errors["cin"] = "Le CIN est requis.";
    else if (!preg_match("/^[0-9]{8}$/", $cin)) $errors["cin"] = "Le CIN doit comporter 8 chiffres.";

    $nom = trim($_POST["nom"]);
    if (empty($nom)) $errors["nom"] = "Le nom est requis.";
    else if (!preg_match("/^[a-zA-ZÄ-Ÿ\s]{3,}$/", $nom)) $errors["nom"] = "Le nom doit comporter au moins 3 caractères alphabétiques.";

    $prenom = trim($_POST["prenom"]);
    if (empty($prenom)) $errors["prenom"] = "Le prénom est requis.";
    else if (!preg_match("/^[a-zA-ZÄ-Ÿ\s]{3,}$/", $prenom)) $errors["prenom"] = "Le prénom doit comporter au moins 3 caractères alphabétiques.";

    $age = trim($_POST["age"]);
    if (empty($age)) $errors["age"] = "L'âge est requis.";
    else if ($age < 18) $errors["age"] = "L'âge doit être au moins 18 ans.";

    $type = $_POST["type"];
    if($type=="")
    $errors["selected"] = "Vous devez choisir le type de concours.";
    
    if (isset($_POST["options"])) 
        $option = $_POST["options"];
    
        else $errors["checked"] = "Vous devez choisir une option.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <h2>formulair d'inscription au concour</h2>
    <form action="" method="post">
        <fieldset> <legend></legend>
        <label for="cin">CIN<input type="text" id="cin" name="cin" value="<?php echo htmlspecialchars($cin); ?>"></label>
       
       <div class="erorr">
        <?php echo isset($errors["cin"])? $errors["cin"]:""; ?>
        
       </div>
       <br>
        <label for="nom">nom <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" ></label>
       
       <div class="erorr">
        <?php echo isset($errors["nom"])? $errors["nom"]:""; ?>
        </div>
        <br>
        <label for="prenom">prenom <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" ></label>
       
       <div class="erorr">
        <?php echo isset($errors["prenom"])? $errors["prenom"]:"";  ?>
        
       </div>
       <br>
        <label >age <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age);?>" ></label>
       
       <div class="erorr">
        <?php echo isset($errors["age"])? $errors["age"]:""; ?>
        
       </div>
       <br>
        <label for="cor">Type de concour</label>
        <select name="type" id="cor">
            <option value="">selecteur</option>
            <?php
            foreach(array("java","ruby","php")as $t){
                $selected=($type==$t)? "selected":"";
                echo  "<option value=\"$t\" $selected>$t</option>";
            }
            ?>

    </select>
    <div class="erorr">
        <?php echo isset($errors["selected"])? $errors["selected"]:""; ?>
        
       </div>
<br>
       

<br>


    </fieldset>

    <fieldset>
           <legend>option</legend>
            <?php
            foreach(array("bac","2eme","3eme")as $opt){
                $checked = ($option == $opt) ? "checked" : "";
                echo  " <input type=\"radio\" name=\"options\"value=\"$opt\" $checked> <label >$opt</label> <br>";
            }
            ?>
            <div class="erorr">
            <?php echo isset($errors["checked"])? $errors["checked"]:""; ?>
            
             </div>
            </fieldset>
            
           
       <input type="submit" value="S'inscrire">
    </form>
            <style>
                .erorr{
                    color: red;
                }
            </style>

</body>
</html>
