<?php
        
    include '../connectBDD/connect.php';
    $pdo = new PDO($host, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    if(!empty($_POST))
    {
        $filter = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $result1 = $pdo->query("SELECT * FROM membres WHERE login = '$filter[login]'");
        $exist = $result1->fetch(PDO::FETCH_ASSOC);

        if($exist == false){

            $psswd = $filter['mdp'];
            $hash = password_hash($psswd, PASSWORD_DEFAULT);

            // voir max id
            $searchMax = $pdo->query("SELECT MAX(idMembre) FROM membres");
            $max = $searchMax->fetch(PDO::FETCH_ASSOC);
            $newMax = $max["MAX(idMembre)"] + 1;


            $info = pathinfo($_FILES['myimg']['name']);
            $ext = $info['extension'];
            $newname = GUID() . "." . $ext; 

            $requete = "INSERT INTO membres (idMembre, gravatar,login, password, statut, prenom, nom, administrateur) VALUES ($newMax, '$newname', '$filter[login]', '$hash', '$filter[statut]', '$filter[prenom]','$filter[nom]', '$filter[admin]')";
            $result = $pdo->exec($requete);
            
            
            $target = '../img/pictures/gravatars/'.$newname;
            move_uploaded_file($_FILES['myimg']['tmp_name'], $target);

            echo ($result);
        
        }
        else{
            echo ($login_exist);
        }
    }

    function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }