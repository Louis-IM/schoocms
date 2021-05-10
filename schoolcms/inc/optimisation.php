<?php
/*Preload fonts*/
add_action( 'wp_head', 'themeprefix_load_fonts' ); 
function themeprefix_load_fonts() {  ?> 
<! – Code snippet to speed up Google Fonts rendering: googlefonts.3perf.com – > 
<link rel="dns-prefetch" href="https://fonts.gstatic.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous"> 
<link rel="preload" href="https://fonts.googleapis.com/css?family=Crimson+Pro:400,700&display=swap" as="fetch" crossorigin="anonymous">
<link rel="preload" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" as="fetch" crossorigin="anonymous"> 
<script type="text/javascript"> !function(e,n,t){"use strict";var o="https://fonts.googleapis.com/css?family=Roboto",r="__3perf_googleFontsStylesheet";function c(e){(n.head||n.body).appendChild(e)}function a(){var e=n.createElement("link");e.href=o,e.rel="stylesheet",c(e)}function f(e){if(!n.getElementById(r)){var t=n.createElement("style");t.id=r,c(t)}n.getElementById(r).innerHTML=e}e.FontFace&&e.FontFace.prototype.hasOwnProperty("display")?(t[r]&&f(t[r]),fetch(o).then(function(e){return e.text()}).then(function(e){return e.replace(/@font-face {/g,"@font-face{font-display:swap;")}).then(function(e){return t[r]=e}).then(f).catch(a)):a()}(window,document,localStorage); 
</script> 
<! – End of code snippet for Google Fonts – > 

<link rel="preload" as="fetch" href="<?php echo get_template_directory_uri() . '/fonts/fontawesome/css/all.min.css'?>">
<link rel="preload" as="font" type="font/woff2" crossorigin href="<?php echo get_template_directory_uri() . '/fonts/fontawesome/webfonts/fa-brands-400.woff2'?>"/>
<link rel="preload" as="font" type="font/woff2" crossorigin href="<?php echo get_template_directory_uri() . '/fonts/fontawesome/webfonts/fa-solid-900.woff2'?>"/>
<link rel="preload" as="font" type="font/woff2" crossorigin href="http://schooc46.vm001.innermedia.co.uk/wp-content/plugins/custom-twitter-feeds-pro/fonts/fontawesome-webfont.woff?v=4.6.1"/>
<link rel="preload" as="font" type="font/woff2" crossorigin href="http://schooc46.vm001.innermedia.co.uk/wp-content/plugins/custom-twitter-feeds-pro/fonts/fontawesome-webfont.woff"/>


    <?php 
}
?>