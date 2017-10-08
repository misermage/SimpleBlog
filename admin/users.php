<? include('header.php'); ?>

  <div class="right_col" role="main">
      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Users <small>List</small></h2>
                    <a href="category.php"><button type="submit" class="btn btn-success pull-right" name="edit">Add category</button></a>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
					<? 
					if(isset($_GET['upgrade'])){
						$usersObject->upgradeUser($_GET['upgrade']);
					}

					?>
                    <? $usersRow = $usersObject->getUserList(); ?>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">id </th>
                            <th class="column-title">Username </th>
                            <th class="column-title">Email </th>
                            <th class="column-title">Real Name </th>
                            <th class="column-title">Type </th>
                            <th class="column-title">Avatar </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
						<? for($i=0;$i<$usersRow['count'];$i++){ ?>
                          <tr class="even pointer">
                            <td class=" "><? echo $usersRow[$i]['id']; ?></td>
                            <td class=" "><? echo $usersRow[$i]['username']; ?></td>
                            <td class=" "><? echo $usersRow[$i]['email']; ?></td>
                            <td class=" "><? echo $usersRow[$i]['realName']; ?></td>
                            <td class=" "><? echo $usersRow[$i]['typeName']; ?></td>
                            <td class=" "><img src="<? echo $usersRow[$i]['userImg']; ?>" style="width:50px;height:50px;"></td>
                            <td class=" last"><? if($usersRow[$i]['type']!=1){ ?><a href="users.php?upgrade=<? echo $usersRow[$i]['id']; ?>">Upgrade</a><? } ?>
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
       


<? include('footer.php'); ?>
