<?php
        
    include '../connectBDD/connect.php';
    $pdo = new PDO($host, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    if(!empty($_POST))
    {
        $filter = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      
        $result = $pdo->exec("UPDATE membres SET statut = '$filter[update_statut]', administrateur ='$filter[update_admin]'  WHERE idMembre =" . $filter['idmembre']);

    }

