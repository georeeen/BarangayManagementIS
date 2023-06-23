<?php

//fetch.php

include('../connect.php');

$column = array('id', 'lname', 'fname', 'age', 'gender', 'street', 'bloodtype', 'relationtohead', 'pwd');

$query = "SELECT * FROM tblresident ORDER by id";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE id LIKE "%'.$_POST['search']['value'].'%" 
 OR lname LIKE "%'.$_POST['search']['value'].'%" 
 OR fname LIKE "%'.$_POST['search']['value'].'%" 
 OR age LIKE "%'.$_POST['search']['value'].'%" 
 OR gender LIKE "%'.$_POST['search']['value'].'%" 
 OR street LIKE "%'.$_POST['search']['value'].'%" 
 OR bloodtype LIKE "%'.$_POST['search']['value'].'%" 
 OR relationtohead LIKE "%'.$_POST['search']['value'].'%" 
 OR pwd LIKE "%'.$_POST['search']['value'].'%" 
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST['length'] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['lname'];
 $sub_array[] = $row['fname'];
 $sub_array[] = $row['age'];
 $sub_array[] = $row['gender'];
 $sub_array[] = $row['street'];
 $sub_array[] = $row['bloodtype'];
 $sub_array[] = $row['relationtohead'];
 $sub_array[] = $row['pwd'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM tblresident";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST['draw']),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data
);

echo json_encode($output);

?>