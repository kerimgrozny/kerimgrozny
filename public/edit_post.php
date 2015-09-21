<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<form class="form-inline" action="blog_form_process.php" role="form" method="POST">
    <div class="form-group">
        <div class="col-sm-12">
            <textarea cols="80" rows="10" class="form-control" name="content" placeholder="Ваш пост.." required></textarea>
        </div>
    </div>
    <div class="form-inline">
        <label class="control-label col-sm-2">Тема</label>
        <div class="col-sm-12">
            <select class="form-control" name="subject" required>
                <option value=""></option>
                <?php $selectSubject = findAllSubjects(); 
                    while($subject = mysqli_fetch_assoc($selectSubject)){
                        $output  = "<option value=\"";
                        $output .= $subject["Name"];                                        
                        $output .= "\">";
                        $output .= $subject["Name"];
                        $output .= "</option>";
                        echo $output;
                    }
                ?>
            </select>                            
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Добавит</button>
        </div>
    </div>
</form>
<?php include("../includes/layouts/footer.php"); ?>