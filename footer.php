<footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <p><?php echo get_theme_mod('footer_about_text', 'LitGram Study is dedicated to providing personalized learning experiences for students worldwide.'); ?></p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'depth' => 1,
                    ));
                    ?>
                </div>
                <div class="footer-section">
                    <h3>Connect With Us</h3>
                    <div class="social-icons">
                        <?php
                        $social_links = array(
                            'facebook' => get_theme_mod('social_facebook'),
                            'twitter' => get_theme_mod('social_twitter'),
                            'instagram' => get_theme_mod('social_instagram'),
                            'linkedin' => get_theme_mod('social_linkedin')
                        );

                        foreach ($social_links as $platform => $link) {
                            if ($link) {
                                echo '<a href="' . esc_url($link) . '"><i class="fab fa-' . $platform . '"></i></a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>