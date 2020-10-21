<?php
class database{
    public function __construct(){
        $this->link =mysqli_connect('localhost','root','','blog') or die("error is:".mysqli_error($this->link)); 
    }
     //select method
    public function login($data,$email){
       $login = mysqli_query($this->link,$data);
       $num=mysqli_num_rows($login);
       if($num == 1){
         header('location:index.php?welcome');
         setcookie('name',$email,time()+86400*7);
         session_start();
         $_SESSION['name']=$email;
       }
       else{
         header('location:login.php?passwordincorrect');
       }
    }
    //select method
    public function select($data){
       $sel = mysqli_query($this->link,$data);
       if($sel){
         return $sel;
       }
    }
    //insert method
    public function insert($data){
      $query = mysqli_query($this->link,$data);
      if($query == true){
         return $query;
          header('location:?datainserted');
       }
    }
    //delete method
    public function delete($data){
       $del = mysqli_query($this->link,$data);
       if($del){
          return $del;
       }
    }//update method
   public function update($up){
     $update = mysqli_query($this->link,$up);
      if($update){
         return $update;
         header('location:titleslogan.php?dataupdated');
      }
   }

}

// <?php if(isset($_COOKIE['name'])){
// header('location:index.php?alreadylogin');
// }else{?>
