<?php
// Note: Database constants are set in the automatically-generated
// local-config-db.php. Change these via your config.local.yaml instead.

// Loopback connections can suck, disable if you don't need cron
# define( 'DISABLE_WP_CRON', true );

// You'll probably want Automatic Updates disabled during development
define( 'AUTOMATIC_UPDATER_DISABLED', true );

// You'll probably want debug logging during development
define( 'WP_DEBUG_LOG', true );

// Multisite
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);

define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wordpress-stuff' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress-stuff' );
