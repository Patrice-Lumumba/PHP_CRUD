<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise A Jour des informations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
    

    <?php 
    session_start();
    include 'database.php';
    global $conn;
    

    $sql = "SELECT * FROM student";
    $result =$conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row['id'];
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      



    $connection = mysqli_connect("localhost", "root","");
    $db = mysqli_select_db($connection, 'phpcrud');
    
    $id = $_SESSION['id'];

    $query = "SELECT * FROM student WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);
  
    if ($query_run) 
    {
        while ($row = mysqli_fetch_array($query_run)) 
        {
            ?>
            <div class="container">
                <div class="jumbotron">
                    <h2>PHP - CRUD : Update Data </h2>
                    <hr>

                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                        <div class="form-group">
                            <label for=""> First Name </label>
                            <input type="text" name="fname" class="form-control"  value="<?php echo $row['fname'] ?>" placeholder="Enter First Name" required>
                        </div>
                        <div class="form-group">
                            <label for=""> Last Name </label>
                            <input type="text" name="lname" class="form-control"  value="<?php echo $row['lname'] ?>" placeholder="Enter Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for=""> Contact </label>
                            <input type="text" name="contact" class="form-control"  value="<?php echo $row['contact'] ?>" placeholder="Enter Contact" required>
                        </div>

                        <button class="btn btn-primary" type="submit" name="update"> Update Data </button>

                        <a href="index.php" class="btn btn-danger"> CANCEL</a>

                    </form>  

                    <?php 
                    
                        if(isset($_POST['update']))
                        {
                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $contact = $_POST['contact'];

                            $query = "UPDATE student SET fname = '$fname', lname = '$lname', contact = '$contact' WHERE id='$id' ";
                            $query_run = mysqli_query($connection, $query);

                            if ($query_run == false) 
                            {
                                echo '<script> alert("Data Updated");</script>';
                                header("Location: index.php");
                            }
                            else
                            {
                                echo '<script> alert("Data Not Updated");</script>';
                                
                            }
                        }
                    ?>
                </div>
            </div>

            
            <?php
        }
    }    
    else
       {
            echo '<script> alert("No Records Found");</script>';
       }
    ?>

</body>
</html>