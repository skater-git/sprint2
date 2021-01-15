<?php 

 require 'conn.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Star To Project</title>
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
                    <div class="panel-heading">Choose Star To Add To Project</div>
                    <form action="" method="POST">
                        <?php 
                        
                          $sql = "SELECT * FROM stars ";
                          $result = mysqli_query($conn,$sql);

                          if(mysqli_num_rows($result) > 0 ){
                            while($star = mysqli_fetch_assoc($result)){?>
                            <div class="form-group">
                            <input id="star" type="radio" class="form-control input-sm" name="radio" value = "<?php echo $star['s_id'] ?>" checked required > <?php echo $star['s_id'] ?>
                            <label for="star"><?php echo $star['s_name']?></label><br>
                             
                            </div>
                           
                       <?php
                           }
                         } else {
                               echo " 0 result";
                           }
                        
                              
                        ?>
                        <div class="form-group">
                           <input type="submit" class="btn btn-sm btn-success" value="Add Star To Project" name="submit">
                       </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    $id=$_GET['p_id'];
         if(isset($_POST['submit'])){
            if(isset($_POST['radio']))
            {
             $s_id =$_POST['radio'];
           

             $sql = "UPDATE stars SET project_id ='$id' WHERE s_id='$s_id'";
            

             if(mysqli_query($conn,$sql) ){
                ?>

                <script>
                alert("Star added successfully!");
                </script>
                
                <?php
            }
                
             }
        
            }
            ?>

  </body>
</html>