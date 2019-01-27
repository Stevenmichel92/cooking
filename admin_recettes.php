        <?php include 'inc/head_info.php' ?>
        <title> Admin recettes - Cooking </title>  
    </head>
        <?php 
            include 'inc/header.php';
            include 'inc/nav.php';
            include 'inc/requete_sql.php';
        ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"> Gestion recettes</li>
            </ol>
        </nav>    

        <div class="container-fluid recettes_body" >
            <br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#md_save" onclick="clear_modal();">Ajouter nouvelle recette</button><br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                            <th scope="col">Login membre</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Chapo</th>
                            <th scope="col">Image</th>
                            <th scope="col">Préparation</th>
                            <th scope="col">Ingrédient</th>
                            <th scope="col">Couleur</th>
                            <th scope="col">Temps de cuisson</th>
                            <th scope="col">Temps de préparation</th>
                            <th scope="col">Difficulté</th>
                            <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                </tbody>
            </table>

                <div class="modal fade" id="md_save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" id="myform" action="ajax/addRecette_ajax.php" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajout nouvelle recette</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                <div class="form-group">
                                    <label for="login">List des Login</label>
                                    <select class="form-control" id="login" name="login">
                                        <option value="-1" selected>...</option>

                                        <?php
                                            $pdo =pdo();
                                            $result = $pdo->query("SELECT * FROM membres");

                                            while($membre = $result->fetch(PDO::FETCH_ASSOC))
                                            {
                                                ?>
                                                    <option value="<?php echo $membre["idMembre"] ?>"><?php echo $membre["login"] ?></option>
                                                <?php
                                            }
                                            ?>

                                    </select>
                                </div>
                                    
                                    <div class="form-group">
                                        <label for="log">Confirmation Login</label>
                                        <input type="text" class="form-control" id="log" name="log" placeholder=" log">
                                    </div>

                                    <div class="form-group">
                                        <label for="titre">Titre</label>
                                        <input type="text" class="form-control" id="titre" name="titre" placeholder=" titre">
                                    </div>

                                    <div class="form-group">
                                        <label for="chapo">Chapo</label>
                                        <textarea type="text" class="form-control" id="chapo" name="chapo" placeholder=" chapo"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="preparation">Préparation</label>
                                        <textarea type="text" class="form-control" id="preparation" name="preparation" placeholder=" préparation"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="ingredient">Ingrédient</label>
                                        <textarea type="text" class="form-control" id="ingredient" name="ingredient" placeholder=" ingrédient"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="couleur"><strong>Couleur</strong></label>
                                        <input type="text" class="form-control" id="couleur" name="couleur" placeholder=" couleur">
                                        <!-- <select class="form-control" id="couleur" name="couleur">
                                            <option value="-1" selected>fushia</option>
                                            <option value="-1" >Vert Clair</option>
                                            <option value="-1" >Bleu Clair</option>
                                        </select> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="cuisson">Temps de cuisson</label>
                                        <input type="number" class="form-control" id="cuisson" name="cuisson" placeholder=" Temps de cuisson">
                                    </div>

                                    <div class="form-group">
                                        <label for="tempspreparation">Temps de préparation</label>
                                        <input type="number" class="form-control" id="tempspreparation" name="tempspreparation" placeholder=" Temps de préparation">
                                    </div>

                                    <div class="form-group">
                                        <label for="difficulte">Difficulté</label>
                                        <input type="text" class="form-control" id="difficulte" name="difficulte" placeholder=" difficulte">
                                        <!--<select class="form-control" id="difficulte" name="difficulte">
                                            <option value="-1" selected>Facile</option>
                                            <option value="-1" >Moyen</option>
                                            <option value="-1" >Difficile</option>
                                        </select> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="prix">Prix</label>
                                        <input type="text" class="form-control" id="prix" name="prix" placeholder=" prix">
                                        <!--<select class="form-control" id="prix" name="prix">
                                            <option value="-1" selected>Pas cher</option>
                                            <option value="-1" >Moyen cher</option>
                                            <option value="-1" >Cher</option>
                                        </select>-->
                                    </div>

                                    <div class="form-group">
                                        <label for="myimg">Image</label>
                                        <input type="file" class="form-control" id="myimg" name="myimg" placeholder="Image">
                                    </div>

                                    <div id="alert_save" style="display:none;" class="alert alert-success" role="alert">
                                        C'est ok!
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <input type="submit" class="btn btn-primary" value="Enregistrer" onclick="addRecette_ajax();" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="md_upload"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" id="myform_update" action="ajax/updateRecette_ajax.php" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modification recette</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                
                                <div class="form-group display">
                                    <label for="idRecette"><strong>idRecette</strong></label>
                                    <input type="text" class="form-control" id="idRecette" name="idRecette" placeholder="idRecette">
                                </div>

                                <div class="form-group">
                                    <label for="update_login">Login</label>
                                    <select class="form-control" id="update_login" name="update_login">
                                        <option value="-1" selected>...</option>

                                        <?php
                                            $pdo =pdo();
                                            $result = $pdo->query("SELECT * FROM membres");

                                            while($membre = $result->fetch(PDO::FETCH_ASSOC))
                                            {
                                                ?>
                                                    <option value="<?php echo $membre["idMembre"] ?>"><?php echo $membre["login"] ?></option>
                                                <?php
                                            }
                                            ?>
                                            
                                    </select>
                                </div>

                                <div class="form-group">
                                        <label for="update_titre">Titre</label>
                                        <input type="text" class="form-control" id="update_titre" name="update_titre" placeholder=" titre">
                                    </div>

                                    <div class="form-group">
                                        <label for="update_chapo">Chapo</label>
                                        <textarea class="form-control" id="update_chapo" name="update_chapo"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="update_preparation">Préparation</label>
                                        <textarea class="form-control" id="update_preparation" name="update_preparation"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="update_ingredient">Ingrédient</label>
                                        <textarea class="form-control" id="update_ingredient" name="update_ingredient"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="update_couleur"><strong>Couleur</strong></label>
                                        <input type="text" class="form-control" id="update_couleur" name="update_couleur" placeholder=" couleur">
                                        <!-- <select class="form-control" id="couleur" name="couleur">
                                            <option value="-1" selected>fushia</option>
                                            <option value="-1" >Vert Clair</option>
                                            <option value="-1" >Bleu Clair</option>
                                        </select> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="update_cuisson">Temps de cuisson</label>
                                        <input type="text" class="form-control" id="update_cuisson" name="update_cuisson" placeholder=" Temps de cuisson">
                                    </div>

                                    <div class="form-group">
                                        <label for="update_tempspreparation">Temps de préparation</label>
                                        <input type="text" class="form-control" id="update_tempspreparation" name="update_tempspreparation" placeholder=" Temps de préparation">
                                    </div>

                                    <div class="form-group">
                                        <label for="update_difficulte">Difficulté</label>
                                        <input type="text" class="form-control" id="update_difficulte" name="update_difficulte" placeholder=" difficulte">
                                        <!--<select class="form-control" id="difficulte" name="difficulte">
                                            <option value="-1" selected>Facile</option>
                                            <option value="-1" >Moyen</option>
                                            <option value="-1" >Difficile</option>
                                        </select> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="update_prix">Prix</label>
                                        <input type="text" class="form-control" id="update_prix" name="update_prix" placeholder=" prix">
                                        <!--<select class="form-control" id="prix" name="prix">
                                            <option value="-1" selected>Pas cher</option>
                                            <option value="-1" >Moyen cher</option>
                                            <option value="-1" >Cher</option>
                                        </select>-->
                                    </div>

                                    <div class="form-group">
                                        <label for="update_myimg">Image</label>
                                        <input type="file" class="form-control" id="update_myimg" name="update_myimg">
                                    </div>
                                    <div id="alert_save" style="display:none;" class="alert alert-success" role="alert">
                                        C'est ok!
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <input type="submit" class="btn btn-primary" value="Enregistrer"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>                

                // UPDATE recette
                $(document).ready(function (e) {
                    $("form#myform_update").submit(function(e) {

                        e.preventDefault();
                        
                        let request = $.ajax({
                            type: 'POST',
                            url: $("#myform_update").attr('action'),
                            data: new FormData(this),
                            cache: false,
                            contentType: false,
                            processData: false
                        });

                        request.done(function(result){
                            
                            refreshData();
                            $('#md_upload').modal('hide');

                        });

                        request.fail(function(result){
                            alert("NOOK");
                        });
                    });
                });

                // ADD new recette
                $(document).ready(function (e) {
                    $("form#myform").submit(function(e) {

                        e.preventDefault();
                        
                        let request = $.ajax({
                            type: 'POST',
                            url: $("#myform").attr('action'),
                            data: new FormData(this),
                            cache: false,
                            contentType: false,
                            processData: false
                        });

                        request.done(function(result){ 

                            refreshData();
                            $('#md_save').modal('hide');
            
                        });

                        request.fail(function(result){
                            alert("NOOK");
                        });
                    });
                });

                function clear_modal() {
                        $('#login option:eq(0)').prop('selected', true);
                        $("#log").val("");
                        $("#titre").val("");
                        $("#chapo").val("");                     
                        $("#preparation").val("");
                        $("#ingredient").val("");
                        $("#couleur").val("");
                        $("#cuisson").val("");
                        $("#tempspreparation").val("");
                        $("#difficulte").val("");
                        $("#prix").val("");
                        $("#myimg").val("");
                }

                function getRecette(idRecette) {
                    let request = $.ajax({
                        'url' : 'ajax/getRecette_ajax.php',
                        'type': 'POST',
                        'data': { 
                                'idRecette': idRecette
                            }
                    });
                    
                    request.done(function(result) {
            
                        let obj = jQuery.parseJSON(result);

                        $("#idRecette").val(obj.idRecette) 
                        $("#update_login option[value='" + obj.idMembre + "']").prop('selected', true);
                        $("#update_titre").val(obj.titre); 
                        $("#update_chapo").val(obj.chapo);                      
                        $("#update_preparation").val(obj.preparation);
                        $("#update_ingredient").val(obj.ingredient);
                        $("#update_couleur").val(obj.couleur);
                        $("#update_cuisson").val(obj.tempsCuisson);
                        $("#update_tempspreparation").val(obj.tempsPreparation);
                        $("#update_difficulte").val(obj.difficulte);
                        $("#update_prix").val(obj.prix);
                        $("#update_myimg").val(obj.img);

                    });    
                    request.fail(function() {
                            
                    });

                }

                function deleteRecette(idRecette) {
                    let request = $.ajax({
                        'url' : 'ajax/deleteRecette_ajax.php',
                        'type': 'POST',
                        'data': { 
                                    'idRecette': idRecette
                                }
                    });
                    request.done(function(result) {

                        if (result == 1) {

                            refreshData();

                        }
                    });    
                    request.fail(function() {

                    });
                }
            
                function refreshData() {
                    let request = $.ajax({
                        url: 'ajax/getListeRecettes_ajax.php',
                    });

                    
                    request.done(function(result){

                        $("#myTable").html(result);

                    });

                    request.fail(function(result){
                        alert("NOOK");
                    });
                }

                $(document).ready(function (e) {
                    refreshData();
                });    
                        

            </script>

                <?php
                    include "inc/social_networks.php";
                    include "inc/footer.php"; 
                