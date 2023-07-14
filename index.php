<?php 
  include("function.php");

  $objCrudAdmin= new crud_app();

  if(isset($_POST["submit"])){
    $return_msg = $objCrudAdmin->add_info($_POST);

  }

  $std_data= $objCrudAdmin->student_info();

  if(isset($_GET["status"])){
    if($_GET["status"]='delet'){
        $id=$_GET['id'];
        $delete_msg=$objCrudAdmin->delet_data($id);
    }
  }





?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
     
     <div class="container my-4 p-4 shadow">
        <h2> <a style="text-decoration: none;" href="index.php">STUDENT INFORMATION</a></h2>
        <form class="form" action="" method="post" enctype="multipart/form-data">
          <?php 
           if(isset($return_msg )) {echo $return_msg;}    
           if(isset($delete_msg )) {echo $delete_msg;}  
          ?>
            <input class="form-control mb-2" type="text" name="std_name" placeholder="Enter Your Name">
            <input class="form-control mb-2" type="number" name="std_roll" placeholder="Enter Your Roll">
            <label for="image">Uplod Your Image</label>
            <input class="form-control mb-2" type="file" name="std_img" >
            <input class="form-control mb-2 bg-warning" type="submit" name="submit" value="Submit Data">
        </form>

     </div>
     <div class="container my-4 p-4 shadow">
       <table class="table table-responsive">
           <thead>
             <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Roll</th>
               <th>Image</th>
               <th>Function</th>
             </tr>
           </thead>
           <tbody>
            <?php while($student=mysqli_fetch_assoc($std_data)){?>
            <tr>
               <td><?php echo $student['ID']?></td>
               <td><?php echo $student['STD_NAME']?></td>
               <td><?php echo $student['STD_ROLL']?></td>
               <td><img style="width:100px" src="IMAGE/<?php echo $student['STD_IMAGE']?>"></td>
               <td>
                  <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $student['ID']?>">Edit</a>
                  <a class="btn btn-warning" href="?status=delet&&id=<?php echo $student['ID']?>">Delet</a>
               </td>
            </tr>
            <?php }?>
           </tbody>
       </table>


     </div>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>