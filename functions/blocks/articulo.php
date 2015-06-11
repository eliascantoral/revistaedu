<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_articulobox($number = 1){

        // WP_Query arguments
        $args = array (
                'post_type'              => 'articulo',                
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
                            <div class="articulo-box">  
                                <div class="articulo-box-header">
                                    <h2 class="media-heading"><?php echo the_title();?> </h2>
                                    <?php echo the_excerpt_max_charlength(get_the_ID(),200);?><br>
                                    <div class="button-seemore"><a href="<?php echo get_permalink();?>"> ver más >></a></div>                                    
                                </div>
                                <img src="<?php 
                                    $thumbID = get_post_thumbnail_id( get_the_ID() );
                                    $imgDestacada = wp_get_attachment_url( $thumbID );
                                    echo $imgDestacada;
                                ?>" width="100%">

                            </div>
                        <?php                                            
                }
        } else {
                // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
}
function get_singlearticulo($articulo){
    ?>
                            <div class="media">
                              <div class="media-body">
                                <a href="<?php echo get_field('url',$enlace);?>">
                                    <h4 class="media-heading"><?php echo the_title();?> </h4>
                                    <?php echo get_field('url',$enlace);?>
                                </a>
                              </div>                               
                            </div>  
    <?php 
}