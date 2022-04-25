<?php
    include "database.php";

	$email = $_POST['email'];
	$password = $_POST['passwd'];

    $cekuser = $db->prepare("SELECT * FROM users WHERE Email=?");
    $cekuser->execute([$email]);

    if($cekuser->rowCount()>0){
        $cekuser->setFetchMode(PDO::FETCH_OBJ);
        $user = $cekuser->fetch();
        if(password_verify($password, $user->Password)){
            session_start();//untuk memulai session
            //melakukan assignment terhadap variabel session
            $_SESSION['uname'] = $user->Nama;
            $_SESSION['gambar'] = $user->Gambar;
            $_SESSION['jam_mulai'] = date("Y-m-d H:i:s");
            $_SESSION['jam_selesai'] = date("Y-m-d H:i:s",strtotime("+1 hour"));
            $_SESSION['isLogin'] = true;

            header("Location: home.php");
        }else{
            header("Location: login.php?message=failed");
        }
    }else{
        header("Location: login.php?message=failed");
    }