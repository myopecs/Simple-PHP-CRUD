<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "druddb");

if(isset($_POST["add"])){
	if(!empty($_POST["name"])){
		$name = addslashes($_POST["name"]);
		$price = addslashes($_POST["price"]);
		$description = htmlspecialchars($_POST["description"]);
		$colors = "";
		
		if(isset($_POST["colors"]) && is_array($_POST["colors"])){
			$colors = implode(",", $_POST["colors"]);
		}
		
		$filename = "";
		
		if(is_uploaded_file($_FILES["picture"]["tmp_name"]) && file_exists($_FILES["picture"]["tmp_name"])){
			$filename = uniqid() . "-" . $_FILES["picture"]["name"];
			
			$ext = pathinfo($_FILES["picture"]["name"])["extension"];
			
			$acceptExt = ["jpg", "png", "gif", "jpeg", "pdf", "docx", "doc", "mp3"];
			
			if(in_array($ext, $acceptExt)){
				move_uploaded_file($_FILES["picture"]["tmp_name"], __DIR__ . "/uploads/" . $filename);
			}else{
				$error = "Only support files: " . implode(", ", $acceptExt);
			}
		}
		
		if(is_uploaded_file($_FILES["audio"]["tmp_name"]) && file_exists($_FILES["audio"]["tmp_name"])){
			$filename = uniqid() . "-" . $_FILES["audio"]["name"];
			
			$ext = pathinfo($_FILES["audio"]["name"])["extension"];
			
			$acceptExt = ["mp3", "wav", "mp4", "ogg"];
			
			if(in_array($ext, $acceptExt)){
				move_uploaded_file($_FILES["audio"]["tmp_name"], __DIR__ . "/uploads/" . $filename);
			}else{
				$error = "Only support files: " . implode(", ", $acceptExt);
			}
		}
		
		$q = false;
		
		if(!isset($error)){
			$date = date("Y-m-d");
		
			$q = mysqli_query($conn, "INSERT INTO items(i_name, i_price, i_description, i_picture, i_date, i_colors) VALUES('{$name}', '{$price}', '{$description}',  '{$filename}', '{$date}', '{$colors}')");
			
			if($q){
				header("Location: index.php");
			}else{
				$error = "Fail inserting your item record. Please try again.";
			}
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
				?>
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								Name:
								<input type="text" name="name" class="form-control" placeholder="Name" /><br />
								
								Description:
								<textarea id="editor" name="description"></textarea><br />
							</div>
							
							<div class="col-md-6">
								Price:
								<input type="text" name="price" class="form-control" placeholder="0.00" /><br />
								
								Picture:
								<input type="file" name="picture" /><br /><br />
								
								Audio:
								<input type="file" name="audio" /><br /><br />

								Colors:<br />
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="colors[]" class="form-check-input" value="red"> red
									</label>
								</div>
								
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="colors[]" class="form-check-input" value="blue"> blue
									</label>
								</div>
								
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="colors[]" class="form-check-input" value="yellow"> yellow
									</label>
								</div>
								
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" name="colors[]" class="form-check-input" value="green"> green
									</label>
								</div>
							</div>
							
							<div class="col-md-12 text-center pt-3">
								<button name="add" class="btn btn-success">
									Save Info
								</button>
							</div>
						</div>
					</form>
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