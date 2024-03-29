
<?php
	//include connection file 
	include_once("../connection.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 =>'id',
		1 =>'lname', 
		2 => 'fname',
		3 => 'age',
        4 => 'gender',
        5 => 'street',
		6 => 'bloodtype',
		7 => 'relationtohead',
        8 => 'pwd',

	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( id LIKE '".$params['search']['value']."%' ";    
		$where .=" OR lname LIKE '".$params['search']['value']."%' ";
        $where .=" OR name LIKE '".$params['search']['value']."%' ";
        $where .=" OR age LIKE '".$params['search']['value']."%' ";
		$where .=" OR gender LIKE '".$params['search']['value']."%' )";
        $where .=" OR street LIKE '".$params['search']['value']."%' ";
		$where .=" OR bloodtype LIKE '".$params['search']['value']."%' ";
		$where .=" OR relationtohead LIKE '".$params['search']['value']."%' ";
        $where .=" OR pwd LIKE '".$params['search']['value']."%' ";
	}

	// getting total number records without any search
	$sql = "SELECT * FROM `tblresident` ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}


 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch data");

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_row($queryRecords) ) { 
		$data[] = $row;
	}	

	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	