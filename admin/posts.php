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
                            Wellcome to Posts
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>


                    <?php 
                    
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else{
                            $source = '';
                        }

                        switch($source){
                            case 'add_posts':
                            include 'includes/add_posts.php';
                            break;

                            case 'edit_post';
                            include 'includes/edit_post.php';
                            break;


                            default:
                            include "includes/view_all_posts.php";
                            break;
                        }
                    
                    
                    ?>



                </div>
                <!-- /.row -->
                        </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
<?php include "includes/admin_footer.php"; ?>
</body>

</html>
