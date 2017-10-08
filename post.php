<? include('header.php'); ?>
<? $articleRow = $newsObject->getById($_GET['id']); ?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<? echo $articleRow['imageUrl']; ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1 style = "font-size: 45px;"><? echo $articleRow['title']; ?></h1>
                        <span class="meta" style="margin-top:30px;">Posted by <a href="index.php?author=<? echo $articleRow['username']; ?>"><? echo $articleRow['username']; ?></a> on <? echo $articleRow['publicationDate']; ?> in <a href="index.php?category=<? echo $articleRow['category']; ?>"><? echo $articleRow['name']; ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <? echo $articleRow['content']; ?>
                </div>
            </div>
        </div>
    </article>
	
    <hr>
	<div class="comments">
		<div class="container">
			<div class="col-md-10 comment-form">
			<? $commRow = $commentsObject->getByArticleId($_GET['id']); ?>
			<? if($userdata != 'unloginned'){ ?>
			<? 
			if(isset($_POST['send'])){
				$commentsObject->addByArticleId($_GET['id'],$userdata['id']);
			} 
			?>
			<form method="POST">
				<div style="margin-bottom:15px;"><? echo $commRow['count']; ?> Comment(s)</div>
					<textarea class="form-control" rows="3" name="message"></textarea>
					<div class="row">
                    <div class="form-group col-md-12">
                        <button type="submit" name="send" class="btn btn-default pull-right" style="margin-top:10px;">Send</button>
                    </div>
                </div>
					</form>
				
				
			<? }else{ ?>
				<p style="padding-left:0px;">Please <a href="login.php">sign in</a> to left comment</p>
			<?}?>
			</div>
			<? for($i=0;$i<$commRow['count'];$i++){ ?>
			<div style="clear:both"></div>
			<div class="media">
				<div class="media-left">
					
					<img class="media-object" src="https://pp.vk.me/c629310/v629310599/10bda/i6fq9drmWn0.jpg" alt="..." width=80px; height=80px;>
					
				</div>
				<div class="media-body">
					<h4 class="media-heading" style="display:inline;">
						<? echo $commRow[$i]['realName']; ?>
					</h4>
					<h4 class="comm-date">
						<? echo $commRow[$i]['datetime']; ?>
						<? if(($userdata!='unloginned' && $userdata['type']==2) || ($userdata!='unloginned' && $userdata['type']==1)){?>
							<?if(isset($_GET['delete'])){
								$commentsObject->deleteComm($_GET['id'],$_GET['delete']);
							}?>
							<a href="post.php?id=<? echo $_GET['id']; ?>&delete=<? echo $commRow[$i]['id']; ?>" style="display:inline;"><i class="fa fa-times"></i></a>
						<?}?>
					</h4>
					<div style="clear:both"></div>
					<? echo $commRow[$i]['content']; ?>
				</div>
			</div>
			<? if($i<$commRow['count']-1){echo'<hr style="margin-left:16%">';} ?>
			<? } ?>
			
			
		</div>
	</div>
		
	<hr>
<? include('footer.php'); ?>
