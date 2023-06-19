


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>CRUD</title>


</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h2>PHP - CRUD : Display Data in PHP </h2>
            <hr>

    <div class="row">
        <a href="insertdata.php" class="btn btn-success" style="margin-left: 80%;">  DATA </a>
    </div>

    <br>


<?php 

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'phpcrud');

$query = "SELECT * FROM student";
$query_run = mysqli_query($connection, $query);
?>
<table class="table table-bordered" style="background-color: white;">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contact</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
    </thead>



<?php
    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>

                <tbody>
                    <tr>
                        <th> <?php echo $row['id']; ?> </th>
                        <th> <?php echo $row['fname']; ?> </th>
                        <th> <?php echo $row['lname']; ?> </th>
                        <th> <?php echo $row['contact']; ?> </th>

                    <form action="updatedata.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <th> <input type="submit" name="edit" class="btn btn-success" value="EDIT" /> </th>
                    </form>


                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <th> <input type="submit" name="delete" class="btn btn-danger" value="DELETE" /> </th>

                    </form>
                    </tr>
                </tbody>
            <?php
            // echo $row['id'];
            // echo $row['fname'];
            // echo $row['lname'];
            // echo $row['contact'];
        }
    }
    else{
        echo "No Records Found";
    }

?>
 
</table> 
        </div>
    </div>
</body>
</html>