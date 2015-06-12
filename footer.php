<div class="clear"></div>
<footer id="footer" role="contentinfo">
<div class="row">
    <div class="col-xs-6 col-md-4">
        <div id="copyright">
        <?php echo sprintf( __( '%1$s %2$s %3$s. Todos los derechos reservados.', 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo ' Tema por:'.'<a href="http://aemcode.com/">@emcode</a>' ; ?>
        </div>        
    </div>
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4">
        <?php 
                //$pageslider = get_field("slider");
                $the_slider = get_field("social","options");
                if($the_slider){
                        for($i=0;$i<sizeof($the_slider);$i++){?>
                            <a href="<?php echo $the_slider[$i][url]?>" target="_blank">
                                <img src="<?php echo $the_slider[$i][imagen]?>" width="50px">
                            </a>
                        <?php }
                }

        ?>
  </div>
</div>   


</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>