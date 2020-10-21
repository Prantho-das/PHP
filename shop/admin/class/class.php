<?php
class database{
    public function __construct(){
        $this->link =mysqli_connect('localhost','root','','p-commerce') or die("error is:".mysqli_error($this->link)); 
    }
     //login method
    public function login($email,$pass){
       $logq= "SELECT * FROM `user` WHERE email='$email' AND password= '$pass'";
       $login = mysqli_query($this->link,$logq);
       $num =mysqli_num_rows($login);
       if($num == 1){
         setcookie('name', $email, time() + 86400 * 7);
         $_SESSION['id'] = $email;
         header('location:index.php?welcome');
       }
       else{
         header('location:login.php?passwordincorrect');
       }
    }
   public function customer($email,$pass)
   {
      $logq = "SELECT * FROM `customer` WHERE email='$email' AND password='$pass'";
      $loginn = mysqli_query($this->link, $logq);
      while ($roww = mysqli_fetch_assoc($loginn)) {
         $cid=$roww['id'];
      }
      $numm = mysqli_num_rows($loginn);
      if ($numm == 1) {
         setcookie('eml',$email, time() + 86400 * 7);
         setcookie('cid',$cid, time() + 86400 * 7);
         header("location:products.php");
      } else {
         header("location:login.php");
      }
   }
   // public function customer($email,$pass)
   // {
   //    $logq = "SELECT * FROM `customer` WHERE email='$email' AND password= '$pass'";
   //    $login = mysqli_query($this->link, $logq);
   //    while ($row = mysqli_fetch_assoc($login)) {
   //       $cid=$row['id'];
   //    }
   //    $num = mysqli_num_rows($login);
   //    if ($num == 1) {
   //       setcookie('eml', $email, time() + 86400 * 2);
   //       setcookie('cid', $cid, time() + 86400 * 2);
      
   //       echo "<script>window.location.href='cart.php'</script>";
         
   //    } else {
   //       // header('location:login.php?passwordincorrect');
   //       echo "<script>window.location.href='cart.php'</script>";
   //    }
   // }
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