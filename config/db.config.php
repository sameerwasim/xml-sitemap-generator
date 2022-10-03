<?php

try {
  $conn = new PDO("mysql:host=".HOST.";dbname=".DB, USERNAME, PASS);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}


// function to fetch all records
function selectAll($conn, $columns, $table, $where = '', $join = '', $showQuery = false) {
  $query = "SELECT $columns FROM $table";
  $query .= !empty($join) ? " $join" : '';
  $query .= !empty($where) ? " WHERE $where" : '';
  if($showQuery) { echo $query; }
  $sql = $conn->prepare($query);
  $sql->execute();
  $result = $sql->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

?>
