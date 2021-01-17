<?php
    include 'base.tpl.php';
    ?>
<main class="container">
   
   <h3>Bloger posts</h3>
   <div class="col my-auto">
   <section class="list">
   
   <?php
       if(isset($data)){
           foreach ($data as $row){
               
                  echo '<article class="post mb-3" style="background-color:grey;"><h2>'.
                  '<a href="'.BASE.'post/show/id/'.$row['id'].'">'.$row['title'].'</a></h2><br>'. 
                  htmlspecialchars($row['cont']).'<h5><a href="'.BASE.'post/comment/id/'.$row['id'].'">Comment</a></h5></article>';
               } 
       }
       else{
           echo '<h3>No post</h3>';
       }
   ?>
   </div>
   </section>
  
   <section>
   <br>
   <div class="my-auto">
   <div id="message" class="alert alert-warning" role="alert">

       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
       </button>
   </div>
   </div>
   </section>
   
</main>
<?php

    include 'footer.tpl.php';
    ?>