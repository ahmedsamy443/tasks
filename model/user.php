<?php
class userssss
{
    private $id;
    private $fname;
    private $lname;
    private $email;
    private $password;
    public $error =array();
    public function getfname()
    {

        return $this->fname;
    }

    public function setfname($_fname)
    {
        if (strlen($_fname) > 3) {
            $this->fname = $_fname;
        } else {
            array_push($this->error,"wrong fname");
            $_SESSION['errorfname']="please  enter a vaild name";

            
        }
    }
    public function getlname()
    {

        return $this->lname;
    }

    public function setlname($_lname)
    {
        if (strlen($_lname) > 3) {
            $this->lname = $_lname;
        } else {
            array_push($this->error,"wrong lname");
            $_SESSION['errorlname']="please  enter a vaild name";

        }
    }

    public function setemail($_email)
    {
        $re = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";

        if (preg_match($re, $_email)) {
            $this->email = $_email;
        } else {
            array_push($this->error,"wrong email");
            $_SESSION['emailerror']="please  enter a vaild email";

        }
    }
    public function getemail()
    {
        return $this->email;
    }

    public function setpassword($pass)
    {
        $number = preg_match('@[0-9]@', $pass);
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $specialChars = preg_match('@[^\w]@', $pass);
        if (strlen($pass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            array_push($this->error,"wrong passord");
            $_SESSION['passerror']="Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            
        } else {
       //     password_hash($pass, PASSWORD_DEFAULT);
            $this->password = $pass;
        }
    }
    public function getpassword()
    {
        return $this->password;
    }
        

        public function checkvalid()
        {
                 return $this->error;
        }
       
        public function setconfirmpassword($pass)
        {
                if($this->password == $pass)
                {
                    echo"mathced pass";
                }
                else
                {
                    array_push($this->error,"password doesnt exists");
                   $_SESSION['confimr']="password dont mathch";
                }
        }
    }