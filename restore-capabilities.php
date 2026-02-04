<?php
/**
 * Diagnostic and Restore Script
 * URL: http://yourdomain.com/wp-content/themes/novo2026/restore-capabilities.php
 * DELETE THIS FILE AFTER USE!
 */

// Load WordPress
require_once('../../../../../wp-load.php');

// Check if user is admin
if (!current_user_can('administrator')) {
    die('You must be an administrator to run this script.');
}

echo "<h2>Role Capabilities Diagnostic</h2>";

// Check current capabilities
$roles_to_check = ['editor', 'author', 'contributor'];

foreach ($roles_to_check as $role_name) {
    $role = get_role($role_name);
    if ($role) {
        echo "<h3>" . ucfirst($role_name) . " Role</h3>";
        echo "<strong>Capabilities:</strong><br>";
        echo "<pre>";
        print_r($role->capabilities);
        echo "</pre>";
    }
}

// Get action parameter
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action === 'restore') {
    echo "<hr><h2>Restoring Capabilities...</h2>";
    
    // Restore Editor capabilities
    $editor = get_role('editor');
    if ($editor) {
        $editor->add_cap('edit_posts');
        $editor->add_cap('publish_posts');
        $editor->add_cap('delete_posts');
        $editor->add_cap('edit_published_posts');
        $editor->add_cap('delete_published_posts');
        $editor->add_cap('edit_others_posts');
        $editor->add_cap('delete_others_posts');
        echo "✓ Editor capabilities restored<br>";
    }
    
    // Restore Author capabilities
    $author = get_role('author');
    if ($author) {
        $author->add_cap('edit_posts');
        $author->add_cap('publish_posts');
        $author->add_cap('delete_posts');
        $author->add_cap('edit_published_posts');
        $author->add_cap('delete_published_posts');
        echo "✓ Author capabilities restored<br>";
    }
    
    // Restore Contributor capabilities
    $contributor = get_role('contributor');
    if ($contributor) {
        $contributor->add_cap('edit_posts');
        $contributor->add_cap('delete_posts');
        echo "✓ Contributor capabilities restored<br>";
    }
    
    echo "<br><strong>Done! Refresh the page to see updated capabilities.</strong><br>";
} else {
    echo "<hr><p><a href='?action=restore' style='background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; display: inline-block;'>Click here to RESTORE capabilities</a></p>";
}

echo "<br><strong style='color:red;'>IMPORTANT: Delete this file after use for security!</strong>";
?>
