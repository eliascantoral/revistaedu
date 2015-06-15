<?php get_header(); ?>
<section id="content" role="main">
<header class="header">
<h2 class="entry-title"><?php _e( 'Articulos: ', 'blankslate' ); ?><?php single_cat_title(); ?></h2>
<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
</header>
<?php 
    get_articulosbytema($_GET["cat"]);
?>
</section>
<?php get_footer(); ?>