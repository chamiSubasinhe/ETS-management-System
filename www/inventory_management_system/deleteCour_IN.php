<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM courierdetails WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location:AddCour_IN.php");
}