<? include('header.php'); ?>
<? if($userdata!='unloginned'){ ?>
	
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/contact-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Adding an article</h1>
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
					if(isset($_POST['add'])){
						$newsObject->addOne($userdata['id']);
					}
				
				?>
				
                <form id="contactForm" novalidate method="post" enctype="multipart/form-data">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" id="name" required data-validation-required-message="Please enter Username.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <textarea class="form-control" rows="4" style="resize:none;" name="summary" placeholder="Summary"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <textarea class="form-control" rows="4" style="resize:none;" name="content" placeholder="Main content" id="content"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <span style="font-size: 1.5em; line-height: 3; color:#999;">Category</span>
							<select type="select" name="category" class="form-control" placeholder="Category" required data-validation-required-message="Please select category.">
							<? $catesRows = $newsObject->getCategoryList(); ?>
							<? for($i=0;$i<$catesRows['count'];$i++){ ?>
								<option value="<? echo $catesRows[$i]['id'] ?>"><? echo $catesRows[$i]['name'] ?></option>
							<? } ?>
							</select>
							
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <span style="font-size: 1.5em; line-height: 3; color:#999;">Image</span>
                            <input type="file" name="image" class="form-control" placeholder="Email Address" required data-validation-required-message="Please add an image.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                   
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="add" class="btn btn-default">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>
<? }else{ header("Location: index.php"); } ?>
<? include('footer.php'); ?>
