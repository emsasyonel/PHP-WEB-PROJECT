<?php include "includes/admin_header.php"; ?>

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
                            Wellcome to HomeBoard
                            
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">

                        </ol>
                    </div>
                </div>
                <!-- /.row -->
       
                <!-- /.row -->
                
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                            $query = "SELECT * FROM posts";
                            $select_all_posts = mysqli_query($connection, $query);

                            $post_counts = mysqli_num_rows($select_all_posts);

                            echo "<div class='huge'>{$post_counts}</div>";
                        
                        ?>
                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                            $query = "SELECT * FROM comments";
                            $select_all_commets = mysqli_query($connection, $query);

                            $comments_count = mysqli_num_rows($select_all_commets);

                            echo "<div class='huge'>{$comments_count}</div>";
                        
                        ?>
                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                            $query = "SELECT * FROM users";
                            $select_all_commets = mysqli_query($connection, $query);

                            $users_count = mysqli_num_rows($select_all_commets);

                            echo "<div class='huge'>{$users_count}</div>";
                        
                        ?>
                    
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                            $query = "SELECT * FROM categories";
                            $select_all_commets = mysqli_query($connection, $query);

                            $categories_count = mysqli_num_rows($select_all_commets);

                            echo "<div class='huge'>{$categories_count}</div>";
                        
                        ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
            <?php 
                $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                $select_all_draft_posts = mysqli_query($connection, $query);
                $post_draft_count = mysqli_num_rows($select_all_draft_posts);
            
                $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                $select_all_unapproved_comments = mysqli_query($connection, $query);
                $post_comment_count = mysqli_num_rows($select_all_unapproved_comments);

                $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                $select_all_subscriber = mysqli_query($connection, $query);
                $post_subscriber_count = mysqli_num_rows($select_all_subscriber);
            ?>

            </div>
            <div class="row">
            <script type="text/javascript">

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([

                <?php 
                    $element_text = ['Active Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Users', 'Subscribers','Categories'];
                    $element_count = [$post_counts, $post_draft_count, $comments_count, $post_comment_count, $users_count, $post_subscriber_count, $categories_count];
                    for($i = 0; $i < 7; $i++){
                        echo "['{$element_text[$i]}'" . " ," . "{$element_count[$i]}],";
                    }
                ?>
            ]);

            // Set chart options
            var options = {'title':'',
                            'subtitle': ''};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            }
</script>
<div id="chart_div" style="width: 'auto'; height: 500px;"></div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
<?php include "includes/admin_footer.php"; ?>
</body>

</html>
