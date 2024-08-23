<?php 
    if(isset($_POST['create_post'])){
        $post_title = mysqli_real_escape_string($connection, $_POST['title']);
        $post_author = mysqli_real_escape_string($connection, $_POST['author']);
        $post_category_id = mysqli_real_escape_string($connection, $_POST['post_category']);
        $post_status = mysqli_real_escape_string($connection, $_POST['post_status']);

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = mysqli_real_escape_string( $connection, $_POST['post_tags']);
        $post_content = mysqli_real_escape_string( $connection, $_POST['post_content']);
        $post_date = date('d-m-y');
      

        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_comment_count, post_status)";
        $query .= "VALUES('{$post_category_id}', '{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
        $create_post_query = mysqli_query($connection, $query); 

        comfirm($create_post_query);

    }




?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
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
        <label for="title">Post Author</label>    
        <input type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label style="width:90px;" for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" cols="30" rows="10" id=""></textarea>        
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publisher Post">

    </div>
</form>