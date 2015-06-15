<?php get_header(); ?>
<div class="row">
    <div class="col-md-8">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h2 class="page_title"><?php echo the_title();?></h2>        
        <section class="entry-content content-box">
                                            <img src="<?php 
                                    $thumbID = get_post_thumbnail_id( get_the_ID() );
                                    $imgDestacada = wp_get_attachment_url( $thumbID );
                                    echo $imgDestacada;
                                ?>" width="100%">
        <br><br>
            <?php echo get_field('descripcion'); ?>
        </section> 
        <section class="entry-content content-box">
            <h3>Autores</h3>
            <?php $autores = get_field('autores');
                  $autores = $autores[0];
                  for($i=0;$i<sizeof($autores[autor]);$i++){
                      get_singleautor($autores[autor][$i]);
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