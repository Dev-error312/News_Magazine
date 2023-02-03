<?php
    include('headerFooter/header.php');

    include('../class/category.class.php');

    $category = new Category();
    $id = $_GET['id'];
    $category->set('id', $id);
    $data = $category->getById();

    @session_start();

    if(isset($_POST['submit'])) {
        $category->set('name', $_POST['name']);
        $category->set('rank', $_POST['rank']);
        $category->set('status', $_POST['status']);
        $category->set('modified_by', $_SESSION['id']);
        $category->set('modified_date', date('Y-m-d H:i:s'));

        $result = $category->edit();

        if($result) {
            $msg = "Category updated Successfully with id ".$result;
        } else {
            $msg = "";
        }

    }

   
    include('sidebar.php');

?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-6">

                    <?php if(isset($msg)) { ?>

                        <div class="alert alert-success">
                            <?php echo $msg; ?>
                        </div>

                    <?php } ?>

                    <form role="form" class="loginForm" method="post" noValidate>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $data->name; ?>" required>
                        </div>
                        <div class="form-group">                     
                            <label>Rank</label>                
                            <input type="number" name="rank" class="form-control" placeholder="Enter Rank" value="<?php echo $data->rank; ?>" required>                 
                        </div>               
                        
                    <div class="form-group">
                        <label>Status</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="optionsRadios1" value="1" <?php if($data->status == 1) { echo "checked"; } ?> >Active
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="optionsRadios2" value="0" <?php if($data->status == 0) { echo "checked"; } ?>>Inactive
                            </label>
                        </div>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-success">Submit Button</button>
                    <button type="reset" class="btn btn-danger">Reset Button</button>

                    </form>
                </div>
            </div>  
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php

    include('headerFooter/footer.php')

?>