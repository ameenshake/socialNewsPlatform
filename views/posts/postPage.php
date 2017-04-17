<!-- TODO: find better way to serve css files dynamically -->
<link rel="stylesheet" href="css/post.css">

<div class="main">

    <section class=post>
      <a href=" <?php echo $post['link']; ?> " id="link"><?php echo $post['title']; ?> </a>
        <span>(<?php echo parse_url($post['link'])['host']; ?>)</span>
        <div><?php echo $post['votes'] ?> votes by <a href=""><?php echo $post['username']; ?></a> at <?php echo $post['datePosted']; ?></div>

        <form class="" action="index.php?controller=posts&action=createComment" method="post">
          <input type="hidden" name="parentID" value="0">
          <input id="postID" type="hidden" name="postID" value="<?php echo $_GET['postID']; ?>">
          <textarea id="comment" name="comment" rows="8" cols="80"></textarea>
          <input type="submit" name="" value="Submit Comment">
        </form>

    </section>


   <div class="post ">
    <ul class="commentarea">
      <li>Hello
        <ul>
          <li>Hi</li>
        </ul>
      </li>

      <li>asdasd</li>
    </ul>
   </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/ajax.js" charset="utf-8"></script>
