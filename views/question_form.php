<?php include('abstract-views/header.php'); ?>

    <h1>Add Question Form<br></h1>

    <form action="index.php" method="post" class="container">
        <input type="hidden" name="action" value="create_new_question">
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">

        <div id="data">

                        <div class="form-group">
                <label class="control-label col-sm-2" for="title">Question Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" placeholder="Enter Question name" name="title"><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="skills">Skills:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="skills" placeholder="skill1, skill2, skill3" name="skills"><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="body">Question Body:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" id="body" placeholder="Enter Question body" name="body"></textarea><br>
                </div>
            </div>


        </div>

        <button type="submit" class="btn btn-success">submit</button>



    </form>




<?php include('abstract-views/footer.php'); ?>