<?php

class User {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function upload_avatar() {
        $path = $_FILES['FileUpload']['tmp_name'];
        $name = $_FILES['FileUpload']['name'];
        $size = $_FILES['FileUpload']['size'];
        $error = $_FILES['FileUpload']['error'];
        $type = $_FILES['FileUpload']['type'];

        $dir = dirname(__FILE__) . '/../templates/imgs/';
        $error = "";

        $uploadOk = 1;
        $imageFileType = pathinfo($name, PATHINFO_EXTENSION);

//Check if it's actualimage or fake image.
        $check = getimagesize($path);
        if ($check !== FALSE) {
//        echo 'File is an image - ' . $check['mime'] . '.<br>';
            $uploadOk = 1;
        } else {
            $error .= 'File is not an image!';
            $uploadOk = 0;
        }

        //Check if file is already exists.
//    if (file_exists($name)) {
//        echo 'Sorry, the file is already exist!';
//        $uploadOk = 0;
//    }
        //Check file size
        if ($size > 500000) {
            $error .= 'Sorry, the file is to large!';
            $uploadOk = 0;
        }

        //Allow certain formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//        echo 'Image File Type is '.$imageFileType.'<br>';
            $error .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        //Check $uploadOk value
        if ($uploadOk == 0) {
            redirect('register.php', $error, 'error');
        } else {
            move_uploaded_file($path, $dir . $name);
            return TRUE;
//        echo 'Image File Type is '.$imageFileType.'<br>';
//        echo 'The File ' . $name . ' was successfully uploaded' . '<br>';
        }
    }

    public function register($data) {
        $this->db->query("INSERT INTO users (name, email, avatar, username, password, about, last_activity) "
                . "VALUES (:name, :email, :avatar, :username, :password, :about, :last_activity)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':about', $data['about']);
        $this->db->bind(':last_activity', $data['last_activity']);

        if ($this->db->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function login($username, $password) {
        $this->db->query("SELECT * FROM users "
                . "WHERE username  = :username "
                . "AND password = :password");
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            $this->setUserData($row);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function setUserData($row) {
        $_SESSION['is_logged_in'] = TRUE;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
    }
    
    public function logout() {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
        
        return TRUE;
    }
    
    public function getTotalUsers() {
        $this->db->query("SELECT * FROM users");
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }

}
