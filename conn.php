<?php
class connect

{
    private $con;
    private $servername="localhost";
    private $username="root";
    private $password="";
    private $databse="book";
    public function conection()
    {
      return   $this->con=mysqli_connect($this->servername,$this->username,$this->password,$this->databse);
    }

}




?>