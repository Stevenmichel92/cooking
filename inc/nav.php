<nav class="navbar navbar-expand-lg navbar-light bg-light nav navbar-center" >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse taille_nav" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" >
            <?php if($_SESSION['admin'] == false){?>
                <li class="nav-item active">
                    <a class="nav-link" href="recettes.php">NOS RECETTES <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" data-toggle="modal" href="#contact">CONTACT <span class="sr-only">(current)</span></a>
                </li>
            <?php }else{?>
                <li class="nav-item active">
                    <a class="nav-link" href="admin_recettes.php">RECETTES <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin_membres.php">MEMBRES <span class="sr-only">(current)</span></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>

<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactus">Nous contacter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Votre email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Votre message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Envoyer</button>
      </div>
    </div>
  </div>
</div>