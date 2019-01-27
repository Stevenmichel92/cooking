<?php
        
    include '../connectBDD/connect.php';
    $pdo = new PDO($host, $user, $mdp, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    $result = $pdo->query("SELECT * FROM membres ORDER BY idMembre DESC");   
    while($membre = $result->fetch(PDO::FETCH_ASSOC))
    {
        ?>
            <tr>
                <td><?php echo $membre["login"] ?></td>
                <td><?php echo $membre["gravatar"] ?><br>
                <img src="img/pictures/gravatars/<?php echo $membre['gravatar'] ?>" width="100px"></td>
                <td><?php echo $membre["password"] ?></td>
                <td><?php echo $membre["statut"] ?></td>
                <td><?php echo $membre["prenom"] ?></td>
                <td><?php echo $membre["nom"] ?></td>
                <td><?php echo $membre["administrateur"] ?></td>
                
                <td>
                    <button type="button" class="btn btn-danger" onclick="deleteMembre('<?php echo $membre['idMembre'] ?>')"><i class="fas fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#md_upload" onclick="getMembre('<?php echo $membre['idMembre'] ?>')"><i class="fas fa-edit"></i></button>
                </td>
            </tr>
            
        <?php
    }