<?php
        
    include '../connectBDD/connect.php';
    $pdo = new PDO($host, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    if(!empty($_POST))
    {
        $filter = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // voir max id
            $searchMax = $pdo->query("SELECT MAX(idRecette) FROM recettes");
            $max = $searchMax->fetch(PDO::FETCH_ASSOC);
            $newMax = $max["MAX(idRecette)"] + 1;

            //selection id du login
            $result0 = $pdo->query("SELECT idMembre FROM membres WHERE login = '$filter[log]'");
            $id = $result0->fetch(PDO::FETCH_ASSOC);
            $id_login = $id["idMembre"];

            $info = pathinfo($_FILES['myimg']['name']);
            $ext = $info['extension'];
            $newname = GUID() . "." . $ext; 

            $requete = "INSERT INTO recettes (idRecette, titre, chapo, img, preparation, ingredient, membre, couleur, categorie, tempsCuisson, tempsPreparation, difficulte, prix) VALUES ($newMax,'$filter[titre]','$filter[chapo]', '$newname', '$filter[preparation]','$filter[ingredient]', $id_login,'$filter[couleur]', 1, '$filter[cuisson] min','$filter[tempspreparation] min', '$filter[difficulte]','$filter[prix]')";

            $result = $pdo->exec($requete);

            $target = '../img/pictures/recettes/'.$newname;
            move_uploaded_file($_FILES['myimg']['tmp_name'], $target);

 
    }
    
    function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
