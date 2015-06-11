<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	/**************************************************************************************************************************/	
function print_array($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}
function array_contain($what, $where, $pos){		
	for($i=0; $i<sizeof($where);$i++){
		if($pos==null){				
			if($what == $where[$i]) return $i+1;
		}else{
			if($what == $where[$i][$pos-1]) return $i+1;
		}
		
	}
	return false;
}
function minimizer_string($cadena){
	$conv = array("á"=>"a","é"=>"e","í"=>"i","ó"=>"o","ú"=>"u","Á"=>"A","É"=>"E","Í"=>"I","Ó"=>"O","Ú"=>"U");
	$tofind = "áéíóúÁÉÍÓÚ";
	$replac = "aeiouAEIOU";
	return(strtr($cadena,$conv));
}	
function get_category_parent($term_id){
		$parent = get_term_by('id',  $term_id, 'area');
		$counter = 0;
		while($parent->parent!='0'&& $counter < 5){
			$parent = get_term_by('id',  $parent->parent, 'area');
			$counter++;
		}
		return $parent->term_id;
}



function the_excerpt_max_charlength($postid, $charlength) {
	$excerpt = get_field('descripcion', $postid);
	$charlength++;
	$return = "";
	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			$return.= mb_substr( $subex, 0, $excut );
		} else {
			$return.= $subex;
		}
		$return.= '[...]';
	} else {
		$return.= $excerpt;
	}
	return $return;
}
	
/******************************************************************************************************/
    include_once 'blocks/sidebar.php';
    include_once 'blocks/autor.php';
    include_once 'blocks/recurso.php';
    include_once 'blocks/enlace.php';
    include_once 'blocks/articulo.php';
?>