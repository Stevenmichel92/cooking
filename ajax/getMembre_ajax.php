<?php
        
    include '../connectBDD/connect.php';
    $pdo = new PDO($host, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    if(!empty($_POST))
    {
        $result = $pdo->query("SELECT * FROM membres WHERE idMembre = " . $_POST['idMembre']);
        $membre = $result->fetch(PDO::FETCH_ASSOC);
        echo json_encode($membre);
    }