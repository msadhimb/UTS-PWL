	<!doctype html>
	<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<title>Hello, world!</title>
		<style>
			body{
				overflow-x: hidden;
			}
			.alert{
				text-align: center;
			}
			.formLogin{
				margin-top: 50px;
			}
		</style>
	</head>
	<body>
		<section class="formLogin">
			<h1 style="text-align: center;">CRUD MYSQL</h1>
	
			<div class="row d-flex justify-content-center">
				<div class="col-md-4">
					<?php
						if(isset($_GET['message'])){
							if($_GET['message']=='nologin'){
					?>
						<div class="alert alert-danger">Anda harus login terlebih dahulu</div>
					<?php
							}elseif($_GET['message']=='logout'){
					?>
						<div class="alert alert-danger">Anda berhasil logout</div>
					<?php
							}elseif($_GET['message']=='failed'){
					?>
						<div class="alert alert-danger">username atau password salah</div>
					<?php
							}elseif($_GET['message']=='success'){
					?>
						<div class="alert alert-success">User berhasil dibuat</div>
					<?php			
							}
						}
					?>
					<form method="post" action="aksilogin.php">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email</label>
							<input type="email" class="form-control" name="email" require>
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" name="passwd" require>
						</div>
						<div class="regis text-end">
							<a href="registration.php" class="text-danger" style="text-decoration:none; text-align:end;">Belum memiliki akun?</a>
						</div>
						<input type="submit" class="btn btn-primary" value="LOGIN">
					</form>
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
		
	</body>