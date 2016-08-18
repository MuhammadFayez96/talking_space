</div>
</div>
</div> 
<div class="col-md-4">
    <div class="slidebar">
        <div class="block">
            <?php if(isLoggedIn()): ?>
            <div class="userdata">
                Welcome. <?php echo getUser()['username']; ?>
            </div>
            <br>
            <form role="form" method="post" action="logout.php">
                <input type="submit" name="do_logout" class="btn btn-primary" value="Logout"/>
            </form>
            <?php else: ?>
            <h3>Login form</h3>
            <form role="form" method="post" action="login.php">
                <div class="form-group">
                    <label>user name</label>
                    <input name="username" type="text" class="form-control" placeholder="Enter User Name...">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Enetr Password...">
                </div>
                <button name="do-login" type="submit" class="btn btn-primary">Submit</button>
                <a href="register.php" class="btn btn-default">Create new account ?</a>
            </form>
            <?php endif; ?>
        </div>
        <div class="block">
            <h3>Categories</h3>
            <div class="list-group">
                <a href="topics.php" class="list-group-item <?php echo is_active(NULL); ?>">All topics <span class="badge pull-right"><?php echo $totalTopics;?></span></a>
                <?php foreach (getCategories() as $category): ?>
                    <a href="topics.php?category=<?php echo $category['id']; ?>" class="list-group-item  <?php echo is_active($category['id']); ?>"><?php echo $category['name']; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>

</div><!-- /.container -->


</body>
</html>



