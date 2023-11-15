<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "druddb");

session_start();

if(!isset($_SESSION["user_login"])){
	die("You are not allow to access this page.");
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
		<div class="col-md-12">
			
			<div class="card mt-2">
				<div class="card-header">
					List
					
					<a href="add.php" class="btn btn-primary btn-sm">
						Add Item
					</a>
				</div>
				
				<div class="card-body">
					<table class="table table-hover table-fluid table-bordered dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Date</th>
								<th>:::</th>
							</tr>
						</thead>
						
						<tbody>
						<?php
							$q = mysqli_query($conn, "SELECT * FROM items");
							$no = 1;
							
							while($r = mysqli_fetch_array($q)){
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $r["i_name"] ?></td>
								<td><?= $r["i_date"] ?></td>
								<td>
									<a href="edit.php?id=<?= $r["i_id"] ?>" class="btn btn-sm btn-warning">
										Edit
									</a>
									
									<a href="delete.php?id=<?= $r["i_id"] ?>" class="btn btn-sm btn-danger">
										Delete
									</a>
								</td>
							</tr>
							<?php
							}
						?>
						</tbody>
					</table>
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