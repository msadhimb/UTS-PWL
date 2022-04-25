<?php
    include "database.php";

    $name = $_POST['name'];
    $namaGambar = $_FILES['image']['name'];
    $lokasiGambar = $_FILES['image']['tmp_name'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $cpasswd = $_POST['cpasswd'];

    if($passwd==$cpasswd)
    {
        $psw = password_hash($passwd,PASSWORD_DEFAULT);

        move_uploaded_file($lokasiGambar, 'user/'.$namaGambar);
	    $ins = $db->prepare("INSERT INTO users (Nama, Gambar, Email, Password) VALUES (?,?,?,?)");
        $ins->execute([$name, $namaGambar, $email, $psw]);
        header("Location: registration.php?msg=success");  	
    }
    else
    {
        header("Location: registration.php?msg=not-match");
    }
?>
