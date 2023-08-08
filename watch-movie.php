<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "druddb");

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
					
					$id = (int)$_GET["id"];
					$q = mysqli_query($conn, "SELECT * FROM items WHERE i_id = '{$id}'");
					$n = mysqli_num_rows($q);
					
					if($n > 0){
						$r = mysqli_fetch_array($q);
					?>
						<video controls style="width: 100%; heght: 400px;">
							<source src="./uploads/<?= $r["i_url"] ?>" type="video/mp4"></source>
						</video>
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