<?php include('abstract-views/header.php'); ?>
    <h1>Login Form<br><br></h1>



    <form action="index.php" method="post" class="container">
        <input type="hidden" name="action" value="validate_login">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <br>

        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>

        <div class="checkbox"></div>

        <button type="submit" class="btn btn-info">submit</button>
        </div>
    </form>

<?php include('abstract-views/footer.php'); ?>