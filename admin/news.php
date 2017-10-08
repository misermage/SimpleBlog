<? include('header.php'); ?>

<? 
if(isset($_GET['delete'])){
	$newsObject->deleteById($_GET['delete']);
}


?>
  <div class="right_col" role="main">
      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>News <small>List</small></h2>
                    <a href="category.php"><button type="submit" class="btn btn-success pull-right" name="edit">Add category</button></a>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <? $newsRow = $newsObject->getAllList(); ?>

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
                            <th class="column-title no-link last"><span class="nobr">Action 2</span>
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
                            <td class=" last"><a href="edit.php?id=<? echo $newsRow[$i]['id']; ?>">Edit</a>
                            <td class=" last"><a href="news.php?delete=<? echo $newsRow[$i]['id']; ?>">Delete</a>
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