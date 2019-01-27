      <?php ob_start(); include 'inc/head_info.php' ?>
        <title> Connexion - Cooking </title>  
    </head>
        <?php 
            include 'inc/requete_sql.php';
            include 'inc/header.php';
            include 'inc/nav.php';
            
        ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Connexion</li>
            </ol>
        </nav>   
        
        <div class="container recettes_body">
            <div class="row">
                <div class ="col-sm-12 col-md-6 col-lg-6">
                    <br>
                    <h3>Je me connecte</h3>
                    <form method="post">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Mon pseudo" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mon mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Inscrire mot de passe">
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-info" name="connecter" data-toggle="modal" data-target="#changermdp">Se connecter</button>
                        </div>
                    </form>
                </div>  

                <div class ="col-sm-12 col-md-6 col-lg-6">
                    <br>
                    <h3>Vous voulez vous inscrire?</h3>
                    <br>
                    <h5 style="text-align:center">Je m'inscris en cliquant <a href="inscription.php">ici</a></h5><br><br>
                </div>
            </div>   
        </div>  

        <?php  
            if($_POST != NULL){
                $enter = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $result = selectLogin();
                if(($membre = $result->fetch(PDO::FETCH_ASSOC)) == TRUE){;
                    $hash =  $membre['password'] ;
                    if (password_verify($enter['password'], $hash) == false){
                        $pdo= pdo();
                        $exist = $pdo->query("SELECT * FROM membres WHERE login = '$enter[login]' AND password = '$enter[password]' ");
                        $ok = $exist->fetch(PDO::FETCH_ASSOC) ;
                        if( $ok == true){    
                            $newhash = password_hash($enter['password'], PASSWORD_DEFAULT); 
                            $result = $pdo->query("UPDATE membres SET password = '$newhash' WHERE login = '$enter[login]'");    
                            echo "Mot de passe sécurisé avec succès, veuillez le retaper"; 
                        } 
                        else{
                            $_POST = NULL;
                            echo "Veuillez re-saisir votre login et mdp!<br><br>";   
                        } 
                    }
                    elseif (password_verify($enter['password'], $hash)){
                        $_SESSION['login'] = $enter['login'];
                        $_SESSION['password'] = $hash;            
                        echo "Vous êtes désormais connectés!";
                        header('Location: index.php');
                    }
                    else{
                        $_POST = NULL;
                        echo "Veuillez re-saisir votre login et mdp!<br><br>";   
                    } 
                }    
                else{
                    $_POST = NULL;
                    echo "Veuillez re-saisir votre login et mdp!<br><br>";   
                } 
            }    
    
        include "inc/social_networks.php";
        include "inc/footer.php"; 

        ob_end_flush();