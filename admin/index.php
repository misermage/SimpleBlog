<? include('header.php'); ?>
<? if(isset($_GET['logout'])){
	$usersObject->logout();
} ?>

<? if(isset($_GET['confirm'])){
	$newsObject->confirmById($_GET['confirm']);
} ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count"><? echo $usersObject->getUsersCount(); ?></div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total News</span>
              <div class="count"><? echo $newsObject->getNewsCount(); ?></div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> News To Confirm</span>
              <div class="count green"><? echo $newsObject->getCountToConfirm(); ?></div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Server Status</span>
              <div class="count">OK</div>
            </div>
          </div>
          <!-- /top tiles -->
		
		<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>News <small>List</small></h2>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <? $newsRow = $newsObject->getUnconfirmed(); ?>

                <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th class="column-title">id </th>
                        <th class="column-title">Title </th>
                        <th class="column-title">Publication Date </th>
                        <th class="column-title">Status </th>
                        <th class="column-title">Category </th>
                        <th class="column-title">Author </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
			<? for($i=0;$i<$newsRow['count'];$i++){ ?>
                      <tr class="even pointer">
                        <td class=" "><? echo $newsRow[$i]['id']; ?></td>
                        <td class=" "><? echo $newsRow[$i]['title']; ?></td>
                        <td class=" "><? echo $newsRow[$i]['publicationDate']; ?></td>
                        <td class=" "><? echo $newsRow[$i]['status']; ?></td>
                        <td class=" "><? echo $newsRow[$i]['name']; ?></td>
                        <td class=" "><? echo $newsRow[$i]['username']; ?></td>
                        <td class=" last"><a href="index.php?confirm=<? echo $newsRow[$i]['id']; ?>">Confirm</a>
                      </td>
			<? } ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
		
<? include('footer.php'); ?>