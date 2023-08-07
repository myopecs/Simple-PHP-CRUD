<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "druddb");

if(isset($_POST["delete"])){
	$id = (int)$_GET["id"];
	$q = mysqli_query($conn, "SELECT * FROM items WHERE i_id = '{$id}'");
	$n = mysqli_num_rows($q);
	
	if($n > 0){
		$r = mysqli_fetch_array($q);
		
		$q = mysqli_query($conn, "DELETE FROM items WHERE i_id = '{$id}'");
		
		if($q){
			header("Location: index.php");
		}else{
			$error = "Fail inserting your item record. Please try again.";
		}
	}else{
		$error = "No item found";
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
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<div class="card mt-2">
				<div class="card-header">
					Add Item
					
					<a href="index.php" class="btn btn-primary btn-sm">
						Back
					</a>
				</div>
				
				<div class="card-body">
				<?PHP
					if(isset($error)){
					?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Error!</strong> <?= $error ?>
					</div>
					<?php
					}
					
					if(isset($success)){
					?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Success!</strong> <?= $success ?>
					</div>
					<?php
					}
					
					$id = (int)$_GET["id"];
					$q = mysqli_query($conn, "SELECT * FROM items WHERE i_id = '{$id}'");
					$n = mysqli_num_rows($q);
					
					if($n > 0){
						$r = mysqli_fetch_array($q);
				?>
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								Name:
								<input type="text" disabled name="name" class="form-control" placeholder="Name" value="<?= $r["i_name"] ?>" /><br />
								
								Description:
								
								<?= htmlspecialchars_decode($r["i_description"]) ?>
							</div>
							
							<div class="col-md-6">
								Price:
								<input type="text" disabled name="price" value="<?= $r["i_price"] ?>" class="form-control" placeholder="0.00" /><br />
								
								Picture:
								<img class="img img-fluid" src="./uploads/<?= $r["i_picture"] ?>" /><hr />
								<input disabled type="file" name="picture" /><br /><br />	
							</div>
							
							<div class="col-md-12 text-center">
								<button name="delete" class="btn btn-danger">
									Confirm Delete
								</button>
							</div>
						</div>
					</form>
				<?PHP
					}
				?>
				</div>
			</div>
			
		</diV>
	</div>
</div>

<script>
ClassicEditor
.create( document.querySelector( '#editor' ) )
.then( editor => {
		console.log( editor );
} )
.catch( error => {
		console.error( error );
} );
</script>
</body>
</html> 