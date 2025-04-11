<?php 

function afficher($ID) {
    if ($ID !== "0" && (!isset($_SESSION["panier"]) || !isset($_SESSION["panier"][$ID]))) {
        echo "<p style='color: orange;'>Cet élément n'existe pas.</p>";
        return;
    }

    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Action</th>
          </tr>";

    if ($ID !== "0" && isset($_SESSION["panier"][$ID])) { 
        $produit = $_SESSION["panier"][$ID];
        echo "<tr>
                <td>{$produit['id']}</td>
                <td>{$produit['nom']}</td>
                <td>{$produit['quantite']}</td>
                <td>
                    <form method='post' style='display:inline;'>
                        <input type='hidden' name='supprimer' value='{$ID}'>
                        <button type='submit' name='delete' style='color: red;'>X</button>
                    </form>
                </td>
              </tr>";
    } else {
        foreach ($_SESSION["panier"] as $index => $produit) {
            echo "<tr>
                    <td>{$produit['id']}</td>
                    <td>{$produit['nom']}</td>
                    <td>{$produit['quantite']}</td>
                    <td>
                        <form method='post' style='display:inline;'>
                            <input type='hidden' name='supprimer' value='{$index}'>
                            <button type='submit' name='delete' style='color: red;'>X</button>
                        </form>
                    </td>
                  </tr>";
        }
    }

    echo "</table>";
}

function addToCart($ID, $nom, $quantite) {
    if (!empty($nom)) {
        if (isset($_SESSION['panier'][$ID])) {
            $_SESSION['panier'][$ID]['quantite'] += $quantite;
        } else {
            $_SESSION['panier'][$ID] = [
                'id' => $ID,
                'nom' => $nom,
                'quantite' => $quantite
            ];
        }
    }
}?>