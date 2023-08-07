<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "druddb");

if(isset($_POST["edit"])){
	if(!empty($_POST["name"])){
		$id = (int)$_GET["id"];
		$q = mysqli_query($conn, "SELECT * FROM items WHERE i_id = '{$id}'");
		$n = mysqli_num_rows($q);
		
		if($n > 0){
			$r = mysqli_fetch_array($q);
			
			$name = addslashes($_POST["name"]);
			$price = addslashes($_POST["price"]);
			$description = htmlspecialchars($_POST["name"]);
			$colors = implode(",", $_POST["colors"]);
		
			$filename = $r["i_picture"];
			
			if(is_uploaded_file($_FILES["picture"]["tmp_name"]) && file_exists($_FILES["picture"]["tmp_name"])){
				$filename = uniqid() . "-" . $_FILES["picture"]["name"];
				
				move_uploaded_file($_FILES["picture"]["tmp_name"], __DIR__ . "/uploads/" . $filename);
			}
			
			$date = date("Y-m-d");
			
			$q = mysqli_query($conn, "UPDATE items SET i_name = '{$name}', i_price = '{$price}', i_description = '{$description}', i_picture = '{$filename}', i_date = '{$date}', i_colors = '{$colors}' WHERE i_id = '{$id}'");
			
			if($q){
				$success = "Item saved successfully.";
			}else{
				$error = "Fail inserting your item record. Please try again.";
			}
		}else{
			$error = "No item found";
		}
	}else{
		$error = "Name is required.";
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
								<input type="text" name="name" class="form-control" placeholder="Name" value="<?= $r["i_name"] ?>" /><br />
								
								Description:
								
								<textarea id="editor" name="description"><?= htmlspecialchars_decode($r["i_description"]) ?></textarea><br />
							</div>
							
							<div class="col-md-6">
								Price:
								<input type="text" name="price" value="<?= $r["i_price"] ?>" class="form-control" placeholder="0.00" /><br />
								
								Picture:
								<img class="img img-fluid" src="./uploads/<?= $r["i_picture"] ?>" /><hr />
								<input type="file" name="picture" /><br /><br />	
								
								<?PHP
									$colors = explode(",", $r["i_colors"]);
								?>
								Colors:<br />
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="colors[]" <?= in_array("red", $colors) ? "checked" : "" ?> class="form-check-input" value="red"> red
									</label>
								</div>
								
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" <?= in_array("blue", $colors) ? "checked" : "" ?> name="colors[]" class="form-check-input" value="blue"> blue
									</label>
								</div>
								
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" <?= in_array("yellow", $colors) ? "checked" : "" ?> name="colors[]" class="form-check-input" value="yellow"> yellow
									</label>
								</div>
								
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" <?= in_array("green", $colors) ? "checked" : "" ?> name="colors[]" class="form-check-input" value="green"> green
									</label>
								</div>
							</div>
							
							<div class="col-md-12 text-center pt-3">
								<button name="edit" class="btn btn-success">
									Save Info
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