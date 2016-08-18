<?php
require('./core/init.php');

$topic = new Topic();

$topic_id = $_GET['id'];
if(isset($_POST['do-reply'])) {
    $data = array();
    $data['topic_id'] = $_GET['id'];
    $data['body'] = $_POST['body'];
    $data['user_id'] = getUser()['user_id'];
    
    $validate = new Validator();
    
    $field_array = array('body');
    
    if($validate->isRequired($field_array)) {
        if($topic->reply($data)) {
            redirect('topic.php?id='.$topic_id, 'Your reply has been posted', 'success');
        } else {
            redirect('topic.php?id='.$topic_id, 'Something went wr=ong with your reply', 'error');
        }
    } else {
        redirect('topic.php?id='.$topic_id, 'Your reply form is blank', 'error');
    }
} else {
    
}

$template = new Template('templates/topic.php');


$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)['title'];
$template->totalTopics = $topic->getTotalTopics();


echo $template;