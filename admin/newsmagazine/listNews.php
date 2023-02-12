<?php
    include('headerFooter/header.php');
    include('../class/category.class.php');
    @session_start();
    if(isset($_SESSION['message']) && $_SESSION['message'] != ""){
        $successMessage = $_SESSION['message'];
        $_SESSION['message'] = "";
    }
    include('../class/news.class.php');

    $newsObject = new News();

    $newsList = $newsObject->retrieve();

    include('sideBar.php');
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">List News</h1>
    </div>

  </div>
  <?php  if(isset($successMessage)) { ?>
  <div class="alert alert-success"><?php echo $successMessage;  ?></div>
  <?php  } ?>
  <div class="row">
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>S.NO</th>
            <th>Title</th>
            <th>Short Detail</th>
            <th>Image</th>
            <th>Breaking</th>
            <th>Featured</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php  foreach($newsList as $key=>$news) { ?>
          <tr class="odd gradeX">
            <td> <?php echo $key+1; ?></td>
            <td> <?php echo $news['title']; ?> </td>

            <td> <?php echo $news['short_detail']; ?> </td>
            <td> <?php 
            
            echo "<img src='../images/".$news['image']."' style='width: 50px; height: 50px;'/>";
            ?> </td>

            <td class="center"><?php
                                    if($news['breaking'] == 1){
                                        echo "<label class='label-success'>Active</label>";
                                    }else{
                                        echo "<label class='label-danger'>Inactive</label>";
                                    }
                                        ?>
            </td>
            <td class="center"><?php
                                    if($news['featured'] == 1){
                                        echo "<label class='label-success'>Active</label>";
                                    }else{
                                        echo "<label class='label-danger'>Inactive</label>";
                                    }
                                        ?>
            </td>
            <td class="center"><?php
                                    if($news['status'] == 1){
                                        echo "<label class='label-success'>Active</label>";
                                    }else{
                                        echo "<label class='label-danger'>Inactive</label>";
                                    }
                                        ?>
            </td>

            <td class="center" width="20%">
              <a href="editNews.php?id=<?php echo $news['id']; ?>" role="btn" class="btn btn-success"><i
                  class="fa fa-edit"></i>Edit</a>
              <a href="deleteNews.php?id=<?php echo $news['id']; ?>" role="btn" class="btn btn-danger"><i
                  class="fa fa-trash"></i>Delete</a>
            </td>
          </tr>
          <?php  } ?>
        </tbody>

      </table>
    </div>
  </div>
</div>
</div>

<?php
     include('headerFooter/footer.php');
?>