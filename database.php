<?php
   try {
        $db = new PDO("mysql:host=localhost;dbname=dataakun",'root','');
        //$db = new PDO("mysql:host=127.0.0.1");
        //$db = new PDO("mysql:host=localhost");
    }catch(PDOException $e){
        echo "Database gagal dihubungkan";
    }

?>