<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_recursobox($number = 1){

        // WP_Query arguments
        $args = array (
                'post_type'              => 'recurso',                
                'posts_per_page'         => $number,
                'orderby'                => 'rand',
        );

        // The Query
        $the_query = new WP_Query( $args ); 
        // The Loop
        if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                            <div class="media">
                              <div class="media-body">
                                <a href="<?php echo get_permalink(); ?>">
                                    <h4 class="media-heading"><?php echo the_title();?> </h4>
                                        <?php echo the_excerpt_max_charlength(get_the_ID(),50);?>
                                </a>
                              </div>
                              <div class="media-left media-top">
                                  <a href="<?php echo get_permalink(); ?>">
                                      <img class="media-object" src="<?php echo get_field('imagen');?>" alt="<?php echo the_title();?>" width="70px">
                                  </a>
                              </div>                                
                            </div>  
                            <hr>
                        <?php                                            
                }
        } else {
                // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
}
function get_allrecurso($number = -1){

        // WP_Query arguments
        $args = array (
                'post_type'              => 'recurso',
                'post_status'            => 'publish',
                'posts_per_page'         => $number,
                'order'                  => 'DESC',
        );

        // The Query
        $the_query = new WP_Query( $args ); 
        // The Loop
        if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                            <div class="recurso-box">  
                                <div class="recurso-box-header">
                                    <h2 class="media-heading"><?php echo the_title();?> </h2>
                                    <?php echo the_excerpt_max_charlength(get_the_ID(),70);?><br>
                                    <div class="button-seemore"><a href="<?php echo get_permalink();?>"> ver más >></a></div>                                    
                                </div>
                                <img class="media-object" src="<?php echo get_field('imagen');?>" alt="<?php echo the_title();?>" width="100%">

                            </div>                          
                            
                        <?php                                            
                }
        } else {
                // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
}
function get_recursoenlace($recurso){
    ?>
        <div class="media">
          <div class="media-left media-top">
              <a href="<?php echo get_permalink($recurso); ?>">
                  <img class="media-object" src="<?php echo get_field('foto',$recurso);?>" alt="<?php echo the_title($recurso);?>" width="70px">
              </a>
          </div>
          <div class="media-body">
            <a href="<?php echo get_permalink($recurso); ?>">
                <h4 class="media-heading"><?php echo the_title($recurso);?> </h4>
                    <?php echo the_excerpt_max_charlength($recurso,50);?>
            </a>
          </div>
        </div>  
    <?php 
}