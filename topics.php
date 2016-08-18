<?php include './core/init.php'; ?>

<?php

$topic = new Topic();
$user = new User();

$category = isset($_GET['category']) ? $_GET['category'] : NULL;
$user_id = isset($_GET['user']) ? $_GET['user'] : NULL;

$template = new Template('templates/topics.php');

if (isset($user_id)) {
    $template->topics = $topic->getByUser($category);
}

if (isset($category)) {
    $template->topics = $topic->getByCategory($category);
    $template->CategoryTitle = 'Posts in "' . $topic->getCategory($category)['name'] . '"';
} else {
    $template->topics = $topic->get_all_topics();
}


$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();
echo $template;
