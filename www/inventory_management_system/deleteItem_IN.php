<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM items WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location:AddItem_IN.php");
}