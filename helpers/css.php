<?php
$css_file = 'http://localhost/php1_ass_ph29220/public/css/app.css';
$css_responsive = 'http://localhost/php1_ass_ph29220/public/css/responsiveP.css';
$grid_css = 'http://localhost/php1_ass_ph29220/public/css/bootstrap-grid.css';
$gridmap_css = 'http://localhost/php1_ass_ph29220/public/css/bootstrap-grid.css.map';

function css_file()
{
    return $GLOBALS['css_file'];
}
function grid_css()
{
    return $GLOBALS['grid_css'];
}
function gridmap_css()
{
    return $GLOBALS['gridmap_css'];
}
function css_responsive()
{
    return $GLOBALS['css_responsive'];
}