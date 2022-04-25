<?php
    include "database.php";

    if(isset($_POST['Post'])){
        $namaGambar = $_FILES['image']['name'];
        $lokasiGambar = $_FILES['image']['tmp_name'];

        $sub = $_POST['subject'];
        $stts = $_POST['status'];

        move_uploaded_file($lokasiGambar, 'post/'.$namaGambar);
        $ins = $db->prepare("INSERT INTO post (post_title, post_image, post_description) VALUES (?,?,?)");
        $ins->execute([$sub, $namaGambar, $stts]);
        header("Location: post.php");
    }
?>