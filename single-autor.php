<?php get_header(); ?>
<div class="row">
    <div class="col-md-8">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h2 class="page_title"><?php echo the_title();?></h2>
        <section class="entry-content content-box">
            <img src="<?php echo get_field('foto'); ?>" width="150px" class="alignleft">
            <?php echo get_field('descripcion'); ?>
        </section>    
        <section class="entry-content content-box">
            <h3>Articulos</h3>
            <?php 
                $articulos = get_articulosbyautor(get_the_ID());
                for($i=0;$i<sizeof($articulos);$i++){
                    get_singlearticulo($articulos[$i]);
                }
                
            ?>
        </section> 
        <?php //get_template_part( 'entry' ); ?>
        <?php endwhile; endif; ?>
    </div>
  <div class="col-md-4">
      <?php get_mysidebar();?>      
  </div>
</div>      

<?php get_footer(); ?>