<?php
/*
Template Name: Recursos y Enlaces
*/
get_header(); ?>

<div class="row">
    <div class="col-md-8">
        <h2 class="page_title">Recursos y Enlaces</h2>
        <div class="list-recurso">
            <?php get_allrecurso(-1);?>
        </div>
        <div class="clear"></div>
        <div class="list-enlaces">
            <?php get_allenlaces(-1);?>
        </div>
    </div>
  <div class="col-md-4">
      <?php get_mysidebar();?>      
  </div>
</div>

<?php get_footer();?>