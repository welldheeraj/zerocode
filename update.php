<?php
include 'database.php';
$data = $_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Update</title>
</head>

<body>
    <center>
        <div class="container">
            <div class="main">

                <center>
                    <form action="./save.php" method="post">
                        <h1>Update Form</h1>
                        <center>

                            <table>
                                <?php
                                $sql = "select * from studentdata where roll='$data'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td>
                                                <label for="roll">Roll No.:</label>
                                            </td>
                                            <td>
                                                <input class="inputbox" type="text" placeholder="Enter Roll" value="<?php echo $row['roll'] ?>" name="roll" max="4" id="roll">
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
                                                <select name="class" id="class" value="13th" class="selectbox">
                                                    <option >Select</option>
                                                    <option >1st</option>
                                                    <option >2nd</option>
                                                    <option >3rd</option>
                                                    <option >4th</option>
                                                    <option >5th</option>
                                                    <option >6th</option>
                                                    <option >7th</option>
                                                    <option >8th</option>
                                                    <option >9th</option>
                                                    <option >10th</option>
                                                    <option >11th</option>
                                                    <option >12th</option>
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
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </center>
                        <center><button type="submit" id="update">Update</button></center>
                        <span id="submiterr"></span>
                    </form>
                </center>
            </div>
        </div>
        <div>
        </div>
    </center>
    <hr>
    <a href="showdata.php" class="btn btn-primary">Show Data</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="js/form.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>