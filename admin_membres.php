<?php include 'inc/head_info.php' ?>
        <title> Admin membres - Cooking </title>  
    </head>
        <?php 
            include 'inc/header.php';
            include 'inc/nav.php';
            include 'inc/requete_sql.php';
        ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"> Gestion membres</li>
            </ol>
        </nav>    

        <div class="container-fluid recettes_body" >
            <br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#md_save" onClick="clear_modal();">Ajouter nouveau membre</button><br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                            <th scope="col">Login membre</th>
                            <th scope="col">Gravatar</th>
                            <th scope="col">Mot de passe</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Administrateur</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                </tbody>
            </table>

                <div class="modal fade" id="md_save"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" id="myform" action="ajax/addMembre_ajax.php" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajout nouveau membre</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="login">Login</label>
                                        <input type="text" class="form-control" id="login" name="login" placeholder="login">
                                    </div>

                                    <div class="form-group">
                                        <label for="mdp">Mot de passe</label>
                                        <input type="text" class="form-control" id="mdp" name="mdp" placeholder="mdp">
                                    </div>

                                    <div class="form-group">
                                        <label for="statut"><strong>Statut</strong></label>
                                        <input type="text" class="form-control" id="statut" name="statut" placeholder="statut">
                                    </div>

                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom">
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="nom">
                                    </div>

                                    <div class="form-group">
                                        <label for="admin"><strong>Administrateur</strong></label>
                                        <input type="text" class="form-control" id="admin" name="admin" placeholder="admin">
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
                                    <input type="submit" class="btn btn-primary" value="Enregistrer"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="md_upload"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" id="myform_update" action="ajax/updateMembre_ajax.php" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modification membre</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group display">
                                        <label for="idmembre"><strong>idMembre</strong></label>
                                        <input type="text" class="form-control" id="idmembre" name="idmembre" placeholder="idmembre">
                                    </div>

                                    <div class="form-group">
                                        <label for="update_statut"><strong>Statut</strong></label>
                                        <input type="text" class="form-control" id="update_statut" name="update_statut" placeholder="statut">
                                    </div>

                                    

                                    <div class="form-group">
                                        <label for="update_admin"><strong>Administrateur</strong></label>
                                        <input type="text" class="form-control" id="update_admin" name="update_admin" placeholder="admin">
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
                
            <script type="text/javascript">                

                // UPDATE membre
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

                // ADD new membre
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
                    $('#login').val("");
                        $('#mdp').val("");
                        $("#statut").val("");                    
                        $('#prenom').val("");
                        $('#nom').val("");
                        $("#admin").val("");
                }

                function getMembre(idMembre) {
                    let request = $.ajax({
                        'url' : 'ajax/getMembre_ajax.php',
                        'type': 'POST',
                        'data': { 
                                'idMembre': idMembre
                            }
                    });
                    
                    request.done(function(result) {
            
                        let obj = jQuery.parseJSON(result);
                        
                        $("#idmembre").val(obj.idMembre) 
                        $("#update_statut").val(obj.statut)                      
                        $("#update_admin").val(obj.administrateur);

                    });    
                    request.fail(function() {
                            
                    });

                }

                function deleteMembre(idMembre) {
                    let request = $.ajax({
                        'url' : 'ajax/deleteMembre_ajax.php',
                        'type': 'POST',
                        'data': { 
                                    'idMembre': idMembre
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
                        url: 'ajax/getListeMembres_ajax.php',
                    });

                    
                    request.done(function(result){

                        $("#myTable").html(result);

                    });

                    request.fail(function(result){
                        //alert("NOOK");
                    });
                }

                $(document).ready(function (e) {
                    refreshData();
                });    
                        

            </script>

    <?php
        include "inc/social_networks.php";
        include "inc/footer.php"; 
                