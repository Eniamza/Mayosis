<?php
if (file_exists(get_template_directory() . '/admin/tgm/tgm-init.php')) {
    require_once get_template_directory() . '/admin/tgm/tgm-init.php';
}

if (file_exists(get_template_directory() . '/admin/admin-pages/admin.php')) {
    require_once get_template_directory() . '/admin/admin-pages/admin.php';
}


if (!is_customize_preview()  && is_admin() ) {
require_once get_parent_theme_file_path( '/admin/theme_wizard/vendor/autoload.php' );
require_once get_parent_theme_file_path( '/admin/theme_wizard/class-merlin.php' );
require_once get_parent_theme_file_path( '/admin/theme_wizard/merlin-config.php' );
require_once get_parent_theme_file_path( '/admin/theme_wizard/marlin-demo.php' );

}

