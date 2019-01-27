<?php
     include '../connectBDD/connect.php';
     $pdo = new PDO($host, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    // CREATION VUE sur SQL
    //$pdo->query("CREATE VIEW vue_recette_personne AS SELECT m.login, m.gravatar, r.idRecette, r.titre, r.chapo, r.img, r.preparation, r.ingredient, r.couleur, r.tempsCuisson, r.tempsPreparation, r.difficulte, r.prix  FROM membres m, recettes r WHERE m.idMembre = r.membre");

    $result = $pdo->query("SELECT * FROM vue_recette_personne ORDER BY idRecette DESC");
    while($recette = $result->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $recette["login"] ?><br>
                <img src="img/pictures/gravatars/<?php echo $recette['gravatar'] ?>" width="100px"></td>
                <td><?php echo $recette["titre"] ?></td>
                <td><?php echo $recette["chapo"] ?></td>
                <td><?php echo $recette["img"] ?><br>
                <img src="img/pictures/recettes/<?php echo $recette['img'] ?>" width="100px"></td>
                <td><?php echo $recette["preparation"] ?></td>
                <td><?php echo $recette["ingredient"] ?></td>
                <td><?php echo $recette["couleur"] ?></td>
                <td><?php echo $recette["tempsCuisson"] ?></td>
                <td><?php echo $recette["tempsPreparation"] ?></td>
                <td><?php echo $recette["difficulte"] ?></td>
                <td><?php echo $recette["prix"] ?></td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="deleteRecette('<?php echo $recette['idRecette'] ?>')"><i class="fas fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#md_upload" onclick="getRecette('<?php echo $recette['idRecette'] ?>')"><i class="fas fa-edit"></i></button>
                </td>
            </tr>
        <?php
    } 