<?php include("../includes/layouts/header.php"); ?>
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <h1>Заполните форму пожалуйста</h1>
        <div class="col-xs-12 col-md-6">
            <form class="form-horizontal" role="form">

                <div class="form-group">
                    <label class="control-label col-sm-4">Сайт:</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="SiteType">
                            <option value="4900">Сайт визитка</option>
                            <option value="8000">Информационный сайт</option>
                            <option value="12000">Промо-сайт</option>
                            <option value="16000">Корпоративный сайт</option>
                            <option value="25000">Интернет-магазин</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4">О вашем проекте:</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" name="AboutProject">
                        </textarea>
                    </div>
                </div>

                <div class="form-inline">
                    <label class="control-label col-sm-4" for="pwd">Как связаться с вами:</label>
                    <div class="col-sm-6">
                        Телефон: <input type="radio" class="form-control" name="Contact" value="Telephone">
                        Email: <input type="radio" class="form-control" name="Contact" value="Email">
                        Skype: <input type="radio" class="form-control" name="Contact" value="Skype">
                    </div>
                </div>

                <div class="form-inline">
                    <label class="control-label col-sm-4" for="pwd">Тел, Email или Скайп:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="ContactData">
                    </div>
                </div>

                <div class="form-inline">
                    <label class="control-label col-sm-4">Когда вам нужен:</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="Date">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Потвердить</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-xs-12 col-md-6">
            <img class="img-responsive" src="images/serviceImages/websiteorder.jpg">
        </div>
    </div>

<?php include("../includes/layouts/footer.php"); ?>