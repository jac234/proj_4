<?php include('abstract-views/header.php'); ?>

    <h1>Registration Form<br><br></h1>
    <form action="index.php" method="post" class="container">
        <input type="hidden" name="action" value="register">
        <div id="data">

            <div class="form-group">
                <label class="control-label col-sm-2" for="fname">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname"><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="lname">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname"><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="birthday">Birthday:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="birthday" name="birthday"><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email"><br>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"><br>
                </div>
            </div>

        </div>


        <button type="submit" class="btn btn-success">submit</button>
    </form>

<?php include('abstract-views/footer.php'); ?>