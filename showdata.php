<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Data</title>
</head>

<body>
    <center>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Roll</th>
                    <th scope="col">Name</th>
                    <th scope="col">Father</th>
                    <th scope="col">Class</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                    <th scope="col">
                        <a href="index.php"><i class="fa fa-plus" style="font-size: 30px;"></i></a>
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                $read = "select * from studentdata";
                $result = $conn->query($read);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr class="text-center">
                            <td><?php echo $row['roll'] ?></td>
                            <td><?php echo $row['sname'] ?></td>
                            <td><?php echo $row['fname'] ?></td>
                            <td><?php echo $row['sclass'] ?></td>
                            <td><?php echo $row['fee'] ?></td>
                            <td><?php echo $row['remark'] ?></td>
                            <td><?php echo $row['active'] ?></td>
                            <div>
                                <td>
                                    <a href="operation.php?did=<?php echo $row['roll'] ?>"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;
                                    <a href="index.php?id=<?php echo $row['roll'] ?>"><i class="fa fa-edit"></i></a>
                                </td>
                            </div>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </center>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>