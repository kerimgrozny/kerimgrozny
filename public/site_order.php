<?php include("../includes/layouts/header.php"); ?>
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <h1>Заполните форму пожалуйста</h1>
        <div class="col-xs-12 col-md-6">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2">Сайт:</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="SiteType">
                            <option value="4900">Сайт визитка</option>
                            <option value="volvo">Информационный сайт</option>
                            <option value="saab">Промо-сайт</option>
                            <option value="mercedes">Корпоративный сайт</option>
                            <option value="audi">Интернет-магазин</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-xs-12 col-md-6">
            <img class="img-responsive" src="images/serviceImages/websiteorder.jpg">
        </div>
    </div>

<?php include("../includes/layouts/footer.php"); ?>