<? include('header.php'); ?>
	<? 
	if(isset($_GET['count'])){
		$postsNumb = $_GET['count']; 
	}else{
		$postsNumb = 10;
	}
	?>
	<? 
	if(isset($_GET['logout'])){
		$usersObject->logout();
	}
	?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Confirm news</h1>
                        <hr class="small">
                    </div>
                </div>
            </div>
        </div>
    </header>
	
	<? if($userdata != 'unloginned'){ ?>
	<? if($userdata['type'] = 1 || $userdata['type'] = 2){ ?>
	<? if(isset($_GET['id'])){ $newsObject->confirmById($_GET['id']); } ?>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?
				$newsRow = $newsObject->getUnconfirmed(50); 
			?>
			<? if($newsRow['count']<1){ echo 'All articles are verified';} ?>
				<? for($i=0;$i<$newsRow['count'];$i++){ ?>
                <div class="post-preview">
				<div style="width:100%; text-align:left; "><h2 style="font-size:30px; text-align:left; width:200px; display:inline;"><?if($newsRow[$i]['status']==0){?>UNVERIFIED<?}else{?>VERIFIED<?}?> </h2>
				<div style="width:50%; text-align:right; float:right;"> <a href="confirm.php?id=<? echo $newsRow[$i]['id']; ?>" ><i class="fa fa-check fa-2x"></i></a></div></div>
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
                
                <!-- Pager -->
				
				<? if(!isset($_GET['author']) && !isset($_GET['category']) && $newsRow['count']>10){ ?>
                <ul class="pager">
                    <li class="next">
                        <a href="?count=<? echo $postsNumb+20; ?>">Older Posts &rarr;</a>
                    </li>
                </ul>
				<? } ?>
            </div>
        </div>
    </div>
	<? 
	}else{ header("Location: index.php"); }
	}else{ header("Location: index.php"); } 
	?>
    <hr>

<? include('footer.php'); ?>