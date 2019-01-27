<?php
        
    include '../connectBDD/connect.php';
    $pdo = new PDO($host, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    if(!empty($_POST))
    {
        $result = $pdo->query("SELECT * FROM recettes r, membres m WHERE r.membre = m.idMembre AND r.idRecette = " . $_POST['idRecette']);
        $recette = $result->fetch(PDO::FETCH_ASSOC);
        echo json_encode($recette); 
    }