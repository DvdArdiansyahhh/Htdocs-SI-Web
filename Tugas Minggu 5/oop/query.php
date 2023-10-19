<?php
class crud extends koneksi {
    public function lihatData() {
        $sql = "SELECT * FROM user_detail";
        $result= mysqli_query($koneksi, $query);
        $no = 1;
        if ($sesLvl == 1) {
            $dis = "";
        } else {
            $dis = "disabled";
        }
    }
    
    public function insertData($email, $pass, $name) {
        try {
            $sql="INSERT INTO user_detail('user_email', 'user_password', 'user_fullname', 'level')
                  VALUES (:email, :pass, :name, 2)";
            $result=$this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>