<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "druddb");

session_start();

if(isset($_POST["username"], $_POST["password"])){
	$users = mysqli_query($conn, "SELECT * FROM users WHERE username = '". $_POST["username"] ."' AND password = '". $_POST["password"] ."'");
	$Nusers = mysqli_num_rows($users);
	
	if($Nusers > 0){
		$_SESSION["user_login"] = true;
		
		header("Location: protected.php");
	}else{
		?>
		<script>
		alert("Username or password is incorrect.");
		</script>
		<?php
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PHP CRUD</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
		
		<div class="col-md-4">
			
			<div class="card mt-2">
				<div class="card-header">
					Login
				</div>
				
				<div class="card-body">
					<form action="" method="POST">
						Username:
						<input type="text" name="username" class="form-control" name="username" /><br />
						
						Password:
						<input type="password" name="password" class="form-control" name="password" /><br />
						
						<button class="btn btn-sm btn-success">
							Login
						</button>
					</form>
				</div>
			</div>
			
		</diV>
	</div>
</div>

<script>
$(".dataTable").DataTable();
</script>
</body>
</html> 