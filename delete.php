<?php
include 'database.php';
$data=$_REQUEST['id'];
echo $data;
if($conn->query("delete  from studentdata where roll=$data"))
{
echo "<script>alert('data deleted')</script>";
header('Location:showdata.php');
}
else
{
    echo "<script>alert('data not deleted')</script>";
}
?>