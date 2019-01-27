<?php
    function pdo(){
        include 'connectBDD/connect.php';
        $pdo = new PDO($host, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        return $pdo;
    }

    function countRecettes(){
        $pdo = pdo();
        $result = $pdo->query("SELECT * FROM recettes");
        $j=3;
        while($offre = $result->fetch(PDO::FETCH_ASSOC)){
            $j=$j + 1;
        }
        return $j;
    }
    
    function selectRecettesByIdRecettes(){
        $pdo = pdo();
        global $k;
        $result = $pdo->query("SELECT * FROM recettes WHERE idRecette = $k");
        $recette = $result->fetch(PDO::FETCH_ASSOC);
        return $recette;
    }
    
    function selectRecettesByIdRecettesAndIdMembres(){
        $pdo = pdo();
        global $k;
        $result2 = $pdo->query("SELECT * FROM membres m, recettes r WHERE r.idRecette = $k AND m.idMembre = r.membre");
        $membre = $result2->fetch(PDO::FETCH_ASSOC);
        return $membre;
    }

    function selectRecettesDetails(){
        $pdo = pdo();
        global $id_url;
        $result = $pdo->query("SELECT * FROM recettes WHERE idRecette = $id_url");
        $recette_detail = $result->fetch(PDO::FETCH_ASSOC);
        return $recette_detail;
    }

    function selectRecettesDetailsMembre(){    
        $pdo = pdo();
        global $id_url;
        $result2 = $pdo->query("SELECT * FROM membres m, recettes r WHERE r.idRecette = $id_url AND m.idMembre = r.membre");
        $membre_detail = $result2->fetch(PDO::FETCH_ASSOC);
        return $membre_detail;
    }
     
    function modifyMDP(){
        $pdo = pdo();
        global $hash, $login;
        $result = $pdo->query("UPDATE membres SET password = '$hash' WHERE login = '$login'");
        return $result;
    }

    function selectRecetteMembre(){
        $pdo = pdo();
        global $membre;
        $result = $pdo->query("SELECT * FROM recettes r, membres m WHERE m.prenom = '$membre' AND m.idMembre = r.membre");
        return $result;
    }
    
    function selectRecherche(){
        global $search;
        $pdo = pdo();
       
        $result = $pdo->query("SELECT * FROM recettes WHERE titre LIKE '%$search%'");
        return $result;
    }
    
    function selectCompteRecette(){
        $pdo = pdo();
        global $login;
        $result = $pdo->query("SELECT * FROM recettes r, membres m WHERE m.login = '$login' AND m.idMembre = r.membre");
        return $result;
    }

    function selectLogin(){
        $pdo = pdo();
        global $enter;
        $result = $pdo->query("SELECT * FROM membres WHERE login = '$enter[login]'");
        return $result;
    }

    function selectAdmin(){
        $pdo = pdo();
        global $enter;
        $result = $pdo->query("SELECT * FROM membres WHERE login = '$enter[login]' AND administrateur = 'OUI'");
        return $result;
    }

    function selectMaxIdMembre(){
        $pdo = pdo();
        $searchMax = $pdo->query("SELECT MAX(idMembre) FROM membres");
        $max = $searchMax->fetch(PDO::FETCH_ASSOC);
        return $max ;
    }

    function insertLogin(){
        $pdo = pdo();
        global  $filter, $files, $newMax, $hash;
        $result = $pdo->exec("INSERT INTO membres (idMembre, gravatar,login, password, statut, prenom, nom, administrateur) VALUES ('$newMax','$files','$filter[login]', '$hash', 'membre', '$filter[prenom]','$filter[nom]', 'NON')");
        return $result;
    }

    function selectCompte(){
        $pdo = pdo();
        global $login;
        $result = $pdo->query("SELECT * FROM membres WHERE login = '$login' ");
        $compte = $result->fetch(PDO::FETCH_ASSOC);
        return $compte;
    }

    function depotRecetteMembre(){
        $pdo = pdo();
        global $id;
        $numero_membre = $pdo->query("SELECT * FROM membres WHERE login= '$id'");
        $membre = $numero_membre->fetch(PDO::FETCH_ASSOC);
        return $membre;
    }         

    function selectMaxIdRecette(){
        $pdo = pdo();
        $searchMax = $pdo->query("SELECT MAX(idRecette) FROM recettes");
        $max = $searchMax->fetch(PDO::FETCH_ASSOC);
        return $max ;
    }

    function depotRecette(){
        $pdo = pdo();
        global $membre, $depot, $files, $newMax;
        $result = $pdo->exec("INSERT INTO recettes (idRecette, titre, chapo, img, preparation, ingredient, membre, couleur, categorie, tempsCuisson, tempsPreparation, difficulte, prix) VALUES ('$newMax','$depot[titre]','$depot[commentaire]', '$files', '$depot[preparation]','$depot[ingredient]', '$membre[idMembre]','$depot[color]', '$depot[categorie]', '$depot[temps_cuisson] min','$depot[temps_préparation] min', '$depot[difficulte]','$depot[prix]')");
        return $result;
    }

    function updateGravatar(){
        $pdo = pdo();
        global $files, $login;
        $result = $pdo->query("UPDATE membres SET gravatar = '$files' WHERE login = '$login'");
        return $result;
    }

    function deleterecette(){
        $pdo = pdo();
        global $k;
        $result = $pdo->exec("DELETE FROM recettes WHERE idRecette = $k"); 
        return $result;
    }

