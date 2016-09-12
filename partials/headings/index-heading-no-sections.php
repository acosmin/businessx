<?php
/* ------------------------------------------------------------------------- *
 *	Index heading - no sections template					
/* ------------------------------------------------------------------------- */
?>

<header id="top-header" class="grid-wrap index-heading heading-full-width clearfix"<?php businessx_ch_parallax(); ?>>
	<div class="grid-overlay"></div>
	<div class="sec-hs-elements ta-center">
    	<h2 class="hs-primary-large"><?php _e( 'Businessx Extensions is not activated!', 'businessx' ) ?></h2>
    </div>
</header>

<section role="main" id="content" class="grid-wrap">
	<div class="grid-container grid-1 padding-small clearfix">
    	<main id="main" class="grid-col grid-4x-col site-main clearfix" role="main">
    		<p class="alert alert-warning ta-center">
                <?php 
				printf( __( 'You need %s activated to display sections. Activate the plugin first!', 'businessx' ), 
						'<b><a href="https://wordpress.org/plugins/businessx-extensions/">' . __( 'Businessx Extensions', 'businessx' ) . '</a></b>' ); 
				?> 
			</p>
        </main>
    </div>
</section>