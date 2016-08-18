<?php include './core/init.php'; ?>

<?php 

    $topics  = new Topic();
    $user  = new User();

    $template = new Template('templates/frontpage.php');
    
    $template->topics = $topics->get_all_topics();
    $template->totalTopics = $topics->getTotalTopics();
    $template->totalCategories = $topics->getTotalCategories();
    $template->totalUsers = $user->getTotalUsers();
    echo $template;

