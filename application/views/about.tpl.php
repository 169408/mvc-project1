<?php require_once VIEWS . "/parts/header.tpl.php"; ?>
<div class="content">
    About
    <a href="addPost" class="add">Add new Post</a>
    <div class="container">
        <div class="posts">
            <?php if(!empty($posts)) {
                foreach ($posts as $post) {
                    ?>
                    <div class="post">
                        <h2 class="post_title"><?=$post["title"]?></h2>
                        <div class="post_uploads">

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
