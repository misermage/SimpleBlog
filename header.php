<!DOCTYPE html>
<html lang="en">
<? error_reporting(E_ALL); ?>
<? include('config.php'); ?>
<? include('classes/News.php'); ?>
<? include('classes/Users.php'); ?>
<? include('classes/Comments.php'); ?>
<? $newsObject = new News; ?>
<? $usersObject = new Users; ?>
<? $commentsObject = new Comments; ?>
<? $userdata = $usersObject-> check(); ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tech News</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div>

</div>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">Tech News</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
					<? if($userdata!='unloginned'){
					if($userdata['type']==1 || $userdata['type']==2){ ?>
                    <li>
                        <a href="confirm.php">Articles to confirm (<? echo $newsObject->getCountToConfirm(); ?>)</a>
                    </li>
					<? }} ?>
					<? if($userdata!='unloginned'){ ?>
                    <li>
                        <a href="my.php">My Articles</a>
                    </li>
					<? } ?>
					<? if($userdata!='unloginned'){ ?>
                    <li>
                        <a href="add.php">Add Article</a>
                    </li>
					<? } ?>
                    <li style = "color:#fff;font-size:12px; padding-right:20px;">
                        <? if($userdata=='unloginned'){ ?><a href="login.php">Login</a><? }else{ ?>
						<a href="profile.php?id=<? echo $userdata['id']; ?>" style="display:inline-block; padding-right:0px;"><? echo $userdata['username']; ?></a>
						(<a href="index.php?logout=1" style="font-weight:400;padding-right:0px; padding-left:0px;display:inline;">Logout</a>)<? } ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>