<? include('header.php'); ?>
	<? 
	if(isset($_GET['count'])){
		$postsNumb = $_GET['count']; 
	}else{
		$postsNumb = 10;
	}
	?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>My articles</h1>
                        <hr class="small">
                    </div>
                </div>
            </div>
        </div>
    </header>
	
	<? 
		$newsRow = $newsObject->getMyList(50, $userdata['username']); 
	?>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-1">
				<? if($newsRow['count']<1){ echo 'Seems like you first time here';} ?>
				<? for($i=0;$i<$newsRow['count'];$i++){ ?>
                <div class="post-preview">
				<div style="width:100%; text-align:left; "><h2 style="font-size:30px; text-align:left; width:200px; display:inline;"><?if($newsRow[$i]['status']==0){?>UNVERIFIED<?}else{?>VERIFIED<?}?> </h2>
				<div style="width:50%; text-align:right; float:right;"> <a href="edit.php?id=<? echo $newsRow[$i]['id']; ?>" ><i class="fa fa-pencil fa-2x"></i></a></div></div>
				
				<div class="clear:both;"></div>
                    <a href="post.php?id=<? echo $newsRow[$i]['id']; ?>">
						<div class="col-md-12" style="padding:0;">
							<img src="<? echo $newsRow[$i]['imageUrl']; ?>" width="100%" style="margin-right:15px; width:100%;">
						</div>
                        
							<h2 class="post-title" style="  font-size: 30px;">
								<? echo $newsRow[$i]['title']; ?>
							</h2>
							<h3 class="post-subtitle">
								<? echo $newsRow[$i]['summary']; ?>
							</h3>
						
                    </a>
					
						<p class="post-meta" style="clear:both; margin-top:30px;">Posted by <a href="?author=<? echo $newsRow[$i]['username'];  ?>"><? echo $newsRow[$i]['realName']; ?></a> on <? echo $newsRow[$i]['publicationDate']; ?></p>
					
                </div>
				
				<? if($i<$newsRow['count']-1){ echo'<hr>';} ?>
                <? } ?>

                
            </div>
        </div>
    </div>

    <hr>

<? include('footer.php'); ?>