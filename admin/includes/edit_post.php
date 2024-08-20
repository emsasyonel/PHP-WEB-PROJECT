<?php 

    if(isset($_GET['p_id']))
    $the_post_id = $_GET['p_id'];



    $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
    $edit_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($edit_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tag'];
        $post_content = $row['post_content'];
        $post_comment_count = $row['post_comment_count'];
        echo $post_date = $row['post_date'];
    }
    if(isset($_POST['update_post'])){
        $post_author = mysqli_real_escape_string( $connection, $_POST['post_author']);
        $post_title = mysqli_real_escape_string( $connection, $_POST['post_title']);
        $post_category_id = mysqli_real_escape_string( $connection, $_POST['post_category_id']);
        $post_status = mysqli_real_escape_string($connection, $_POST['post_status']);
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['temp_name'];
        $post_content = mysqli_real_escape_string( $connection, $_POST['post_content']);
        $post_tags = mysqli_real_escape_string( $connection, $_POST['post_tag']);

        move_uploaded_file($post_image_temp, "../images/$post_image");


        if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_image = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_image)){
                $post_image = $row["post_image"];
            }
        }

        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_date = now(), ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tag = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_image = '{$post_image}', ";
        $query .= "WHERE post_id = '{$the_post_id}' ";

        $update_post = mysqli_query($connection, $query);
        comfirm($update_post);
    }


?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <select name="post_category" id="">
            <?php
            
                $query = "SELECT * FROM categories";
                $select_query = mysqli_query($connection, $query);

                comfirm($select_query);

                while($row = mysqli_fetch_assoc($select_query)) {
                    $cat_id = $row["cat_id"];
                    $cat_title = $row["cat_title"];

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            
            
            
            
            
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <input value="<?php echo $post_category_id; ?>" type="text" class="form-control" name="post_category_id">
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>    
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <img width="90" src="../images/<?php echo $post_image; ?>" alt="">
        <input  type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea  name="post_content" class="form-control" cols="30" rows="10" id=""><?php echo $post_content; ?></textarea>        
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_post" value="Publisher Post">

    </div>
</form>