<?php include VIEW . 'header.php'; ?>

<h1 class="text-center">Register</h1>

<form method="post" action="/user/register" class="form-signin">
    Login <input type="text" name="login" class="form-control"><br>
    Password <input type="password" name="password" class="form-control"><br>
    <input type="submit" class="btn btn-lg btn-primary btn-block">
</form>

<?php include VIEW . 'footer.php'; ?>