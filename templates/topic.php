<?php include './includes/header.php'; ?>
<ul id="topics">
    <li id="main-topic" class="topic topic">
        <div class="row">
            <div class="col-md-2">
                <div class="user-info">
                    <img class="avatar pull-left img-responsive" src="<?php echo BASE_URL; ?>/templates/imgs/gravatar.jpg" />
                    <ul>
                        <li><strong><?php echo $topic['username']; ?></strong></li>
                        <li><?php echo userPostCount($topic['user_id']); ?> posts</li>
                        <li><a href="<?php echo BASE_URL; ?>topic.php?user=<?php echo $topic['user_id'] ?>">view topics</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="topic-content pull-right">
                    <label style="text-decoration: underline">Topic body:-</label>
                    <p class="lead" style="font-size: 15px;"><?php echo $topic['body'] ?></p>
                </div>
            </div>
        </div>
    </li>
    <label style="text-decoration: underline">Replies</label>
    <?php foreach ($replies as $reply): ?>
        <li class="topic topic">
            <div class="row">
                <div class="col-md-2">
                    <div class="user-info">
                        <img class="avatar pull-left img-responsive"src="<?php echo BASE_URL; ?>/templates/imgs/gravatar.jpg" />
                        <ul>
                            <li><strong><?php echo $reply['username']; ?></strong></li>
                            <li><?php echo userPostCount($reply['user_id']); ?> posts</li>
                            <li><a href="<?php echo BASE_URL; ?>topic.php?user=<?php echo $reply['user_id'] ?>">view topics</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="topic-content pull-right">
                        <p class="lead" style="font-size: 15px;"><?php echo $reply['body'] ?></p>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<?php if(isLoggedIn()): ?>
<h3>Reply to a topic</h3>
<form role="form" method="post" action="topic.php?id="<?php echo $topic['id']; ?> enctype="multipart/form-data">
    <div class="form-group">
        <textarea id="body" name="body" class="form-control" rows="3" placeholder="Type the topic body..."></textarea>
        <script>CKEDITOR.replace('body');</script>
    </div>
    <button type="submit" name="do-reply" class="btn btn-default" style="margin-bottom:10px;">Reply</button>
</form>
<?php else: ?>
<p>Please login to replay</p>
<?php endif; ?>
<?php include './includes/footer.php'; ?>
