<?php
function litgram_study_setup() {
    // Existing theme setup code...

    // Add support for custom post type
    add_theme_support('post-thumbnails', array('post', 'page', 'study_guide'));
}
add_action('after_setup_theme', 'litgram_study_setup');

function litgram_study_enqueue_scripts() {
    // Existing enqueue code...

    // Localize the script with new data
    $script_data = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('litgram_study_nonce')
    );
    wp_localize_script('litgram-study-main', 'litgramStudy', $script_data);
}
add_action('wp_enqueue_scripts', 'litgram_study_enqueue_scripts');

// Register custom post type for Study Guides
function litgram_study_register_post_types() {
    $args = array(
        'public' => true,
        'label'  => 'Study Guides',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'study-guides'),
    );
    register_post_type('study_guide', $args);
}
add_action('init', 'litgram_study_register_post_types');

// Handle user registration
function litgram_study_register_user() {
    check_ajax_referer('litgram_study_nonce', 'nonce');

    $username = sanitize_user($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];

    $user_id = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
        wp_send_json_error($user_id->get_error_message());
    } else {
        wp_send_json_success('Registration successful. Please log in.');
    }
}
add_action('wp_ajax_nopriv_register_user', 'litgram_study_register_user');

// Handle user login
function litgram_study_login_user() {
    check_ajax_referer('litgram_study_nonce', 'nonce');

    $credentials = array(
        'user_login' => $_POST['username'],
        'user_password' => $_POST['password'],
        'remember' => true
    );

    $user = wp_signon($credentials, false);

    if (is_wp_error($user)) {
        wp_send_json_error($user->get_error_message());
    } else {
        wp_send_json_success('Login successful.');
    }
}
add_action('wp_ajax_nopriv_login_user', 'litgram_study_login_user');

// Handle user logout
function litgram_study_logout_user() {
    check_ajax_referer('litgram_study_nonce', 'nonce');
    wp_logout();
    wp_send_json_success('Logout successful.');
}
add_action('wp_ajax_logout_user', 'litgram_study_logout_user');