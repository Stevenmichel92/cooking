        <?php include 'inc/head_info.php' ?>
        <title> Inscription - Cooking </title>  
    </head>
        <?php 
            include 'inc/requete_sql.php';
            include 'inc/header.php';
            include 'inc/nav.php';
        ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="connexion.php">Connexion</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inscription</li>
            </ol>
        </nav>   

        <div class="container recettes_body">
            <div class="row justify-content-center">
                <div class ="col-sm-12 col-md-6">
                    <br>
                    <h3>Je m'inscris</h3>
                    <?php
                        $files = $_FILES["fileToUp"]["name"];
                        
                        if(isset($_POST["login"])){
                            $filter = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                            $pdo = pdo();
                            $result = $pdo->query("SELECT * FROM membres WHERE login = '$filter[login]'");
                            $exist = $result->fetch(PDO::FETCH_ASSOC);
                            if($exist == true){
                                    echo "Le login existe déjà, veuilez choisir un autre!";
                            }
                            else{
                                $psswd = $filter['password'];
                                $hash = password_hash($psswd, PASSWORD_DEFAULT);
                                $max = selectMaxIdMembre();
                                $newMax = $max["MAX(idMembre)"] + 1;
                                insertLogin();
                                echo "Compte créé avec succès!<br>";
                            }
                        }    
                    ?>

                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="prenom">Prénom*</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Mon prénom" required>
                        </div>  
                        <div class="form-group">
                            <label for="nom">Nom*</label>
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Mon nom" required>
                        </div> 
                        <div class="form-group">
                            <label for="login">Login*</label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Mon pseudo" required>
                        </div> 
                        <div class="form-group">
                            <label for="password">Mon mot de passe*</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mon mot de passe" required>
                        </div> 
                        <div class="form-group">
                            <label for="fileToUp">Mon avatar*</label>
                            <input type="file" name="fileToUp" id="fileToUp" >
                        </div> 
                            <?php 
                                if($files){
                                    include 'inc/upload_gravatar.php';
                                    echo "<br><br>";
                                }
                                else{
                                    echo "<br><br>";
                                }
                            ?>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-info" name="inscrire">S'inscrire</button>
                            </div>
                    </form>
                </div>   
            </div>   
        </div>    
    <?php
        include "inc/social_networks.php";
        include "inc/footer.php"; 