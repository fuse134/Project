<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FCEA</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="container">
        <h2><div class="page-header"><b>FCEA</b></div></h2>
    

   
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success">
            <div class="success">
                <h6>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h6>
            </div></div>
        <?php endif ?>
    
        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <p>Admin <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
    
   </div>
   </div>
        
    <div class="d-grid gap-2 col-6 mx-auto align-items-center">
  <button class="btn btn-primary" type="button"><a href="user_type.php">จัดการสมาชิก</a></button>
  <button class="btn btn-primary" type="button"><a href="item.php">จัดการข้อมูลครุภัณฑ์</a></button>
  <button class="btn btn-primary" type="button">รายงานครุภัณฑ์</button>
  <button class="btn btn-primary" type="button">สถานะครุภัณฑ์</button>

</div>
       
  
    


</body>
</html>