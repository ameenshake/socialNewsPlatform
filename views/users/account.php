<link rel="stylesheet" href="css/account.css">

<div class="main">


  <div class="list">
    <select class="" name="" >
      <option value="">By Time</option>
      <option value="">By Votes</option>
    </select>

<ul >
  <?php
    foreach ($comments as $key => $value) {
        echo '<li><a href="index.php?controller=posts&action=fetchPostPage&postID='.$value['postID'].'" >'.$value['commentText'].'</a></li>';
    }
   ?>

</ul>
</div>

</div>
