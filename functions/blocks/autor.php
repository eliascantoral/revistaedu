<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_autorbox($number = 1){

        // WP_Query arguments
        $args = array (
                'post_type'              => 'autor',
                'post_status'            => 'publish',
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
                              <div class="media-left media-top">
                                  <a href="<?php echo get_permalink(); ?>">
                                      <img class="media-object" src="<?php echo get_field('foto');?>" alt="<?php echo the_title();?>" width="70px">
                                  </a>
                              </div>
                              <div class="media-body">
                                <a href="<?php echo get_permalink(); ?>">
                                    <h4 class="media-heading"><?php echo the_title();?> </h4>
                                        <?php echo the_excerpt_max_charlength(get_the_ID(),50);?>
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
function get_allautor($number = -1){

        // WP_Query arguments
        $args = array (
                'post_type'              => 'autor',
                'post_status'            => 'publish',
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
                            <div class="autor-box">
                                <a href="<?php echo get_permalink(); ?>"><h3 class="media-heading"><?php echo the_title();?> </h3></a>
                                <div class="media">
                                  <div class="media-left media-top">
                                      <a href="<?php echo get_permalink(); ?>">
                                          <img class="media-object" src="<?php echo get_field('foto');?>" alt="<?php echo the_title();?>" width="90px">
                                      </a>
                                  </div>
                                  <div class="media-body">
                                    <a href="<?php echo get_permalink(); ?>">

                                            <?php echo the_excerpt_max_charlength(get_the_ID(),300);?>
                                    </a>
                                  </div>
                                </div>  
                            </div>
                            
                        <?php                                            
                }
        } else {
                // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
}
function get_singleautor($autor){
    ?>
        <div class="media">
          <div class="media-left media-top">
              <a href="<?php echo get_permalink($autor); ?>">
                  <img class="media-object" src="<?php echo get_field('foto',$autor);?>" alt="<?php echo the_title($autor);?>" width="70px">
              </a>
          </div>
          <div class="media-body">
            <a href="<?php echo get_permalink($autor); ?>">
                <h4 class="media-heading"><?php echo get_the_title($autor);?> </h4>
                    <?php echo the_excerpt_max_charlength($autor,50);?>
            </a>
          </div>
        </div>  
    <?php 
}

function get_articulosbyautor($autor, $number = 5){    
    $retorno = array();
        // WP_Query arguments
    $args = array (
            'post_type'              => 'articulo',                
            'post_status'            => 'publish',
            'posts_per_page'         => -1,
            'order'                  => 'DESC',                
    );

    // The Query
    $the_query = new WP_Query( $args ); 
    // The Loop
    if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    $autores = get_field('autores');
                    $autores = $autores[0][autor];
                    if(array_contain($autor, $autores, 0)){
                        array_push($retorno, get_the_ID());
                    }
                    if(sizeof($retorno)>$number){ wp_reset_postdata();return $retorno;}
            }
    } else {
            // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();    
    return $retorno;
}