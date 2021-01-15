<?php 

 require 'conn.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project List</title>
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
                    <div class="panel-heading">Dashboard</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_new_star.php">Add New Star</a></li>
                        <li class="list-group-item"><a href="index.php">View all Stars</a></li>
                        <li class="list-group-item"><a href="add_project.php">Add New Project</a></li>
                        <li class="list-group-item"><a href="project_list.php">View all Projects</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Project List</div>
                    <table class="table table-bordered">
                    <thead class="star_list">
                        <tr>
                            <th>Number</th>
                            <th>Project</th>
                            <th colspan="3">Actions</th>
                            
                        </tr>
                        </thead>
                        <?php 
                          $sql = "SELECT * FROM projects";
                          $result = mysqli_query($conn,$sql);

                          if(mysqli_num_rows($result) > 0 ){
                            while($projects= mysqli_fetch_assoc($result)){?>
                            <tbody class="project_list">
                            <tr>
                            <td><?php echo $projects['p_id'] + 100; ?></td>
                            <td><?php echo $projects['a_project']; ?></td>
                            <td><a href="edit_project.php?p_id=<?php  echo $projects['p_id']; ?>" class="btn btn-sm btn btn-block btn-warning">Edit Name</a></td>
                            <td><a href="delete_project.php?p_id=<?php  echo $projects['p_id']; ?>" class="btn btn-sm btn btn-block btn-danger">Delete</a></td>
                            <td><a href="add_star.php?p_id=<?php echo $projects['p_id']; ?>" class="btn btn-sm btn-warning" style=" background-color:orange">Add Star To This Project</a></td>
                            </tr>
                            </tbody>
                            
                           <?php 
                             }
                            } else {
                                  echo " 0 result";
                              }
                    
                        ?>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>