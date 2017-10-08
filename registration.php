<? include('header.php'); ?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/contact-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Registration</h1>
                        <hr class="small">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>If you already have an account <a href="login.php">log in</a>.</p>
				
				<?
					if(isset($_POST['reg'])){
						$usersObject->register();
					}
				
				?>
				
                <form id="contactForm" novalidate method="post" enctype="multipart/form-data">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter Username.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Password" id="email" required data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Confirm password</label>
                            <input type="password" name="pass1" class="form-control" placeholder="Confirm password" id="email" required data-validation-required-message="Please confirm your password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>E-mail</label>
                            <input type="email" name="mail" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Real name</label>
                            <input type="text" name="realname" class="form-control" placeholder="Real name" id="email" required data-validation-required-message="Please enter your real name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Avatar</label>
                            <input type="file" name="image" class="form-control" placeholder="Avatar">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                   
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="reg" class="btn btn-default">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

<? include('footer.php'); ?>
