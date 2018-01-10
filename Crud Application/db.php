<?php
$db = new Mysqli;
$db ->connect('localhost','root','amit','CRUD',3306);
if(!$db)
{
    echo "Error Occured";
}
?>