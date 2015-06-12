<?php get_header(); ?>
<div class="row">
    <div class="col-md-8">
        <section id="content" role="main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="header">
            <h2 class="entry-title page_title"><?php the_title(); ?></h2>
        </header>
        <section class="entry-content content-box">
            <?php the_content(); ?>
        </section>
        </article>
        <?php endwhile; endif; ?>
        </section>
    </div>
  <div class="col-md-4">
      <?php get_mysidebar();?>      
  </div>
</div>        
<?php get_footer(); ?>