<?php include("../includes/layouts/header.php"); ?>
<div class="row"><!--content row start-->
    <div class="col-xs-12">
    <h1>Логин</h1>
        <form class="form-group" action="register.php" method="POST" role="form">

            <div class="form-inline">
                <label class="control-label col-sm-2">Логин:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Login" placeholder="Ведите логин">
                </div>
            </div>
            <div class="form-inline">
                <label class="control-label col-sm-2">Пароль:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="Password" placeholder="Ведите пароль">
                </div>
            </div>
            <div class="form-inline">
                <div class="col-sm-12">
                    <input type="submit" class="form-control" value="Войти">
                </div>
            </div>
        </form>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
