<?php 

 require 'conn.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Management System</title>
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
                    <div class="panel-heading">Star List</div>
                    <table class="table table-bordered">
                    <thead class="star_list">
                        <tr>
                            <th>Number</th>
                            <th>Star</th>
                            <th colspan="2">Actions</th>
                            
                        </tr>
                        </thead>
                        <?php 
                          
                          $sql = "SELECT * FROM stars";
                          $result = mysqli_query($conn,$sql);

                          if(mysqli_num_rows($result) > 0 ){
                            while($star = mysqli_fetch_assoc($result)){?>
                            <tbody class="star_list">
                            <tr>
                            <td><?php echo $star['s_id']; ?></td>
                            <td><?php echo $star['s_name']; ?></td>
                            <td><a href="edit_star.php?s_id=<?php echo $star['s_id']; ?>" class="btn btn-sm btn-warning">Edit Name</a></td>
                            <td><a href="delete_star.php?s_id=<?php echo $star['s_id']; ?>" class="btn btn-sm btn-danger" >Delete</a></td>             
                            </tr>
                            
                            </tbody>
                           <?php 
                            
                        }
                    } else {
                          echo " 0 result";
                      }
                         
                        
                        ?>
                        </table>

                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Star</th>
                            <th>Project</th>
                        </tr>
                        </thead>
                <?php
                             $sql_star = "SELECT group_concat(s_name SEPARATOR ', '), a_project
                              FROM projects 
                              JOIN stars
                              ON projects.p_id = stars.project_id
                              GROUP BY a_project";
                                $results = $conn->query($sql_star);

                                if (mysqli_num_rows($results) > 0) { 
                                    while ($row = $results->fetch_assoc()) {?>
                                        <tbody>
                                        <tr>
                                        <?php
                                        for ($i = 0; $i < count($row); $i++) {
                                         
                                            echo '<td>';
                                            echo $row[array_keys($row)[$i]];
                                           
                                           }
                                         echo '</td>';
                                         
                                        ?>
                                        </tr>
                            
                                        </tbody>
                                        <?php 
                                       }
                                    }
                                    ?>
                                </table>  
            </div>
        </div>
    </div>
  </body>
</html>