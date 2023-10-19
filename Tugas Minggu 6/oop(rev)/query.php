<?php
require('koneksi.php');

$sesLvl = 1; // Sesuaikan dengan level sesuai kebutuhan
$dis = ($sesLvl == 1) ? "" : "disabled";

class crud extends koneksi {
    public function lihatData() {
        $sql = "SELECT * FROM user_detail";
        $result = $this->koneksi->query($sql);
        return $result;
    }
    
    public function insertData($email, $pass, $name, $level) {
        try {
            $sql = "INSERT INTO user_detail (user_email, user_password, user_fullname, level)
                    VALUES (:email, :pass, :name, :level)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->bindParam(":level", $level); // Use the provided level
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function deleteUser($user_id) {
        try {
            $sql = "DELETE FROM user_detail WHERE id = :user_id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":user_id", $user_id);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}
$crud = new crud();

?>