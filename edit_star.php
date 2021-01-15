<?php 

 require 'conn.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Star</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div id="space">
   <div class="stars"></div>
   <div class="stars"></div>
   <div class="stars"></div>
   <div class="stars"></div>
   <div class="stars"></div>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Stars</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_new_star.php">Add New Star</a></li>
                        <li class="list-group-item"><a href="index.php">View all Stars</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Star</div>
                    <form action="" method="POST">
                        <?php 
                        $id = $_GET['s_id'];
                          $sql = "SELECT * FROM stars WHERE s_id =('$id')";
                          $result = mysqli_query($conn,$sql);

                          if(mysqli_num_rows($result) > 0 ){
                            while($star = mysqli_fetch_assoc($result)){?>
                            <div class="form-group">
                                <input required pattern=".*\S+.*" type="text" class="form-control input-sm" name="s_name" value = "<?php echo $star['s_name']?>"
                                 required onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-success" value="Update Star" name="s_update">
                            </div>

                           <?php }
                           }else{
                            echo " 0 result";
                           }
                             
                        ?>
                        </form>
                </div>
            </div>
        </div>
    </div>

            <?php 
                if(isset($_POST['s_update'])){
                    $s_name = $_POST['s_name'];
                    
                    
                    $sql = "UPDATE stars SET s_name ='$s_name' WHERE s_id='$id'";
               

                    if(mysqli_query($conn,$sql)){
                        header('Location:index.php');
                    }else{
                        echo "ERROR: ". $sql.mysqli_error($conn);
                    }
                }
            
            ?>
  </body>
</html>