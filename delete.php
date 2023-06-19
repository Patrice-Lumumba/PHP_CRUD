<?php  

$connection = mysqli_connect("localhost", "root","");
$db = mysqli_select_db($connection, 'phpcrud');


if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $query = "DELETE FROM student WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script>alert("Data Deleted");</script>';
        header("Location:index.php");
    }
    else
    {
        echo '<script>alert("Data Not Deleted");</script>';
        // header("Location:index.php");
    }
}
?>