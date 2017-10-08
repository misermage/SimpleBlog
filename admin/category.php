<? include('header.php'); ?>



<div class="right_col" role="main">

<div class="col-md-12 col-xs-12">

		<?
			if(isset($_POST['add'])){
				$newsObject->addCategory();
				header("Location: news.php");
			}
		
		?>
      <div class="x_panel">
        <div class="x_title">
          <h2>Adding category</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br>
          <form class="form-horizontal form-label-left" method="POST">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Category name</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" placeholder="Category name" name="name">
              </div>
            </div>
			<div class="ln_solid"></div>
			<button type="submit" class="btn btn-success pull-right" name="add">Submit</button>
          </form>
        </div>
      </div>
    </div>

</div>

<? include('footer.php'); ?>