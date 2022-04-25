<?php
    include "database.php";

    $name = $_POST['name'];
    $namaGambar = $_FILES['image']['name'];
    $lokasiGambar = $_FILES['image']['tmp_name'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $cpasswd = $_POST['cpasswd'];
    $id_dari_form = $_POST['id'];

    if($passwd==$cpasswd)
    {
    	$id = explode("|",base64_decode($id_dari_form));

        $psw = password_hash($passwd,PASSWORD_DEFAULT);

        move_uploaded_file($lokasiGambar, 'user/'.$namaGambar);
	    $upd = $db->prepare("UPDATE users SET Nama=?, Gambar=?, Email=?, Password=? WHERE id=?");
	    $upd->execute([$name, $namaGambar, $email , $psw, $id[1]]);
        header("Location: user.php?message=success");  	
    }
    else
    {
        header("Location: edit.php?message=not-match");
    }
?>
