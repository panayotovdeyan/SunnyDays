<?php
class User {
    public $userId;
    public $admin;
    public $name;
    public $family;
    protected $email;
    protected $password;
    public $city;
    public $avatar;

    private $db; // Database connection

    public function __construct($db, $Uid = '', $Uadmin = 0, $Uname = '', $Ufamily = '', $Uemail = '', $Upass = '', $Ucity = '', $Uavatar = '') {
        $this->db = $db;
        $this->userId = is_numeric($Uid) && $Uid > 0 ? (int)$Uid : null;
        $this->name = $Uname;
        $this->admin = $Uadmin;
        $this->family = $Ufamily;
        $this->email = $Uemail;
        $this->password = $Upass;
        $this->city = $Ucity;
        $this->avatar = $Uavatar;

        if ($this->userId) {
            $this->load();
        }
    }

    private function load() {
        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE `userId` = ?");
        $stmt->bind_param("i", $this->userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $this->admin = $row['admin'];
            $this->name = $row['name'];
            $this->family = $row['family'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            $this->city = $row['city'];
            $this->avatar = $row['avatar'];
        }
        $stmt->close();
    }

    public function insert() {
        $stmt = $this->db->prepare("INSERT INTO `users` (`admin`, `name`, `family`, `email`, `password`, `city`, `avatar`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bind_param("issssss", $this->admin, $this->name, $this->family, $this->email, $hashedPassword, $this->city, $this->avatar);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $this->userId = $stmt->insert_id;
        }
        $stmt->close();
    }

    public function update() {
        if ($this->userId) {
            $stmt = $this->db->prepare("UPDATE `users` SET `admin` = ?, `name` = ?, `family` = ?, `email` = ?, `password` = ?, `city` = ?, `avatar` = ? WHERE `userId` = ?");
            $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
            $stmt->bind_param("issssssi", $this->admin, $this->name, $this->family, $this->email, $hashedPassword, $this->city, $this->avatar, $this->userId);
            $stmt->execute();
            $stmt->close();
        }
    }

    public function delete() {
        if ($this->userId) {
            $stmt = $this->db->prepare("DELETE FROM `users` WHERE `userId` = ?");
            $stmt->bind_param("i", $this->userId);
            $stmt->execute();
            $stmt->close();
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($Uemail) {
        if (filter_var($Uemail, FILTER_VALIDATE_EMAIL)) {
            $this->email = $Uemail;
        }
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($Upassword) {
        $this->password = $Upassword;
    }
}
