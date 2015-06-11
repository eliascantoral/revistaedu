<?php
/*
Template Name: Autores
*/
get_header(); ?>

<div class="row">
    <div class="col-md-8">
        <h2 class="page_title">Nuestro Equipo</h2>
        <?php get_allautor(-1);?>
    </div>
  <div class="col-md-4">
      <?php get_mysidebar();?>      
  </div>
</div>

<?php get_footer();?>