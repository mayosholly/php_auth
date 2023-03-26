<?php

class SignUpContr extends SignUp
{
    private $id;
    private $pwd;
    private $pwdrepeat;
    private $email;
    private $result;
    public function __construct($id, $pwd, $pwdrepeat, $email)
    {
        $this->$id = $id;
        $this->$pwd = $pwd;
        $this->$pwdrepeat = $pwdrepeat;
        $this->$email = $email;
    }

    public function signUpUser()
    {
        if ($this->emptyInput() == false) {
            header('location: ../index.php?error=emptyInput');
        }
        $this->setUser($this->id, $this->email, $this->pwd);
    }

    private function emptyInput()
    {
        $result = '';
        if (empty($this->id) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function pwdMatch()
    {
        $result = '';
        if ($this->pwd != $this->pwdrepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function userExist()
    {
        $result = '';
        if (!$this->checkUser($this->id, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
