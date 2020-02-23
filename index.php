	<!-- require("connect.php"); -->
	<?php 	include("connect.php");?>
<style>
	.container{
		padding: 5%;
	}
</style>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="utf-8">
  	  <meta name="viewport" content="width=device-width, initial-scale=1">
  	  <!-- Bootstrap Link -->
  	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 	  <!-- DataTables Lib -->
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

</head>
<body>
	<div class="container">
		<div class="row">
			<table id="ajax_table" style="width:100%" class="display">
				<thead>
					<tr>
						<th>id</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>Country</th>
						<th>Subject</th>
					</tr>
				</thead>		
			</table>
			
		</div>
		
	</div>
	<script> 
		$(document).ready(function(){
			var dataTables = $('#ajax_table').DataTable({
                "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"ajax_display.php",
                    type:"post"
                }				
			});
		});
	</script>

</body>
</html>