<?php include './includes/header.php'; ?>      
<form role="form" method="post" action="create.php" enctype="multipart/form-data">
    <div class="form-group">
        <label>Topic title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter Title...">
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id">
            <?php foreach (getCategories() as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Topic body</label>
        <textarea id="body" name="body" class="form-control" rows="10" placeholder="Type the topic body..."></textarea>
        <script>CKEDITOR.replace('body');</script>
    </div>
    <button name="do-create" type="submit" class="btn btn-default" style="margin-bottom:10px;">Submit</button>
</form>
<?php include './includes/footer.php'; ?>              