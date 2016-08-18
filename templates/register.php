<?php include './includes/header.php'; ?>
<form role="form" method="post" action="register.php" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name*</label>
        <input type="text" name="name" class="form-control" placeholder="Enrter Your Name...">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Emial address*</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Your Email...">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Choose a usernmae*</label>
        <input type="text" name="username" class="form-control" placeholder="Choose Your Username...">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password*</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Your Password...">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password*</label>
        <input type="password" name="password2" class="form-control" placeholder="Confirm Your Password...">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">About*</label>
        <input type="text" name="about" class="form-control" placeholder="About...">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Upload your avater*</label>
        <input name="FileUpload" type="file" id="exampleInputFile">
    </div>
    <div class="form-group">
        <label>Your message*</label>
        <textarea id="msg" class="form-control" rows="5" placeholder="Type Your Message..."></textarea>
    </div>
    <button name="register" type="submit" class="btn btn-default" style="margin-bottom:10px;">Submit</button>
</form>
<?php include './includes/footer.php'; ?>   
