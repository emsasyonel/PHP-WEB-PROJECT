            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4Z>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name = "submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> <!-- search form -->
                    <!-- /.input-group -->
                </div>
                                <!-- Blog login Well -->
                                <div class="well">
                    <h4Z>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="input-group">
                        <span class="input-group-btn">
                        <input placeholder="Enter Username" name="username" type="text" class="form-control">
                        </span>
                    </div>
                    <br>
                    <div class="input-group">
                        <input placeholder="Enter Password" name="password" type="password" class="form-control">

                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">Submit</button>
                            </span>
                    </div>

                    </form> <!-- search form -->
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">

                    <?php 

                    $query = "SELECT * FROM categories LIMIT 5";
                    $select_categories_sidebar = mysqli_query($connection, $query);

                    ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php   
                                while($row = mysqli_fetch_array($select_categories_sidebar)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
            
                                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                                }
                            ?>

                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>

                    <?php include "includes/widget.php"; ?>
            </div>
