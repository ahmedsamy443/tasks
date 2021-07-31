<?php

class opertions
{
   private $dbcon;
    public function adddata($table,$params=array())
    {
     $table_colums=implode(",",array_keys($params));
       // echo $table_colums;
        $table_value = implode("','",$params);
        echo $table_value;
       
        $selectquery="insert into $table($table_colums) values ('$table_value')";
       // var_dump($selectquery);
        //echo $selectquery;
        $con=mysqli_connect("localhost","root","","book");
        $dp = mysqli_query($con,$selectquery);
        if($dp )
        {
           echo"user has benn ucssed";
        }
        else
        {
            echo"user didnt added";
        }
   
    }
    
    
}


?>