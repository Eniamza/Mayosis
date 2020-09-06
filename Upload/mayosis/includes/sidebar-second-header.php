<?php

if (!defined('ABSPATH'))
	{
	exit; // Exit if accessed directly.
	}
$collapsebuttonshow= get_theme_mod( 'collapse_button','on');
 $headertypestcked = get_theme_mod( 'header_transparency','normal');
?>
<?php if ($headertypestcked == 'transparent'): ?>
        <header id="main-header" class="main-header header-stacked mayosis-sidenav-extra-header">
      <?php else: ?>
        <header id="main-header" class="main-header mayosis-sidenav-extra-header">
       <?php endif; ?>

                <div class="hidden-sm hidden-xs">
                    <?php if($collapsebuttonshow == 'on') :?>
                     <div class="mayosis-collapsible-box">
                            <button type="button" id="mayosis-sidebarCollapse" class="mayosis-collapse-btn">
                                <i class="zil zi-bars"></i>
                               
                            </button>
                       </div>
                       <?php endif; ?>
                   	<?php
		get_template_part('includes/header/header', 'container');
	?>
                </div>
                
                </header>