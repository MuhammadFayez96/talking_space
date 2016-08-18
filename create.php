<?php

require './core/init.php';

$topic = new Topic();

if(isset($_POST['do-create'])) {
    $validate = new Validator();
    
    $data = array();
    $data['title'] = $_POST['title'];
    $data['body'] = $_POST['body'];
    $data['category_id'] = $_POST['category_id'];
    $data['user_id'] = getUser()['user_id'];
    $data['last_activity'] = date("Y-m-d H-i-s");
    
    $field_array = array('title', 'body', 'category');
    
    if($validate->isRequired($field_array)) {
        if($topic->create($data)) {
            redirect('index.php', 'Your topic has been posted', 'success');
            
        } else {
            redirect('topic.php?id='.$topic_id, 'Something went wrong with your post', 'error');
        }
    } else {
        redirect('create.php', 'please fill all required fields', 'error');
    }
}

$template = new Template('templates/create.php');


echo $template;