<?php 

require 'conn.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Project</title>
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
                    <div class="panel-heading">Project</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_project.php">Add New Project</a></li>
                        <li class="list-group-item"><a href="project_list.php">View all Projects</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Project</div>
                    <form action="" method="POST">
                        <?php 
                          $id=$_GET['p_id'];
                          $sql = "SELECT * FROM projects WHERE p_id =('$id')";
                          $result = mysqli_query($conn,$sql);

                          if(mysqli_num_rows($result) > 0 ){
                            while($star = mysqli_fetch_assoc($result)){?>
                            <div class="form-group">
                                <input required pattern=".*\S+.*" type="text" class="form-control input-sm" name="a_project" value = "<?php echo $star['a_project'];?>"
                                 required onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-success" value="Update Project" name="p_update">
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
                if(isset($_POST['p_update'])){
                    $a_project = $_POST['a_project'];
                    

                    $sql = "UPDATE projects SET a_project ='$a_project' WHERE p_id='$id'";

                    if(mysqli_query($conn,$sql)){
                        header('Location:project_list.php');
                    }else{
                        echo "ERROR: ". $sql.mysqli_error($conn);
                    }
                }
            
            ?>
  </body>
</html>