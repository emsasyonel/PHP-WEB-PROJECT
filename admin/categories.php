<?php include "includes/admin_header.php"; ?>
<?php include_once "functions.php"; ?>
<body>

    <div id="wrapper">
        <!-- Navigation -->

            <?php include "includes/admin_navigation.php" ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wellcome to Categories
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <div class="col-xs-6">

                        <?php 
                            insert_categories();                        
                        ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Categories</label>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                                </div>
                            </form>

                            <?php 
                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];

                                    include "includes/update_categories_admin.php";
                                }
                            
                            
                            ?>
                            
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                        findAllCategories();
                                    ?>
                                    <?php 
                                        deleteCategories();
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
<?php include "includes/admin_footer.php"; ?>
</body>

</html>
