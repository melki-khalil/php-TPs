<?php

require 'config.php';

class DAOEnvierments {
    private $pdo;


    public function __construct($pdo) {
        $this->pdo = $pdo; 
    }

    public function ajoutEnvierments(Envierment $evt) {
        $sql = "INSERT INTO `envierment` (`titre`, `date`, `lieu`) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute([  
            $evt->getTitre(), 
            $evt->getDate()->format('Y-m-d'),
            $evt->getLieu()
        ]);
    }
}
?>
