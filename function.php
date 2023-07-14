<?php 
  class crud_app{
    private $conn;
    public function __construct(){
        $db_host='localhost';
        $db_user='root';
        $db_pass='';
        $db_name='crudapp';

        $this->conn = mysqli_connect( $db_host,$db_user,$db_pass,$db_name);

        if(!$this->conn){
            die("database connection error!!");

        }

      
    }

    public function add_info($data){
        $std_name=$data["std_name"];
        $std_roll=$data["std_roll"];
        $std_img=$_FILES["std_img"]["name"];
        $tmp_name=$_FILES["std_img"]["tmp_name"];

        $query="INSERT INTO crud_table(STD_NAME,STD_ROLL,STD_IMAGE) VALUES ('$std_name',$std_roll,'$std_img')";

        if(mysqli_query($this->conn,$query)){
            move_uploaded_file($tmp_name,'IMAGE/'.$std_img);
            return "Information Added Successfully";
        }

    }
    public function student_info(){
       $query="SELECT * FROM crud_table";
       if(mysqli_query($this->conn,$query)){
        $data=mysqli_query($this->conn,$query);
        return $data;
       }

    }

    public function student_info_by_id($id){
        $query="SELECT * FROM crud_table WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
         $data=mysqli_query($this->conn,$query);
         $u_data=mysqli_fetch_assoc($data);
         return $u_data;
        }
 
     }

    public function update_data($data){
        $u_std_name=$data['u_std_name'];
        $u_std_roll=$data['u_std_roll'];
        $u_id_no=$data['btn_id'];
        $u_std_img=$_FILES['u_std_img']['name'];
        $u_temp_name=$_FILES['u_std_img']['tmp_name'];

        $query="UPDATE crud_table SET STD_NAME='$u_std_name',STD_ROLL=$u_std_roll,STD_IMAGE='$u_std_img' WHERE id=$u_id_no";

        if(mysqli_query($this->conn,$query)){
          move_uploaded_file($u_temp_name,'IMAGE/'.$u_std_img);
          return 'Information Updated Sucessfully!!';
        }
    }


    public function delet_data($id){
        $query="DELETE FROM crud_table WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
         return "Delete data sucessfully..!!";
        }

  


}

  }
?>