<?php require_once VIEWS . "/parts/header.tpl.php"; ?>
<div class="content">
    <div class="container">
        <form id="postForm" action="/about" method="post" enctype="multipart/form-data">
            <p>Title: </p>
            <input type="text" name="title" placeholder="Title" value="" />
            <p>Uploads: </p>
            <input type="file" name="uploads[]" multiple />
            <p>Content: </p>
            <textarea name="content" cols="20" rows="8" placeholder="Content"></textarea>
            <button type="submit" name="submit" value="postAdd">Submit</button>
        </form>
    </div>
</div>
<?php require_once VIEWS . "/parts/footer.tpl.php"; ?>

