<?php require_once VIEWS . "/parts/header.tpl.php"; ?>
<div class="content">
    About
    <a href="addPost" class="add">Add new Post</a>
    <div class="container">
        <div class="posts">
            <form action="/about" class="search" method="get">
                <p>Enter post title:</p>
                <input type="text" name="title" placeholder="title" />
                <button type="submit" name="submit" value="search">Search</button>
            </form>
            <?php if(!empty($searched_posts)){
                foreach ($searched_posts as $searched_post) {
                    ?>
                    <div class="post">
                        <h2 class="post_title"><?=$searched_post["title"]?></h2>
                        <div class="post_uploads">
                            <?php foreach ($files as $file) {
                                if($file["post_id"] == $searched_post["post_id"]) {
                                    ?>
                                    <div class="file">
                                        <?php
                                        if($validator->valid_file_img($file)) {
                                            ?>
                                            <img src="uploads/post_files/<?=$file["file_name"]?>" class="post_image" alt="2">
                                            <?php
                                        } else {
                                            ?>
                                            <a href="uploads/post_files/<?=$file["file_name"]?>">Download file</a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <p class="post_description"><?=$searched_post["content"]?></p>
                    </div>
                    <?php
                }
            }?>
            <?php if(!empty($_GET["title"])) {
                ?>
                <p style="font-size: 19px; margin: 25px 0;">No more posts had found</p>
                <?php
            } ?>
            <?php if(!empty($posts)) {
                foreach ($posts as $post) {
                    ?>
                    <div class="post">
                        <h2 class="post_title"><?=$post["title"]?></h2>
                        <div class="post_uploads">
                            <?php foreach ($files as $file) {
                                if($file["post_id"] == $post["post_id"]) {
                                    ?>
                                    <div class="file">
                                        <?php
                                            if($validator->valid_file_img($file)) {
                                                ?>
                                                <img src="uploads/post_files/<?=$file["file_name"]?>" class="post_image" alt="2">
                                                <?php
                                            } else {
                                                ?>
                                                <a href="uploads/post_files/<?=$file["file_name"]?>">Download file</a>
                                                <?php    
                                            }
                                        ?>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <p class="post_description"><?=$post["content"]?></p>
                    </div>
                    <?php
                }
            } ?>
        </div>
        <div class="important_part">
            IMPORTANT
        </div>
    </div>
</div>
<?php require_once VIEWS . "/parts/footer.tpl.php"; ?>
