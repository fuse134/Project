<?php 
    require_once('connection.php');

    if (isset($_REQUEST['btn_insert'])) {
        $firstname = $_REQUEST['txt_Equipment_ID'];
        $lastname = $_REQUEST['txt_Equipment_name'];
        $firstname = $_REQUEST['txt_Beacon_code'];
        $lastname = $_REQUEST['txt_QR_ID'];

        if (empty($Equipment_ID)) {
            $errorMsg = "Please enter Equipment_ID";
        } else if (empty($Equipment_name)) {
            $errorMsg = "please Enter Equipment_name";
        } else if (empty($Beacon_code)) {
            $errorMsg = "please Enter Beacon_code";
        } else if (empty($QR_ID)) {
            $errorMsg = "please Enter QR_ID";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO equipment(Equipment_ID, Equipment_name, Beacon_code, QR_ID) VALUES (:Equipment_ID, :Equipment_name, :Beacon_code, :QR_ID)");
                    $insert_stmt->bindParam(':Equipment_ID', $Equipment_ID);
                    $insert_stmt->bindParam(':Equipment_name', $Equipment_name);
                    $insert_stmt->bindParam(':Beacon_code', $Beacon_code);
                    $insert_stmt->bindParam(':QR_ID', $QR_ID);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "Insert Successfully...";
                        header("refresh:2;index.php");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
    <div class="display-3 text-center">เพิ่มข้อมูลครุภัณฑ์</div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $insertMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="Equipment_ID" class="col-sm-3 control-label">Equipment_ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_Equipment_ID" class="form-control" placeholder="Enter Equipment_ID...">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="Equipment_name" class="col-sm-3 control-label">Equipment_name</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_Equipment_name" class="form-control" placeholder="Enter Equipment_name...">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="Beacon_code" class="col-sm-3 control-label">Beacon_code</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_Beacon_code" class="form-control" placeholder="Enter Beacon_code...">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="QR_ID" class="col-sm-3 control-label">QR_ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_QR_ID" class="form-control" placeholder="Enter QR_ID...">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>