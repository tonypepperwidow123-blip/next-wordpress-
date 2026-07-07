<?php
// Prevent unauthorized access
if ( ! isset( $_GET['run'] ) ) {
    die('Access denied');
}

define('WP_USE_THEMES', false);
// Locate wp-load.php by climbing up directories
$path = dirname( __FILE__ );
while ( $path && $path !== '/' && ! file_exists( $path . '/wp-load.php' ) ) {
    $path = dirname( $path );
}

if ( ! file_exists( $path . '/wp-load.php' ) ) {
    die('Could not load WordPress.');
}

require_once( $path . '/wp-load.php' );

$active_plugins = get_option( 'active_plugins' );
echo "<h3>Current Active Plugins:</h3><pre>";
print_r( $active_plugins );
echo "</pre>";

$cleaned = false;
if ( is_array( $active_plugins ) ) {
    $new_active = [];
    foreach ( $active_plugins as $plugin ) {
        // A valid plugin entry should be a string and contain a slash and end in .php, or just be a .php file
        if ( is_string( $plugin ) && trim( $plugin ) !== '' && strpos( $plugin, '.php' ) !== false ) {
            $new_active[] = $plugin;
        } else {
            $cleaned = true;
            echo "<p style='color:red;'>Removing invalid plugin entry: " . var_export($plugin, true) . "</p>";
        }
    }
    
    if ( $cleaned ) {
        update_option( 'active_plugins', $new_active );
        echo "<p style='color:green;'>Active plugins updated successfully!</p>";
        echo "<h3>New Active Plugins:</h3><pre>";
        print_r( $new_active );
        echo "</pre>";
    } else {
        echo "<p style='color:blue;'>No invalid entries found in active_plugins.</p>";
    }
}
