<?php

require './core/init.php';

$topic = new Topic();
$user = new User();
$validator = new Validator();
$template = new Template('templates/register.php');

if (isset($_POST['register'])) {
    $data = array();

    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['password2'] = $_POST['password2'];
    $data['about'] = $_POST['about'];
    $data['last_activity'] = date("Y-m-d H:i:s");

    $field_array = array('name', 'email', 'username', 'password', 'password2');

    if ($validator->isRequired($field_array)) {
        if ($validator->isValidEmail($data['email'])) {
            if ($validator->isValidPassword($data['password1'], $data['password2'])) {
                if ($user->upload_avatar()) {
                    $data['avatar'] = $_FILES["FileUpload"]["name"];
                } else {
                    $data['avatar'] = 'noimage.png';
                }

                if ($user->register($data)) {
                    redirect('index.php', 'Successfully Done! Now You Can Login', 'sucess');
                } else {
                    redirect('index.php', 'Smoething Is Wrong With Your Registeration!');
                }
            } else {
                redirect('register.php', 'Your password fields didn\'t match', 'error');
            }
        } else {
            redirect('register.php', 'Your email is not valid', 'error');
        }
    } else {
        redirect('register.php', 'Please fil all fields', 'error');
    }
}
echo $template;
