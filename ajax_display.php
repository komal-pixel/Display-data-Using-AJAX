<?php 
	include("connect.php");

  	$request=$_REQUEST;
  	$col=array(				//col request
  		0 => 'id',
  		1 => 'name',
  		2 => 'mobile',
  		3 => 'country',
  		4 => 'subject'
  	);
  	$sql=mysqli_query($my_DBObj, "SELECT * from contact") or die();

  	$totalData	 =	mysqli_num_rows($sql);
  	$totalFilter =	$totalData;
  	$data 		 =	array();

 //Search
$sql ="SELECT * FROM contact WHERE 1=1";

if(!empty($request['search']['value'])){
    $sql.=" AND (id Like '".$request['search']['value']."%' ";
    $sql.=" OR name Like '".$request['search']['value']."%' ";
    $sql.=" OR mobile Like '".$request['search']['value']."%' ";
    $sql.=" OR country Like '".$request['search']['value']."%' ";
    $sql.=" OR subject Like '".$request['search']['value']."% ' ) ";

}

$query=mysqli_query($my_DBObj,$sql);
$totalData=mysqli_num_rows($query); 

//Order
$sql.= " ORDER BY ".$col[$request['order'][0]['column']]."  ".$request['order'][0]['dir']." LIMIT ".
		$request['start']."  ,".$request['length']."  ";
		

$query=mysqli_query($my_DBObj,$sql);
$totalData=mysqli_num_rows($query); 

	while($row=mysqli_fetch_array($query)){
		$subdata=array();
		$subdata[]=$row[0];
		$subdata[]=$row[1];
		$subdata[]=$row[2];
		$subdata[]=$row[3];
		$subdata[]=$row[4];
		$data[]=$subdata;

	}
	$json_data=array(
		"draw" 				=> intval($request['draw']),
		"recordsTotal"      =>  intval($totalData),
		"recordsFiltered"	=> intval($totalFilter),
		"data"				=> $data
	);

	echo json_encode($json_data);

	
?>