
<?php get_header(); ?>
<section id="content" role="main">
    <div class="col-md-8">
        <header class="header">
        <h2 class="entry-title"><?php printf( __( 'Resultados de la busqueda: %s', 'blankslate' ), get_search_query() ); ?></h2>
        </header>        
        <?php 
             get_articulosbysearch($_GET["s"]);
         ?>
    </div>
    <div class="col-md-4">
          <?php get_mysidebar();?>      
    </div>
</section>
<?php get_footer(); ?>