<?php
        
    include '../connectBDD/connect.php';
    $pdo = new PDO($host, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    if(!empty($_POST))
    {
        $info = pathinfo($_FILES['update_myimg']['name']);
        $ext = $info['extension'];
        $newname = GUID() . "." . $ext; 
      
        $filter = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $result = $pdo->exec("UPDATE recettes SET titre = '$filter[update_titre]', chapo = '$filter[update_chapo]', preparation = '$filter[update_preparation]', ingredient = '$filter[update_ingredient]', couleur = '$filter[update_couleur]', tempsCuisson = '$filter[update_cuisson]', tempsPreparation = '$filter[update_tempspreparation]', difficulte = '$filter[update_difficulte]', prix = '$filter[update_prix]', img = '$newname'  WHERE idRecette =" . $filter['idRecette']);

        $target = '../img/pictures/recettes/'.$newname;
        move_uploaded_file($_FILES['update_myimg']['tmp_name'], $target);

    }

    function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

