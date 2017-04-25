<link rel="stylesheet" href="css/account.css">

<div class="main">



<ul>
  <?php  var_dump($comments);
    foreach ($comments as $key => $value) {

        echo '<li><a href="index.php?controller=posts&action=fetchPostPage&postID='.$value['postID'].'" >'.$value['commentText'].'</a></li>';
    }
   ?>

</ul>
</div>

</div>
