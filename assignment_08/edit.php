<?php include('config.php'); ?>

<?php
$enrollment = $_GET['enrollment'];
?>


<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $branch = $_POST['branch'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    
    $sql = "UPDATE `Students` SET name='$name', age='$age', course = '$course',branch = '$branch',
    contact='$contact', email='$email' WHERE enrollment='$enrollment'";
    if(mysqli_query($conn, $sql)){
        header("Location:details.php");
    }
    else{
        echo 'failed'.mysqli_error($conn);
    }
}
else{
    $sql = "SELECT * FROM `Students` WHERE enrollment='$enrollment'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $age = $row['age'];
    $course = $row['course'];
    $branch = $row['branch'];
    $contact = $row['contact'];
    $email = $row['email'];
}
?>


<html>
<head><title>Update Data</title></head>

<body>
    <form action="edit.php?enrollment=<?php echo $enrollment; ?>" method="post">
      Name - <input name="name" type="text" value="<?php echo $name; ?>" placeholder="Enter Name"><br>
      Age - <input name="age" type="text" value="<?php echo $age; ?>" placeholder="Enter Age"><br>
      Course - <input name="course" type="text" value="<?php echo $course; ?>" placeholder="Enter Course"><br>
      Branch - <input name="branch" type="text" value="<?php echo $branch; ?>" placeholder="Enter Branch"><br>
      Contact - <input name="contact" type="text" value="<?php echo $contact; ?>" placeholder="Enter Contact"><br>
      EMail - <input name="email" type="email" value="<?php echo $email; ?>" placeholder="Enter E-Mail"><br>
      <input name="submit" type="submit" value="Update">
    </form>
</body>
</html>
