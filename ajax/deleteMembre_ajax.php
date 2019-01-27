<?php
        
    include '../connectBDD/connect.php';
    $pdo = new PDO($host, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    if(!empty($_POST))
    {
        $filter = filter_input(INPUT_POST, 'idMembre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $result = $pdo->exec("DELETE FROM membres WHERE idMembre = " . $filter);
        $supp = $pdo->exec("DELETE FROM recettes WHERE membre = " . $filter);

        echo $result;;
    }
