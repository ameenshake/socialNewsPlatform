<div class="main">

  <section class="sidebar">
    <form id="searchform" class="" action="index.html" method="post">
      <input id="search" type="search" name="" value="" placeholder="Search">
    </form>
    <nav class="categories">
      <ul>
        <li><a href="">Software Discussion</a></li>
        <li><a href="">Game Discussion</a></li>
        <li><a href="">Movie Discussion</a></li>
        <li><a href="">Book Discussion</a></li>
        <li><a href="">News Discussion</a></li>
      </ul>
    </nav>
  </section>

  <section class="content">

    <?php

    foreach ($posts as $post) {
        echo  '<div class="entry">
        <img src="'.$post->image.'" alt="" />
        <span><a href="'.$post->link.'">'.$post->title.'</a></span>
      </div>';
    }?>

    <div class="entry">
      <img src="https://pbs.twimg.com/profile_images/771517286540718080/wKcYfzaJ.jpg" alt="" />
      <span><a href="#">Apples goes bankrupt? Click Here to find out!</a></span>
    </div>
    <div class="entry">
      <img src="https://pbs.twimg.com/profile_images/709852306632744960/zQ0xyGGK.jpg" alt="" />
      <span><a href="#">Microsoft goes bankrupt? Click Here to find out!</a></span>
    </div>
    <div class="entry">
      <img src="https://www.facebook.com/images/fb_icon_325x325.png" alt="" />
      <span><a href="#">Facebook goes bankrupt? Click Here to find out!</a></span>
    </div>
  </section>

</div>
