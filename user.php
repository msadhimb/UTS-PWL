<?php
	session_start();
	if($_SESSION['isLogin'] != true || $_SESSION['jam_selesai']==date("Y-m-d H:i:s"))
	{
		header("Location: form_login.php?message=nologin");
	}
	
	echo "<br>";
	
	include "database.php";

    $rs = $db->query("SELECT * FROM users");

    $rs->setFetchMode(PDO::FETCH_OBJ);
	

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
			margin: 50px 0;
			color: white;
		}
		.user, .posting{
			width: 200px;
		}
        .gambarAkun{
            width: 100px;
            height: 120px;
        }
		.formInput{
			height: 0;
			visibility: hidden;
		}
		.formInput.formInputMuncul{
			height: auto;
			visibility: visible;
			transition: 2s;
		}
		.navPict{
			border-radius: 50%;
			width: 35px;
			height: 35px;
		}
		/* Form */
		.col-md-4{
			background-color: #282929;
            padding: 10px 10px;
            border-radius: 10px;
            box-shadow: 15px 5px 25px #2f3b3b;
		}
		.form-control{
			background: none;
			border: none;
			border-bottom: 1px solid white;
			color: white;
		}
		/* Akhir Form */
	</style>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src="user/<?php echo $_SESSION['gambar']?>" alt="" width="30" height="24" class="d-inline-block align-text-center ms-5 me-3 navPict"><?php echo$_SESSION['uname']?></a>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link me-2" href="home.php">Home</a>
                    <a class="nav-link me-2 active" href="user.php">User</a>
                    <a class="nav-link me-2" href="post.php">Post</a>
					<a class="btn btn-danger nav-link me-5 text-white" href="logout.php">Logout<i class="ms-2 fa fa-sign-out " style="font-size:20px;color:white"></i></a>
				</div>
			</div>
		</div>
	</nav>
    
    <section class="formInput" id="inputan">
		<h3 style="text-align: center;margin-top: 50px">INPUT USER</h3>
		
		<div class="row d-flex justify-content-center">
			<div class="col-md-4 text-white">
					<?php
						if(isset($_GET['msg']))
						{
							if($_GET['msg']=='not-match')
							{
					?>
						<div class="alert alert-danger">Password dan Confirm password tidak cocok</div> 
					<?php
							}
						}
					?>
				<form method="post" action="saveUser.php" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Name</label>
							<input class="form-control" name="name" required>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Gambar</label>
							<input type="file" class="form-control" name="image" required>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email</label>
							<input type="email" class="form-control" name="email" required>
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" name="passwd" required>
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Confirm Password</label>
							<input type="password" class="form-control" name="cpasswd" required>
						</div>
						<input type="submit" class="btn btn-outline-primary" value="Save">
						<a href="#" class="btn btn-outline-danger cancel">Cancel</a>
				</form>
			</div>
		</div>
	</section>

	<section class="dataAkun">
		<h3><br>Data Akun</h3>
		<div class="row d-flex justify-content-center text-white">
			<div class="col-md-7">
			<table class="table table-dark table-striped text-center">
				<thead>
					<tr>
					<th scope="col">No</th>
					<th scope="col">Gambar</th>
					<th scope="col">Nama</th>
					<th scope="col">Email</th>
					<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$i = 1;
					while($data = $rs->fetch()){
				?>
					<tr>
						<td><?php echo $i?></td>
						<td><img src="user/<?php echo $data->Gambar?>" alt="" class="gambarAkun img-fluid"></td>
						<td><?php echo $data->Nama?></td>
						<td><?php echo $data->Email?></td>
						<td><a href="edit.php?id=<?php echo base64_encode(sha1(rand())."|".$data->id)?>" class="btn btn-success edit">Edit</a> | <a href="delete.php?id=<?php echo base64_encode(sha1(rand())."|".$data->id)?>" class="btn btn-outline-danger">Delete</a></td>
					</tr>
					<?php
						$i++;
					}
					?>
				</tbody>
			</table>
            <div class="d-flex flex-row-reverse">
				<a href="#inputan" class="btn btn-success input">INPUT</a>
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
	<script>
		$(".input").on("click", function(){
			$(".formInput").toggleClass("formInputMuncul");
		})
		$(".cancel").on("click", function(){
			$(".formInput").toggleClass("formInputMuncul");
		})
	</script>
  </body>
</html>