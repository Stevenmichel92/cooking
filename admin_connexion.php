        <?php ob_start(); include 'inc/head_info.php'; ?>
        <title> Admin - Cooking </title>  
    </head>
        <?php 
            include 'inc/requete_sql.php';
            include 'inc/header.php';
            include 'inc/nav.php';
        ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Administrateur connexion</li>
            </ol>
        </nav>  

        <?php  
            if($_POST != NULL){
                $enter = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $result = selectAdmin();
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
                        $_SESSION['admin'] = $enter['login'];
                        $_SESSION['password'] = $hash;
                        header('Location: admin_recettes.php');
                        echo "Vous êtes désormais connectés!";
                        ?>
                            <form method="post" action="admin_recettes.php">
                                <button type="submit" class="btn btn-primary">Administrer</button>
                            </form>
                        <?php
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
        ?>

        <div class="container recettes_body">
            <div class="row justifiy-content-center">
                <div class ="col-12"><br>
                    <h3>Je me connecte</h3>
                    <form method="post">
                    <div class ="col-sm-12 col-md-6 col-lg-6">    
                        <div class="form-group">
                            <label for="formGroupExampleInput">Login Administrateur</label>
                            <input type="text" class="form-control" name="login" id="formGroupExampleInput" placeholder="Email ou login">
                        </div>
                    </div>
                    <div class ="col-sm-12 col-md-6 col-lg-6">    
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Mot de passe">
                        </div>
                    </div>  
                    <div class ="col-12"><br>  
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>    
                    </form>
                </div>
            </div>   
        </div>  

    <?php
        include "inc/social_networks.php";
        include "inc/footer.php"; 

        ob_end_flush();