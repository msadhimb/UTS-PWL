
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
			.formRegis{
				margin-top: 50px;
			}
		</style>
	</head>
	<body>
		<section class="formRegis">
			<h1 style="text-align: center;">REGISTRATION FROM</h1>
	
			<div class="row d-flex justify-content-center">
				<div class="col-md-4">
						<?php
							if(isset($_GET['msg']))
							{
								if($_GET['msg']=='not-match')
								{
						?>
							<div class="alert alert-danger">Password dan Confirm password tidak cocok</div> 
						<?php
								}
								elseif($_GET['msg']=='success'){
									header("location: login.php?message=success");
								}
							}
						?>
					<form method="post" action="save_form.php" enctype="multipart/form-data">
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
						<input type="submit" class="btn btn-primary" value="Save">
						<a href="login.php" class="btn btn-danger">Cancel</a>
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
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	
	</body>
