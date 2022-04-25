<?php

    include "database.php";
    $id_dari_form = $_POST['id'];

    if(isset($_POST['Post'])){
        $namaGambar = $_FILES['image']['name'];
        $lokasiGambar = $_FILES['image']['tmp_name'];

        $sub = $_POST['subject'];
        $desc = $_POST['status'];

        move_uploaded_file($lokasiGambar, 'post/'.$namaGambar);
        $id = explode("|",base64_decode($id_dari_form));

        $ins = $db->prepare("UPDATE post SET post_title=?, post_image=?, post_description=? WHERE post_id=?");
        $ins->execute([$sub, $namaGambar, $desc, $id[1]]);
        header("Location: post.php");
    }
?>