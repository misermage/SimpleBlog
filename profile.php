<? include('header.php'); ?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/about-bg.jpg')">
				<?
					$row = $usersObject->getUserDataById($_GET['id']);
				?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1><? echo $row['username']; ?></h1>
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
                
				
				<?
					if(isset($_POST['change'])){
						$usersObject->changeData($_GET['id']);
					}
				
				?>
				<div class="col-md-6">
					<form id="contactForm" novalidate method="post">
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>Username</label>
								<span style="font-size: 1.5em; line-height: 2; color:#999;"><? echo $row['username']; ?></span>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>E-mail</label>
								<span style="font-size: 1.5em; line-height: 1.62; color:#999;"><? echo $row['email']; ?></span>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>Real Name</label>
								<span style="font-size: 1.5em; line-height: 1.63; color:#999;"><? echo $row['realName']; ?></span>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>Avatar</label>
								<span style="font-size: 1.5em; line-height: 2; color:#999;"><img src="<? echo $row['userImg']; ?>" width="200px"></span>
								<p class="help-block text-danger"></p>
							</div>
						</div>
					
						<br>
						<div id="success"></div>
					</form>
				</div>
				<? if($userdata!='unloginned' && $userdata['id']==$_GET['id']){ ?>
				<div class="col-md-6">
					<form id="contactForm" novalidate method="post" enctype="multipart/form-data">
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls"  enctype="multipart/form-data">
								<label>Username</label>
								<span style="font-size: 1.5em; line-height: 2; color:#999;"><? echo $row['username']; ?></span>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>E-mail</label>
								<input type="email" name="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address." value="<? echo $row['email']; ?>">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>Real name</label>
								<input type="text" name="realname" class="form-control" placeholder="Real name" id="email" required data-validation-required-message="Please enter your real name." value="<? echo $row['realName']; ?>">
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
								<button type="submit" name="change" class="btn btn-default">Change data</button>
							</div>
						</div>
					</form>
				</div>
				<? } ?>
            </div>
        </div>
    </div>

    <hr>

<? include('footer.php'); ?>
