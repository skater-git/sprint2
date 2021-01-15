<?php 

 require 'conn.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
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
                    <div class="panel-heading">Projects</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_project.php">Add New Project</a></li>
                        <li class="list-group-item"><a href="project_list.php">View all Projects</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Project</div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <input required pattern=".*\S+.*" type="text" class="form-control input-sm" name="a_project" placeholder="Project" required 
                                onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-success" value="Add Project" name="p_add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['p_add'])){
            $a_project =$_POST['a_project'];

            $sql = "INSERT INTO projects (a_project) VALUES ('$a_project')";

            if(mysqli_query($conn,$sql)){
                header('Location: project_list.php');
            }else{
                echo "ERROR:" .$sql.mysqli_error($conn);
            }
        }
    
    ?>
  </body>
</html>