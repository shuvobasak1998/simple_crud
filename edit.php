<?php 
  include("function.php");

  $objCrudAdmin= new crud_app();

  $std_data= $objCrudAdmin->student_info();

  if(isset($_GET["status"])){
    if($_GET["status"]='edit'){
        $id=$_GET['id'];
        $return_data=$objCrudAdmin->student_info_by_id($id);
    }
  }

  
  if(isset($_POST['edit_btn'])){
    $update_msg=$objCrudAdmin->update_data($_POST);
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
           if(isset($update_msg)) {echo $update_msg;}    
          ?>
            <input class="form-control mb-2" type="text" name="u_std_name" value="<?php echo $return_data['STD_NAME']; ?>">
            <input class="form-control mb-2" type="number" name="u_std_roll" value="<?php echo $return_data['STD_ROLL']; ?>">
            <label for="image">Uplod Your Image</label>
            <input class="form-control mb-2" type="file" name="u_std_img" >
            <input type="hidden" name="btn_id" value="<?php echo $return_data['ID']; ?>">
            <input class="form-control mb-2 bg-warning" type="submit" name="edit_btn" value="Update Data">
        </form>

     </div>
     











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>