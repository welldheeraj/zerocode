<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    include 'database.php';
    //------------------------request from input------------------------
    if (isset($_REQUEST['update'])) {
        updatedata();
    } else if (isset($_REQUEST['save'])) {
        insertdata();
    } else if (isset($_REQUEST['did'])) {
        deletedata();
    } else {
        header('location:index.php');
    }

    //----------------------for update---------------------------------
    function updatedata()
    {
        echo "updating";
        include 'database.php';
        if (isset($_SESSION['id'])) {
             $data=$_SESSION['id'];
             echo $data;
      
        $name = htmlspecialchars(str_replace("'", "\'", $_POST['sname']));
        $roll = htmlspecialchars($_POST['roll']);
        $fname = htmlspecialchars(str_replace("'", "\'", $_POST['sname']));
        $sclass = htmlspecialchars($_POST['class']);
        $fee = htmlspecialchars($_POST['fee']);
        $remark = (htmlspecialchars($_POST['remark']));
        $active = $_POST['active'];
        $sql = "update  studentdata set roll='$roll', sname='$name', fname='$fname', sclass='$sclass', fee='$fee', remark='$remark', active='$active' where roll=$data ";
        if ($conn->query($sql)) {
            echo '<script>swal("Done", "Data Updated", "success");</script>';
        } else {
            echo '<script>swal("Oooops!", "Data Not Updated", "😶");</script>';
        }
    }}
    //------------------for insert data-------------------------
    function insertdata()
    {
        include 'database.php';
        // echo "inserting";
        $name = htmlspecialchars(str_replace("'", "\'", $_POST['sname']));
        $roll = htmlspecialchars($_POST['roll']);
        $fname = htmlspecialchars($_POST['fname']);
        $sclass = htmlspecialchars($_POST['class']);
        $fee = htmlspecialchars($_POST['fee']);
        $remark = (htmlspecialchars($_POST['remark']));
        $active = $_POST['active'];

        $sql = "INSERT INTO `studentdata` (`roll`, `sname`, `fname`, `sclass`, `fee`, `remark`, `active`) VALUES ('$roll', '$name', '$fname', '$sclass', '$fee', '$remark', '$active')";
        if ($conn->query($sql)) {
            echo '<script>if(confirm("Data Inserted successfully"))
            {window.location.href="showdata.php";}
            ;</script>';
            //header('Location:showdata.php');

            // sleep(3);
            // header('Location:showdata.php');
        } else {
            echo '<script>swal("Oooops!", "Data Not Saved", "😶");</script>';
            // sleep(3);
            // header('Location:index.php');
        }
    }

    //-------------------for delete data----------------------------
    function deletedata()
    {
        include 'database.php';
        $data = $_REQUEST['did'];
        if ($conn->query("delete  from studentdata where roll=$data")) {
            echo '<script>if(confirm("Ok to delete"))
            {window.location.href="showdata.php";}
            ;</script>';
        } else {
            echo "<script>alert('data not deleted')</script>";
        }
    }




    //-------------------------------------------------------------
    //$name=str_replace("'","\''",$name2);
    //echo $roll." ".$name." ".$fname." ".$sclass." ".$fee." ".$remark." ".$active;
    // $sql="INSERT INTO `studentdata` (`roll`, `sname`, `fname`, `sclass`, `fee`, `remark`, `active`) VALUES (?,?,?,?,?,?,?)";
    // $statement=$conn->prepare($sql);
    // $statement->bind_param("issssss",$roll, $name, $fname, $sclass, $fee, $remark, $active);
    // $statement->execute();
    // if ($statement->affected_rows > 0) {
    //     echo "<script>alert('data inserted')</script>";
    //     header('Location:showdata.php');
    // } else {
    //     echo "<script>alert('data not inserted')</script>";
    // }
    ?>
</body>

</html>