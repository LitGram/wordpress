<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="container">
            <div class="header-content">
                <nav>
                    <div class="logo">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo '<a href="' . esc_url(home_url('/')) . '"><i class="fas fa-book-reader"></i> ' . get_bloginfo('name') . '</a>';
                        }
                        ?>
                    </div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2,
                    ));
                    ?>
                </nav>
                <div class="auth-buttons">
                    <?php if (is_user_logged_in()): ?>
                        <a href="<?php echo esc_url(home_url('/study-guides')); ?>" class="btn btn-primary">Study Guides</a>
                        <button id="logoutBtn" class="btn btn-secondary">Logout</button>
                    <?php else: ?>
                        <button id="loginBtn" class="btn btn-secondary">Login</button>
                        <button id="signupBtn" class="btn btn-primary">Sign Up</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Login to Your Account</h2>
            <form id="loginForm">
                <input type="text" name="username" placeholder="Username or Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <!-- Signup Modal -->
    <div id="signupModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Create an Account</h2>
            <form id="signupForm">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>