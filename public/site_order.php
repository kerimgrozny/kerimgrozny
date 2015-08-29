<?php include("../includes/layouts/header.php"); ?>
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <h1>Заполните форму пожалуйста</h1>
        <div class="col-xs-12 col-md-6">
            <form action="site_order.php" role="form"  method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-xs-12 col-md-6">
            <img class="img-responsive" src="images/serviceImages/websiteorder.jpg">
        </div>
    </div>

<?php include("../includes/layouts/footer.php"); ?>