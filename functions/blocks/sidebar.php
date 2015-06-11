<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_mysidebar(){
    ?>
<div id="sidebar_header">
    <form class="searchform form-inline">
        <div class="form-group">
            <label for="search_text"><h4>Buscar</h4></label> <input type="text" id="search_text" class="form-control" name="search_text" placeholder="Buscar">
        </div>
    </form>
</div>
<div id="sidebar_body">
    <div class="sidebar_content">
        <h3>Autores</h3>
        <?php get_autorbox(2);?>
    </div>
    <br>
    <div class="sidebar_content">
        <h3>Recursos</h3>
        <?php get_recursobox(2);?>
    </div> 
    <br>
    <div class="sidebar_content">
        <h3>Enlace</h3>
        <?php get_enlacebox(2);?>
    </div>     
</div>
    <?php  
}