<?php
	session_start();
	if($_SESSION['isLogin'] != true || $_SESSION['jam_selesai']==date("Y-m-d H:i:s"))
	{
		header("Location: form_login.php?message=nologin");
	}
	
	echo "<br>";
	
	include "database.php";

    $rs = $db->query("SELECT * FROM post");
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>

    <title>Hello, world!</title>
	<style>
        body{
            overflow-x: hidden;
			background-color: #4a4a4a;
		}
        /* Navbar */
		.navPict{
			border-radius: 50%;
			width: 35px;
			height: 35px;
		}
        /* Akhir Navbar */

        /* Postingan */
        .post{
            background-color: #282929;
            padding: 10px 10px;
            border-radius: 10px;
            box-shadow: 15px 5px 25px #2f3b3b;
        }
        /* Form */
        .form-control{
            background: none;
            background-color: none;
            color: white;
            border: none;
            border-bottom: 1px solid white;
        }
        .text{
            border: none;
            outline: none;
            height: 500px;
        }
        label{
            color: white;
        }
        input[type="file"]{
            display: none;
        }
        .attach{
            border-bottom: 1px solid white;
        }
        /* Akhir Form */
        /* Akhir Posting */

        /* Hasil Post */
        .hasil{
            margin:20px 0;
        }
        .garis{
            margin: 15px 0;
            border-bottom: 1px solid white;
        }
        /* Akhir Hasil Post */
	</style>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src="user/<?php echo $_SESSION['gambar']?>" alt="" width="30" height="24" class="d-inline-block align-text-center ms-5 me-3 navPict"><?php echo$_SESSION['uname']?></a>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link me-2" href="home.php">Home</a>
                    <a class="nav-link me-2" href="user.php">User</a>
                    <a class="nav-link me-2 active" href="post.php">Post</a>
					<a class="btn btn-danger nav-link me-5 text-white" href="logout.php">Logout<i class="ms-2 fa fa-sign-out " style="font-size:20px;color:white"></i></a>
				</div>
			</div>
		</div>
	</nav>
    
    <!-- Posting -->    
    <section class="postingan">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-5 post">
                <p style="color: #C3C3C3">Post something</p>
                <form method="post" action="simpanDataPost.php" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Subject" name="subject">
                        <label for="floatingInput">Subject</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea class="form-control text" placeholder="Leave a comment here" id="floatingTextarea" name="status"></textarea>
                        <label for="floatingTextarea">Text</label>
                    </div>
					<div class="mb-3 d-flex flex-row-reverse attach">
                        <input type="file" name="image" id="gambar">
						<label for="gambar" class="form-label" class="text-end"><i class="material-icons" style="font-size:30px;color:white">attachment</i></label>
					</div>
					<div class="mb-3 d-flex flex-row-reverse">
                        <input type="submit" class="btn btn-primary" value="Post" name="Post">
                    </div>
				</form>
            </div>
        </div>
    </section>
    <!-- Akhir Postingan -->

    <!-- Hasil Post -->
    <section class="hasilPost ">
        <?php
			while($data = $rs->fetch()){
		?>
        <div class="row d-flex justify-content-center hasil mt-5">
            <div class="col-md-5 listPost">
                <div class="row header">
                    <div class="col-md-1 me-3">
                        <img src="user/<?php echo $_SESSION['gambar']?>" alt="" width="30" height="24" class="d-inline-block" style="width: 50px; height: 50px; border-radius: 50%">
                    </div>
                    <div class="col-md-7">
                        <a href="#" style="border: none; color: white; text-decoration: none; font-size: 25px"><?php echo$_SESSION['uname']?></a>
                        <p class="mt-2" style="color: #C3C3C3; font-size: 20px"><?php echo $data->post_title?><p>
                    </div>
                    <div class="col-md-3 text-end p-0">
                        <a href="editPost.php?id=<?php echo base64_encode(sha1(rand())."|".$data->post_id)?>" style="border: none; color: white; text-decoration: none; font-size: 25px;"><span class="bi bi-pencil-square"></span></a>
                        <a href="deletePost.php?id=<?php echo base64_encode(sha1(rand())."|".$data->post_id)?>" style="border: none; color: white; text-decoration: none; font-size: 30px;"><span class="bi bi-x"></span></a>
                    </div>
                </div>
                <div class="body">
                    <p class="text-white" style="font-size: 28px;"><?php echo $data->post_description?></p>
                    <?php if($data->post_image != null){
                    ?>
                        <img src="post/<?php echo $data->post_image?>" alt="" class="img-fluid">
                    <?php
                    }else{
                        ?>
                    <div></div>
                    <?php
                    }
                    ?>
                </div>
                <div class="garis"></div>
            </div>
        </div>
        <?php
			}
		?>
    </section>
    <!-- Akhir Hasil Post -->

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