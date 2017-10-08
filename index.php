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
                        <h1>Tech News</h1>
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
				if(isset($_GET['author'])){
					$newsRow = $newsObject->getListByUser(50, $_GET['author']); 
				}elseif(isset($_GET['category'])){
					$newsRow = $newsObject->getListByCat(50, $_GET['category']); 
				}else{
					$newsRow = $newsObject->getList($postsNumb);
				}
			?>
				<? for($i=0;$i<$newsRow['count'];$i++){ ?>
                <div class="post-preview">
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

    <hr>

<? include('footer.php'); ?>