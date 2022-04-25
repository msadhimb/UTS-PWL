<?php
     include "database.php";

     $id = explode("|", base64_decode($_GET['id']));

     $del = $db->prepare("DELETE FROM users WHERE id=?");
     $del->execute([$id[1]]);

     header("Location: user.php");
?>