<?php include './includes/header.php'; ?>                    
<ul id="topics">
    <?php if ($topics): ?>
        <?php foreach ($topics as $topic): ?>
            <li class="topic">
                <div class="row">
                    <div class="col-mid-2">
                        <img class="avatar pull-left" src="<?php echo BASE_URL; ?>templates/imgs/gravatar.jpg" />
                    </div>
                    <div class="col-md-10">
                        <div class="topic-content pull-right">
                            <h3><a href="topic.php?id=<?php echo $topic['id']; ?>"><?php echo $topic['title'] ?></a></h3>  
                            <div class="topic-info">
                                <a href="topics.php?category=<?php echo urlFormat($topic['category_id']) ?>"><?php echo $topic['name'] ?> </a>>>
                                <a href="topics.php?user=<?php echo urlFormat($topic['user_id']) ?>"> <?php echo $topic['username'] ?> >> </a><span> 
                                    <?php 
                                   echo format_date($topic['create_date']) ?>  </span>
                                <span class="badge"><?php echo replyCount($topic['id']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="lead">There is no topics to display!</p>
<?php endif; ?>
<h3>Form statistics</h3>
<ul>
    <li>total number of users: <strong><?php echo $totalUsers; ?></strong></li>
    <li>total number of tpoics: <strong><?php echo $totalTopics; ?></strong></li>
    <li>total number of categories: <strong><?php echo $totalCategories; ?></strong></li>
</ul>
<?php include './includes/footer.php'; ?>              