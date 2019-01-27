<?php
    $target_dir = "img/pictures/gravatars/";
    $target_file = $target_dir . basename($files);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    