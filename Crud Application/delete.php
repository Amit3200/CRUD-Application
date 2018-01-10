<?php
include 'db.php';
$id =(int)$_GET['id'];
$sql="delete from tasks where id = '$id'";
if($db->query($sql))
{
header('location: CrudHome.php');
}
?>