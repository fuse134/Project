<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>How to Insert Form Data In Database using PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col-sm mx-1 border border-secondary p-2">
            <div class="text-primary">
                <h3>เพิ่มรายชื่อลูกค้า</h3>
            </div>           
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label>ชื่อ</label>
                    <input type="text" name="fname" class="form-control">
                </div>                        
                <div class="form-group">
                    <label>นามสกุล</label>
                    <input type="text" name="lname" class="form-control">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="save">
            </form>
        </div>
        <div class="col-sm mx-1 border border-secondary p-4">
            <div class="page-header">
                <h2>รายชื่อลูกค้า</h2>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <!-- <th scope="col">Email</th> -->
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php include 'fetch_data.php'; ?>
                <?php if ($result->num_rows > 0): ?>
                <?php $i= 1; ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $i;?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td>
                        <a href="<?php echo "view.php?id=".$array[0] ?>" class="btn btn-info">เรียกดู</a>
                        <a href="<?php echo "update_view.php?id=".$array[0] ?>" class="btn btn-warning">แก้ไข</a>
                        <a href="<?php echo "delete.php?id=".$array[0] ?>" class="btn btn-danger">ลบ</a>
                    </td>
                </tr>
                <?php $i++?>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">ไม่พบข้อมูล</td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
              </tbody>
            </table>
        </div>
    </div>       
</div>
</body>
</html> 