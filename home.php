<?php
/*
Template Name: Home page
*/
get_header(); ?>

<div class="row">
    <div class="col-md-8">
        <?php get_articulobox(2);?>        
    </div>
  <div class="col-md-4">
      <?php get_mysidebar();?>      
  </div>
</div>

<?php get_footer();?>