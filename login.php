<? include('header.php'); ?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/contact-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Log In</h1>
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
                <p>If you don't have account yet <a href="registration.php">register</a>.</p>
				
				<?
					if(isset($_POST['login'])){
						$usersObject->login();
					}
				
				?>
                <form id="contactForm" novalidate method="post">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your Username.">
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
                   
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="login" class="btn btn-default">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

<? include('footer.php'); ?>
