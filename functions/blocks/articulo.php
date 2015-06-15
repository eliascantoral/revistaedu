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
          <div class="media-left media-top">
              <a href="<?php echo get_permalink($articulo);?>">
                  <img class="media-object" src="<?php 
                                    $thumbID = get_post_thumbnail_id( $articulo);
                                    $imgDestacada = wp_get_attachment_url( $thumbID );
                                    echo $imgDestacada;
                                ?>" alt="<?php echo get_the_title($articulo);?> " width="70px">
              </a>
          </div>
          <div class="media-body">
            <a href="<?php echo get_permalink($articulo);?>">
                <h4 class="media-heading"><?php echo get_the_title($articulo);?> </h4>
                    <?php echo the_excerpt_max_charlength($articulo,50);?>
            </a>
          </div>
        </div>  
    <?php 
}

function get_singlearticulo_revista($articulo){
    echo $articulo;
    ?>
        <div class="recurso-box">  
            <div class="recurso-box-header">
                <h2 class="media-heading"><?php echo get_the_title($articulo);?> </h2>
                <?php echo the_excerpt_max_charlength($articulo,70);?><br>
                <div class="button-seemore"><a href="<?php echo get_permalink($articulo);?>"> ver más >></a></div>                                    
            </div>
            <img class="media-object" src="<?php 
                                    $thumbID = get_post_thumbnail_id( $articulo);
                                    $imgDestacada = wp_get_attachment_url( $thumbID );
                                    echo $imgDestacada;
                                ?>" alt="<?php echo get_the_title($articulo);?>" width="100%">

        </div>   
    <?php 
}

function get_articulosbytema($tema){

        // WP_Query arguments
        $args = array (
                'post_type'              => 'articulo',                
                'post_status'            => 'publish',
                'order'                  => 'DESC',
                'cat'                    => $tema,
                'posts_per_page'         => 20,
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
                                    <?php echo the_excerpt_max_charlength(get_the_ID(),200);?><br>
                                    <div class="button-seemore"><a href="<?php echo get_permalink();?>"> ver más >></a></div>                                    
                                </div>
                                <img class="media-object" src="<?php 
                                                        $thumbID = get_post_thumbnail_id( get_the_ID());
                                                        $imgDestacada = wp_get_attachment_url( $thumbID );
                                                        echo $imgDestacada;
                                                    ?>" alt="<?php echo the_title();?>" width="100%">

                            </div>
                        <?php                                            
                }
        } else {
                // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();    
}

function get_articulosbysearch($s){
        $articulos = array();
        // WP_Query arguments
        $args = array (
                'post_type'              => 'articulo',                
                'post_status'            => 'publish',
                'order'                  => 'DESC',
                'posts_per_page'         => 20,
                'meta_query'	=> array(
                        'relation'		=> 'OR',
                        array(
                                'key'		=> 'descripcion',
                                'value'		=> $s,
                                'compare'	=> 'LIKE'
                        ),
                        array(
                                'key'		=> 'title',
                                'value'		=> $s,
                                'compare'	=> 'LIKE'
                        )
                )            
        );

        // The Query
        $the_query = new WP_Query( $args ); 
        // The Loop
        if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        array_push($articulos, get_the_ID());                                          
                }
        }  
        $args = array (
                'post_type'              => 'articulo',                
                'post_status'            => 'publish',
                'order'                  => 'DESC',   
                's'                      => $s,
                'posts_per_page'         => 20,
        );

        // The Query
        $the_query = new WP_Query( $args ); 
        // The Loop
        if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        if(!array_contain(get_the_ID(), $articulos, 0)){array_push($articulos, get_the_ID());}
                                                                  
                }
        }    
        ///print_array($articulos);
        if(sizeof($articulos)>0){
                for($i=0;$i<sizeof($articulos);$i++){                 
                    ?>
                    <div class="recurso-box">  
                        <div class="recurso-box-header">
                            <h2 class="media-heading"><?php echo get_the_title($articulos[$i]);?> </h2>
                            <?php echo the_excerpt_max_charlength($articulos[$i],200);?><br>
                            <div class="button-seemore"><a href="<?php echo get_permalink($articulos[$i]);?>"> ver más >></a></div>                                    
                        </div>
                        <img class="media-object" src="<?php 
                                                $thumbID = get_post_thumbnail_id( $articulos[$i]);
                                                $imgDestacada = wp_get_attachment_url( $thumbID );
                                                echo $imgDestacada;
                                            ?>" alt="<?php echo get_the_title($articulos[$i]);?>" width="100%">

                    </div>
                <?php 
                }              
        }else{
            echo '<h3>No se encontraron articulos relacionados.</h3>';
        }
        wp_reset_postdata();
}