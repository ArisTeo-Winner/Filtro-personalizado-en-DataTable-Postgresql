<?php

require_once "config.php";

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Custom Field value
$searchByName = $_POST['searchByName'];
$searchByGender = $_POST['searchByGender'];
$searchByCity = $_POST['searchByCity'];

## Search 
$searchQuery = " ";
if($searchByName != ''){
    $searchQuery .= " and (emp_name like '%".$searchByName."%' ) ";
}
if($searchByCity != ''){
    $searchQuery .= " and (city='".$searchByCity."') ";
}
if($searchByGender != ''){
    $searchQuery .= " and (gender='".$searchByGender."') ";
}
if($searchValue != ''){
    $searchQuery .= " and (emp_name like '%".$searchValue."%' or 
        email like '%".$searchValue."%' or 
        city like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$result = pg_query($con, "SELECT * FROM employee");
$totalRecords = pg_num_rows($result);


/* */
## Total number of records with filtering

$rows = pg_query($con, "SELECT * FROM employee WHERE 1=1 $searchQuery");

$totalRecordwithFilter = pg_num_rows($rows);

## Fetch records
$sql = "SELECT * FROM employee where 1=1 $searchQuery order by $columnName $columnSortOrder LIMIT $rowperpage OFFSET $row";



$result = pg_query($con, $sql);
$empRecords = pg_fetch_all($result);

$data = array();

while ($row = pg_fetch_assoc($result)) {

    $data[] = array(
            "id"=>$row['id'],
            "emp_name"=>$row['emp_name'],
            "email"=>$row['email'],
            "gender"=>$row['gender'],
            "salary"=>$row['salary'],
            "city"=>$row['city']
        );
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);