<? include('header.php'); ?>



<div class="right_col" role="main">

<div class="col-md-12 col-xs-12">

		<? $row = $newsObject->getById( $_GET['id'] ); ?>
		<?
			if(isset($_POST['edit'])){
				$newsObject->editById($_GET['id']);
				header("Location: http://alt.bz.ua/post.php?id=".$_GET['id']);
			}
		
		?>
      <div class="x_panel">
        <div class="x_title">
          <h2>Editing news</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br>
          <form class="form-horizontal form-label-left" method="POST">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" placeholder="Default Input" name="title" value="<? echo $row['title'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Summary
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" rows="3" placeholder="rows=&quot;3&quot;"name="summary"><? echo $row['summary'] ?></textarea>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Content
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" rows="3" placeholder="rows=&quot;3&quot;" name="content"><? echo $row['content'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="category">
                  <? $catesRows = $newsObject->getCategoryList(); ?>
				  <? for($i=0;$i<$catesRows['count'];$i++){ ?>
						<option value="<? echo $catesRows[$i]['id'] ?>"><? echo $catesRows[$i]['name'] ?></option>
				  <? } ?>
                </select>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" placeholder="Default Input" name="status" value="1">
              </div>
            </div>
			<div class="ln_solid"></div>
			<button type="submit" class="btn btn-success pull-right" name="edit">Submit</button>
          </form>
        </div>
      </div>
    </div>

</div>

<? include('footer.php'); ?>