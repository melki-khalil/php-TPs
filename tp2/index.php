
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4><?php
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
if(!empty($nom)&&!empty($prenom)){
    echo "bonjour $nom $prenom";

}
else{
    echo "erreur lors de saiser";
}
?></h4>
   
</body>
</html>