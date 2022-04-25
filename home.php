<?php
	session_start();
	if($_SESSION['isLogin'] != true || $_SESSION['jam_selesai']==date("Y-m-d H:i:s"))
	{
		header("Location: form_login.php?message=nologin");
	}
	
	echo "<br>";
	
	include "database.php";

    $rs = $db->query("SELECT * FROM users");
	//$rw = $db->query("SELECT * FROM datamahasiswa");

	//$rs->setFetchMode(PDO::FETCH_ASSOC);
    $rs->setFetchMode(PDO::FETCH_OBJ);
	// $rw->setFetchMode(PDO::FETCH_OBJ);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Hello, world!</title>
	<style>
		body{
			overflow-x: hidden;
			background-color: #4a4a4a;
		}
		h3{
			text-align: center;
			margin-top: 50px;
			color: white;
		}
		.user, .posting{
			width: 200px;
		}
		img{
			border-radius: 50%;
			width: 35px;
			height: 35px;
		}
	</style>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src="user/<?php echo $_SESSION['gambar']?>" alt="" width="30" height="24" class="d-inline-block align-text-center ms-5 me-3"><?php echo$_SESSION['uname']?></a>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ms-auto">
				<a class="nav-link me-2 active" href="home.php">Home</a>
                    <a class="nav-link me-2" href="user.php">User</a>
                    <a class="nav-link me-2" href="post.php">Post</a>
					<a class="btn btn-danger nav-link me-5 text-white" href="logout.php">Logout<i class="ms-2 fa fa-sign-out " style="font-size:20px;color:white"></i></a>
				</div>
			</div>
		</div>
	</nav>
    <h3><?php echo "Login pada: ",$_SESSION['jam_mulai'];?></h3>

	<section class="butt">
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-3">
				<img src="avatar.png" class="d-block mx-auto mb-3" style="width: 200px;height:200px">
				<div class="d-grid gap-2 d-md-flex justify-content-md-center">
					<a href="user.php" class="btn btn-outline-warning user">User</a>
				</div>
			</div>
			<div class="col-md-3">
				<img src="post.png" class="d-block mx-auto mb-3" style="width: 200px;height:200px">
				<div class="d-grid gap-2 d-md-flex justify-content-md-center">
					<a href="post.php" class="btn btn-outline-light posting">Posting</a>
				</div>
			</div>
		</div>
	</section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  </body>
</html>