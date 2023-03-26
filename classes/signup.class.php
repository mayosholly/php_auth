<?php

class SignUp extends Dbh
{
    protected function setUser($id, $email, $pwd)
    {
        $sql = "INSERT INTO users (id, pwd,email) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
        if ($stmt->execute([$id, $hashPwd, $email])) {
            $stmt = null;
            header("location: ../index.php?stmtfailed");
        }
    }
    protected function checkUser($id, $email)
    {
        $sql = "SELECT id from users WHERE id = ? OR email = ?";
        $stmt = $this->connect()->prepare($sql);
        if (!$stmt->execute([$id, $email])) {
            $stmt = null;
            header("location: ../index.php?stmtfailed");
        }
        $resultCheck = '';
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
