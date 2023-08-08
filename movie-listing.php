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
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	
	<style>
		.cover:hover {
			border: 1px solid red;
		}
	</style>
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<div class="card mt-2">
				<div class="card-header">
					List
					
					<a href="add.php" class="btn btn-primary btn-sm">
						Add Item
					</a>
				</div>
				
				<div class="card-body">
					<div class="row">
					<?php
						$q = mysqli_query($conn, "SELECT * FROM items");
						
						while($r = mysqli_fetch_array($q)){
					?>
						<div class="col-xl-2 col-lg-2 col-md-3 col-xs-3 col-6 text-center mb-3 p-2 cover">
						<?PHP
							if(strpos($r["i_url"], "http") > -1){
							?>
							<a href="<?= $r["i_url"] ?>">
							<?php
							}else{
							?>
							<a href="watch-movie.php?id=<?= $r["i_id"] ?>">
							<?php
							}
						?>
								<img src="./uploads/<?= $r["i_picture"] ?>" class="img img-fluid" />
								<br />
								
								<?= $r["i_name"] ?>
							</a>
						</div>
					<?PHP
						}
					?>
					</div>
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