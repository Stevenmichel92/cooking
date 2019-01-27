
<div class="card" style="border-radius:50px">
    <img src="img/pictures/recettes/<?php echo $recette['img'] ?>" width="100" height="100" class="card-img-top" style="border-top-left-radius:50px; border-top-right-radius:50px" alt="<?php echo $recette['img'] ?>"><button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal<?php echo $recette['idRecette']?>">Voir recette complète</button>

    <div class="card-body couleur_card" style="border-bottom-right-radius:50px; border-bottom-left-radius:50px">
        <h5 class="card-title couleur_card_titre"><?php echo $recette['titre'] ?></h5>
        <p class="card-text"><?php echo $recette['chapo']?></p> 
    
        <?php
        $membre = selectRecettesByIdRecettesAndIdMembres();    
        if($recette['couleur'] == 'fushia'){
            ?><div class="fushia border_radius"><?php
        }
        else if($recette['couleur'] == 'bleuClair'){
            ?><div class="bleuClair border_radius"><?php
        }
        else{
            ?><div class="vertClair border_radius"><?php
        }
    ?>
        <img src="img/pictures/gravatars/<?php echo $membre['gravatar'] ?>" width="80" height="80" class="border_radius" alt="<?php echo $membre['gravatar'] ?>">
        <span>Proposé par <a href="membre_detail.php?id=<?php echo $membre['prenom'] ?>"><?php echo $membre['prenom'] ?></a></span>
    </div>
</div>
  
<div class="modal fade" id="exampleModal<?php echo $recette['idRecette']?>"  tabindex="-1" role="dialog" aria-labelledby="example<?php echo $recette['idRecette'] ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example<?php echo $recette['idRecette'] ?>"><?php echo $recette['titre'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <img src="../img/pictures/recettes/<?php echo $recette['img'] ?>" width="100" alt="<?php echo $recette['img'] ?>"><br><br>
            </div>
            <div class="col-12">    
                <i><?php echo $recette['chapo']; ?>
                </i><br>
                <hr>
                <h4>Préparation</h4><?php echo $recette['preparation'] ?><br>
            </div> 

            <div class="col-12">                 
                <h4>Ingrédient</h4><?php echo $recette['ingredient'] ?><br>              
            </div>
            <div class="col-12">         
                    <strong>Temps de cuisson </strong>: <?php echo $recette['tempsCuisson'] ?><br>
                    <strong>Temps de préparation </strong> : <?php echo $recette['tempsPreparation'] ?><br>
                    <strong>Difficulté </strong> : <?php echo $recette['difficulte'] ?><br>
                    <strong>Prix </strong> : <?php echo $recette['prix'] ?><br><br>
            </div>      
                <div class="col-12">    
                    <?php
                            if($recette['couleur'] == 'fushia'){
                                ?><div class="fushia"><?php
                            }
                            else if($recette['couleur'] == 'bleuClair'){
                                ?><div class="bleuClair"><?php
                            }
                            else{
                                ?><div class="vertClair"><?php
                            } 
                        ?>   
                    <img src="../img/pictures/gravatars/<?php echo $membre['gravatar'] ?>" width="50" height="50" alt="<?php echo $membre['gravatar'] ?>" style="border-radius:50%"><?php
                    ?><strong> Recette proposée par <a href="membre_detail.php?id=<?php echo $membre['prenom']?> "><?php echo $membre['prenom']?></a></strong>
                </div>
            </div>    
        </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
</div>

<br>


