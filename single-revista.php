<?php get_header(); ?>
<div class="row">
    <div class="col-md-12">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h2 class="page_title"><?php echo the_title();?></h2>
        <h3 class="page_title"><?php echo get_field("sub_titulo");?></h3>
        <section class="entry-content content-box">
            <img src="<?php echo get_field('imagen'); ?>" width="400px" class="alignleft">
            <?php echo get_field('descripcion'); ?>
        </section>    
        
            <h3>Articulos</h3>
            <?php 
                $articulos = get_field("articulos");
                for($i=0;$i<sizeof($articulos);$i++){
                    get_singlearticulo_revista($articulos[$i]);
                }
                
            ?>
        
        <?php //get_template_part( 'entry' ); ?>
        <?php endwhile; endif; ?>
    </div>
</div>      

<?php get_footer(); ?>