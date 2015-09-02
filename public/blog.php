<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div class="container" id="content" xmlns="http://www.w3.org/1999/html"><!--content container start-->
    <div class="row"><!--content row start-->
        <h1>Блог</h1>
        <div class="col-xs-12 col-md-6">
            <ul>
                <?php $result = find_blog_subjects(); ?>
                <?php
                    while($subject = mysqli_fetch_assoc($result)){
                ?><li><a href="blog.php"><?php echo $subject['SubjectName']; ?></a>
                    <ul>
                        <?php $result = find_blog_pages_for_subject($subject['SubjectID']); ?>
                    <?php
                        while($page = mysqli_fetch_assoc($result)){
                    ?><li><a href="blog.php"><?php echo $page['Name']; ?></a>
                    </ul>
                    <?php
                    }
                  ?>
                  </li>
            </ul>
        <?php } ?>
        </div>
    </div>
    <div class="row"><!--content row start-->
        <div class="col-xs-12 col-md-6">
            <p>Это лента всегда будет обновлятся новой информацией</p>
        </div>
    </div>

</div>
<?php include("../includes/layouts/footer.php"); ?>