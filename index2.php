<?php
//-----------------------for get data in field--------------------------
$data;
include 'database.php';
if (isset($_REQUEST['id'])) {
    $data = $_REQUEST['id'];
}
//---------------------------------for update----------------------------
if (isset($_REQUEST['update'])) {
    update();
}
    function update(){
    include 'database.php';
    $name = htmlspecialchars(str_replace("'", "\'", $_POST['sname']));
    $roll = htmlspecialchars($_POST['roll']);
    $fname = htmlspecialchars(str_replace("'", "\'", $_POST['sname']));
    $sclass = htmlspecialchars($_POST['class']);
    $fee = htmlspecialchars($_POST['fee']);
    $remark = (htmlspecialchars($_POST['remark']));
    $active = $_POST['active'];
    $sql = "update  studentdata set `roll`='$roll', `sname`='$name', `fname`='$fname', `sclass`='$sclass', `fee`'$fee', `remark`'$remark', `active`='$active' ";
    if ($conn->query($sql)) {
        echo '<script>swal("Done", "Data Updated", "success");</script>';
    } else {
        echo '<script>swal("Oooops!", "Data Not Updated", "😶");</script>';
    }
}
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
    <title>Registration</title>
</head>

<body>

    <?php
    if (isset($data)) {
        $sql = "select * from studentdata where roll='$data'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
    ?>
                <center>
                    <div class="container">
                        <div class="main">
                            <center>
                                <form action="" method="post">
                                    <h1>Update Form</h1>
                                    <center>
                                        <table>
                                            <tr>
                                                <td>
                                                    <label for="roll">Roll No.:</label>
                                                </td>
                                                <td>
                                                    <input class="inputbox" type="text" placeholder="Enter Roll" value="<?php echo $row['roll'] ?>" name="roll" max="4" id="roll" readonly>
                                                    <br><span id="rollmsg"></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="sname">Student Name:</label>
                                                </td>
                                                <td>
                                                    <input class="inputbox" type="text" placeholder="Enter Student Name" value="<?php echo $row['sname'] ?>" name="sname" id="sname">
                                                    <br><span id="snamemsg"></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="fname">Father's Name:</label>
                                                </td>
                                                <td>
                                                    <input class="inputbox" type="text" placeholder="Enter Father's Name" id="fname" value="<?php echo $row['fname'] ?>" name="fname">
                                                    <br><span id="fnamemsg"></span>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="class">Class:</label>
                                                </td>
                                                <td>
                                                    <select name="class" id="class" value="2" class="selectbox">
                                                        <option>Select</option>
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
                                                    <input type="text" class="inputbox" placeholder="Enter Fee" value="<?php echo $row['fee'] ?>" name="fee" id="fee">
                                                    <br><span id="feemsg"></span>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="remark">Remark:</label>
                                                </td>
                                                <td>
                                                    <textarea name="remark" cols="25" rows="3" id="remark" value="<?php echo $row['remark']
                                                                                                                    ?>"></textarea>
                                                    <br><span id="remarkmsg"></span>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="active">Active:</label>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($row['active'] == 'yes') {
                                                    ?>
                                                        <input type="radio" name="active" value="yes" checked>
                                                        <label>Yes</label>
                                                        <input type="radio" name="active" value="no">
                                                        <label>No</label>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input type="radio" name="active" value="yes">
                                                        <label>Yes</label>
                                                        <input type="radio" name="active" value="no" checked>
                                                        <label>No</label>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </center>
                                    <center><button type="submit" name="update" id="update">Update</button></center>
                                    <span id="submiterr"></span>
                                </form>
                            </center>
                        </div>
                    </div>
                </center>
                <!-- ------------------------------------------------------------------
    ----------------------------------------------------------------- -->
        <?php }
        }
    } else {
        ?>
        <center>
            <div class="container">
                <div class="main">
                    <center>
                        <form action="./save.php" method="post">
                            <h1>Registration Form</h1>
                            <center>
                                <table>
                                    <tr>
                                        <td>
                                            <label for="roll">Roll No.:</label>
                                        </td>
                                        <td>
                                            <input class="inputbox" type="text" placeholder="Enter Roll" name="roll" max="4" id="roll">
                                            <br><span id="rollmsg"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="sname">Student Name:</label>
                                        </td>
                                        <td>
                                            <input class="inputbox" type="text" placeholder="Enter Student Name" name="sname" id="sname">
                                            <br><span id="snamemsg"></span>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="fname">Father's Name:</label>
                                        </td>
                                        <td>
                                            <input class="inputbox" type="text" placeholder="Enter Father's Name" id="fname" name="fname">
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
                                            <input type="text" class="inputbox" placeholder="Enter Fee" name="fee" id="fee">
                                            <br><span id="feemsg"></span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="remark">Remark:</label>
                                        </td>
                                        <td>
                                            <textarea name="remark" cols="25" rows="3" id="remark"></textarea>
                                            <br><span id="remarkmsg"></span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="active">Active:</label>
                                        </td>
                                        <td>
                                            <input type="radio" name="active" value="yes" checked>
                                            <label>Yes</label>
                                            <input type="radio" name="active" value="no">
                                            <label>No</label>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                            <center><button type="submit" id="submit">Save</button></center>
                            <span id="submiterr"></span>
                        </form>
                    </center>
                </div>
            </div>
        </center>
    <?php
    }
    ?>
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
        // if ($('#roll').val() == "" || $('#sname').val() == "" || $('fname').val() == "" || $('#class').val() == "" || $('#fee').val() == "" || $('#remark').val() == "") {
        //     $('#submit').prop('disabled', true);
        //     $('#update').prop('disabled', true);
        //     $('#submiterr').text("Please Fill All The Fields*");
        // } else {
        //     $('#submit').prop('disabled', false);
        //     $('#update').prop('disabled', false);
        //     $('#submiterr').text("");
        // }
        // if ($('#roll').val() == "") {
        //     $('#submit').prop('disabled', true);
        //     $('#submiterr').text("Please Fill All The Fields*");
        // } else {
        //     $('#submit').prop('disabled', false);
        //     $('#submiterr').text("");
        // }

        $('#sname').click(function(e) {
            //alert($('#roll').val());

            if ($('#roll').val() == "") {
                $('#rollmsg').text("Field can't be blank*");
                $('#roll').focus();
                $('#submit').prop('disabled', true);
                $('#submiterr').text("Please Fill All The Fields*");
            } else if (isNaN($('#roll').val())) {
                console.log(isNaN($('#roll').val()));
                $('#rollmsg').text("Only Number Allowed");
                $('#submit').prop('disabled', true);
                $('#submiterr').text("Please Fill All The Fields*");
            } else {
                $('#submit').prop('disabled', false);
                $('#submiterr').text("");
                $('#rollmsg').text(" ");
            }
        });

        $('#fname').click(function(e) {
            //alert($('#roll').val());
            if ($('#sname').val() == "") {
                $('#submit').prop('disabled', true);
                $('#submiterr').text("Please Fill All The Fields*");;
                $($('#snamemsg')).text("Field can't be blank*");
                $('#snamemsg').focus();
            } else if (isNaN($('#sname').val())) {
                console.log(isNaN($('#sname').val()));
                $($('#snamemsg')).text("");
                $('#submit').prop('disabled', false);;
            } else {
                $('#submit').prop('disabled', true);
                $('#submiterr').text("Please Fill All The Fields*");;
                $($('#snamemsg')).text("Only Character Allowed");
            }
        });

        $('#class').click(function(e) {

            //alert($('#roll').val());
            if ($('#fname').val() == "") {
                $('#submit').prop('disabled', true);
                $('#submiterr').text("Please Fill All The Fields*");
                $($('#fnamemsg')).text("Field can't be blank*");
                $($('#fnamemsg')).focus();
            } else if (isNaN($('#fname').val())) {
                $('#submit').prop('disabled', false);
                $('#submiterr').text("");
                //console.log(isNaN($('#fname').val()));
                $('#fnamemsg').text("");
            } else {
                $('#submit').prop('disabled', true);
                $('#submiterr').text("Please Fill All The Fields*");
                $('#fnamemsg').text("Only Character Allowed");
            }
        });

        $($('#fee')).click(function() {
            console.log($('#class').val());
            if ($('#class').val() == "") {
                $('#classmsg').text("Class Not Selected");
                $('#submit').prop('disabled', true);
                $('#submiterr').text("Please Fill All The Fields*");;
            } else {
                $('#submit').prop('disabled', false);;
                $('#classmsg').text(" ");
            }
        });

        $('#remark').click(function(e) {
            //alert($('#roll').val());
            if ($('#fee').val() == "") {
                $('#feemsg').text("Field can't be blank*");
                $('#feemsg').focus();
            } else if (isNaN($('#fee').val())) {
                $('#submit').prop('disabled', true);
                $('#submiterr').text("Please Fill All The Fields*");;
                console.log(isNaN($('#fee').val()));
                $('#feemsg').text("Only Number Allowed");
            } else {
                $('#submit').prop('disabled', false);;
                $('#feemsg').text(" ");
            }
        });
    });


    //on the time of submit-------------------------------------------
    // $(document).ready(function(e){

    //     $('#submit').click(function(e)
    //     {

    //         if($('#roll').val()=="")
    //         {
    //             $('#rollmsg').text("Field can't be blank*");
    //             $('#rollmsg').focus();
    //         }else if (isNaN($('#roll').val())) {
    //             console.log(isNaN($('#roll').val()));
    //             $('#rollmsg').text("Only Number Allowed");
    //         } 
    //         else
    //          {
    //             $('#rollmsg').text(" ");
    //         }


    //         if($('#sname').val()=="")
    //         {
    //             $('#snamemsg').text("Field can't be blank*");
    //             $('#snamemsg').focus();
    //         }else if (isNaN($('#sname').val())) {
    //             console.log(isNaN($('#sname').val()));
    //             $('#snamemsg').text(" ");
    //                     } else {
    //             $('#snamemsg').text("Only Character Allowed");
    //                     }

    //         if($('#fname').val()=="")
    //         {
    //             $('#fnamemsg').text("Field can't be blank*");
    //             $('#fnamemsg').focus();
    //         }
    //         else if (isNaN($('#fname').val())) 
    //         {
    //             console.log(isNaN($('#fname').val()));
    //             $('#fnamemsg').text(" ");
    //                     } else {
    //             $('#fnamemsg').text("Only Character Allowed");
    //                     }


    //          if($('#class').val()=="")
    //         {
    //             $('#classmsg').text("Class Not Seleced");
    //             $('#classmsg').focus();
    //         }else{
    //             $('#classmsg').text("");
    //         }


    //         if($('#fee').val()=="")
    //         {
    //             $('#feemsg').text("Field can't be blank*");
    //             $('#feemsg').focus();
    //         }else if (isNaN($('#fee').val())) {
    //             console.log(isNaN($('#fee').val()));
    //             $('#feemsg').text("Only Number Allowed");
    //                     } else {
    //             $('#feemsg').text(" ");
    //                     }
    //                     e.preventDefault;  
    //     });
    // });
</script>

</html>