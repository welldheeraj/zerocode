<?php
session_start();
//-----------------------for get data in field--------------------------
$data;
include 'database.php';
if (isset($_REQUEST['id'])) {
    $data = $_REQUEST['id'];
    $_SESSION['id']=$data;
    echo $_SESSION['id'];
}
//---------------------------------for update----------------------------

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Registration</title>
</head>

<body>
    <?php
    $roll;
    $sname;
    $fname;
    $sclass;
    $fee;
    $remark;
    $active;
    if (isset($data)) {
        $sql = "select * from studentdata where roll='$data'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $roll = $row['roll'];
                $sname = $row['sname'];
                $fname = $row['fname'];
                $sclass = $row['sclass'];
                $fee = $row['fee'];
                $remark = $row['remark'];
                $active = $row['active'];
            }
        }
    }
    ?>

    <center>
        <div class="container">
            <div class="main">
                <center>
                    <form action="./operation.php" method="post">
                        <?php
                        if (isset($data)) {
                            echo '<h1 id="heading">Update Form</h1>';
                        } else {
                            echo '<h1 id="heading">Registration Form</h1>';
                        }
                        ?>

                        <center>
                            <table>
                                <tr>
                                    <td>
                                        <label for="roll">Roll No.:</label>
                                    </td>
                                    <td>
                                        <input class="inputbox" type="text" placeholder="Enter Roll" name="roll" value="<?php if (isset($data)) {
                                                                                                                            echo $roll;
                                                                                                                        } ?>" max="4" id="roll">
                                        <br><span id="rollmsg"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="sname">Student Name:</label>
                                    </td>
                                    <td>
                                        <input class="inputbox" value="<?php if (isset($data)) {
                                                                            echo $sname;
                                                                        } ?>" type="text" placeholder="Enter Student Name" name="sname" id="sname">
                                        <br><span id="snamemsg"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="fname">Father's Name:</label>
                                    </td>
                                    <td>
                                        <input class="inputbox" type="text" placeholder="Enter Father's Name" id="fname" value="<?php if (isset($data)) {
                                                                                                                                    echo $fname;
                                                                                                                                } ?>" name="fname">
                                        <br><span id="fnamemsg"></span>
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <label for="class">Class:</label>
                                    </td>
                                    <td>
                                        <select name="class" id="class" class="selectbox">
                                            <option value="">Select</option>
                                            <option value="1">1st</option>
                                            <option value="2">2nd</option>
                                            <option value="3">3rd</option>
                                            <option value="4">4th</option>
                                            <option value="5">5th</option>
                                            <option value="6">6th</option>
                                            <option value="7">7th</option>
                                            <option value="8">8th</option>
                                            <option value="9">9th</option>
                                            <option value="10">10th</option>
                                            <option value="11">11th</option>
                                            <option value="12">12th</option>
                                        </select>
                                        <br><span id="classmsg"></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <label for="fee">Fees:</label>
                                    </td>
                                    <td>
                                        <input type="text" class="inputbox" placeholder="Enter Fee" value="<?php if (isset($data)) {
                                                                                                                echo $fee;
                                                                                                            } ?>" name="fee" id="fee">
                                        <br><span id="feemsg"></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <label for="remark">Remark:</label>
                                    </td>
                                    <td>
                                        <textarea name="remark" cols="25" rows="3" id="remark" 
                                                                                                       ><?php if (isset($data)){echo $remark;} ?></textarea>
                                        <br><span id="remarkmsg"></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <label for="active">Active:</label>
                                    </td>
                                    <td>
                                        <?php if (isset($data) && $active == "yes") { ?>
                                            <input type="radio" name="active" value="yes" checked>
                                            <label>Yes</label>
                                            <input type="radio" name="active" value="no">
                                            <label>No</label>
                                        <?php
                                        } else { ?>
                                            <input type="radio" name="active" value="yes">
                                            <label>Yes</label>
                                            <input type="radio" name="active" value="no" checked>
                                            <label>No</label>
                                        <?php
                                        } ?>
                                    </td>
                                </tr>
                            </table>
                        </center>
                        <?php if (isset($data)) {
                        ?>
                            <center><button type="submit" name="update" id="update">Update</button></center>
                            <span id="saveerr"></span>
                        <?php
                        } else {
                        ?>
                            <center><button type="submit" name="save" id="save">Save</button>
                            <?php } ?>
                            </center>
                            <span id="saveerr"></span>
                    </form>
                </center>
            </div>
        </div>
    </center>
    <hr>
    <a href="showdata.php" class="btn btn-primary">Show Data</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="js/form.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        //-----------------------------direct check for blank--------------------
        if ($('#roll').val() == "" || $('#sname').val() == "" || $('fname').val() == "" || $('#class').val() == "" || $('#fee').val() == "" || $('#remark').val() == "") {
            $('#save').prop('disabled', true);
            //$('#update').prop('disabled', true);
            $('#saveerr').text("Please Fill All The Fields*");
        } else {
            $('#save').prop('disabled', false);
            //$('#update').prop('disabled', false);
            $('#saveerr').text("");
        }
        if ($('#roll').val() == "") {
            $('#save').prop('disabled', true);
            $('#saveerr').text("Please Fill All The Fields*");
        } else {
            $('#save').prop('disabled', false);
            $('#saveerr').text("");
        }

        $('#sname').click(function(e) {
            //alert($('#roll').val());

            if ($('#roll').val() == "") {
                $('#rollmsg').text("Field can't be blank*");
                $('#roll').focus();
                $('#save').prop('disabled', true);
                $('#saveerr').text("Please Fill All The Fields*");
            } else if (isNaN($('#roll').val())) {
                console.log(isNaN($('#roll').val()));
                $('#rollmsg').text("Only Number Allowed");
                $('#save').prop('disabled', true);
                $('#saveerr').text("Please Fill All The Fields*");
            } else {
                $('#save').prop('disabled', false);
                $('#saveerr').text("");
                $('#rollmsg').text(" ");
            }
        });

        $('#fname').click(function(e) {
            //alert($('#roll').val());
            if ($('#sname').val() == "") {
                $('#save').prop('disabled', true);
                $('#saveerr').text("Please Fill All The Fields*");;
                $($('#snamemsg')).text("Field can't be blank*");
                $('#snamemsg').focus();
            } else if (isNaN($('#sname').val())) {
                console.log(isNaN($('#sname').val()));
                $($('#snamemsg')).text("");
                $('#save').prop('disabled', false);;
            } else {
                $('#save').prop('disabled', true);
                $('#saveerr').text("Please Fill All The Fields*");;
                $($('#snamemsg')).text("Only Character Allowed");
            }
        });

        $('#class').click(function(e) {

            //alert($('#roll').val());
            if ($('#fname').val() == "") {
                $('#save').prop('disabled', true);
                $('#saveerr').text("Please Fill All The Fields*");
                $($('#fnamemsg')).text("Field can't be blank*");
                $($('#fnamemsg')).focus();
            } else if (isNaN($('#fname').val())) {
                $('#save').prop('disabled', false);
                $('#saveerr').text("");
                //console.log(isNaN($('#fname').val()));
                $('#fnamemsg').text("");
            } else {
                $('#save').prop('disabled', true);
                $('#saveerr').text("Please Fill All The Fields*");
                $('#fnamemsg').text("Only Character Allowed");
            }
        });

        $($('#fee')).click(function() {
            console.log($('#class').val());
            if ($('#class').val() == "") {
                $('#classmsg').text("Class Not Selected");
                $('#save').prop('disabled', true);
                $('#saveerr').text("Please Fill All The Fields*");;
            } else {
                $('#save').prop('disabled', false);;
                $('#classmsg').text(" ");
            }
        });

        $('#remark').click(function(e) {
            //alert($('#roll').val());
            if ($('#fee').val() == "") {
                $('#feemsg').text("Field can't be blank*");
                $('#feemsg').focus();
            } else if (isNaN($('#fee').val())) {
                $('#save').prop('disabled', true);
                $('#saveerr').text("Please Fill All The Fields*");;
                console.log(isNaN($('#fee').val()));
                $('#feemsg').text("Only Number Allowed");
            } else {
                $('#save').prop('disabled', false);;
                $('#feemsg').text(" ");
            }
        });
    });
</script>

</html>