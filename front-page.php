<?php get_header(); ?>

<main>
    <section id="home" class="hero">
        <div class="container">
            <h1><?php echo get_theme_mod('hero_title', 'Unlock Your Learning Potential'); ?></h1>
            <p><?php echo get_theme_mod('hero_description', 'Join LitGram Study for personalized learning experiences and expert-curated study guides.'); ?></p>
            <button id="ctaButton" class="btn btn-primary"><?php echo get_theme_mod('hero_cta_text', 'Get Started'); ?></button>
        </div>
    </section>

    <section id="features">
        <div class="container">
            <h2><?php echo get_theme_mod('features_title', 'Why Choose LitGram Study?'); ?></h2>
            <div class="features">
                <?php
                $features = array(
                    array(
                        'icon' => 'brain',
                        'title' => 'Personalized Learning',
                        'description' => 'Tailored study plans to match your unique learning style and goals.'
                    ),
                    array(
                        'icon' => 'users',
                        'title' => 'Expert Instructors',
                        'description' => 'Learn from industry professionals and experienced educators.'
                    ),
                    array(
                        'icon' => 'mobile-alt',
                        'title' => 'Study Anywhere',
                        'description' => 'Access your study materials on any device, anytime, anywhere.'
                    )
                );

                foreach ($features as $index => $feature) :
                    $icon = get_theme_mod("feature_{$index}_icon", $feature['icon']);
                    $title = get_theme_mod("feature_{$index}_title", $feature['title']);
                    $description = get_theme_mod("feature_{$index}_description", $feature['description']);
                ?>
                    <div class="feature">
                        <i class="fas fa-<?php echo esc_attr($icon); ?> fa-3x"></i>
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($description); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="pricing">
        <div class="container">
            <h2><?php echo get_theme_mod('pricing_title', 'Choose Your Plan'); ?></h2>
            <div class="pricing-plans">
                <?php
                $plans = array(
                    array(
                        'icon' => 'seedling',
                        'name' => 'Basic',
                        'price' => '₹100',
                        'features' => array(
                            'Access to basic study guides',
                            'Limited personalized learning',
                            'Email support'
                        )
                    ),
                    array(
                        'icon' => 'tree',
                        'name' => 'Pro',
                        'price' => '₹200',
                        'features' => array(
                            'Access to all study guides',
                            'Full personalized learning',
                            'Priority email support',
                            'Monthly webinars',
                            'Original fiction reading'
                        )
                    ),
                    array(
                        'icon' => 'gem',
                        'name' => 'Premium',
                        'price' => '₹400',
                        'features' => array(
                            'Everything in Pro plan',
                            'One-on-one tutoring sessions',
                            '24/7 phone support',
                            'Exclusive study materials',
                            'Advanced original fiction reading'
                        )
                    )
                );

                foreach ($plans as $index => $plan) :
                    $icon = get_theme_mod("plan_{$index}_icon", $plan['icon']);
                    $name = get_theme_mod("plan_{$index}_name", $plan['name']);
                    $price = get_theme_mod("plan_{$index}_price", $plan['price']);
                    $features = get_theme_mod("plan_{$index}_features", $plan['features']);
                ?>
                    <div class="plan">
                        <i class="fas fa-<?php echo esc_attr($icon); ?> fa-3x"></i>
                        <h3><?php echo esc_html($name); ?></h3>
                        <p class="price"><?php echo esc_html($price); ?>/month</p>
                        <ul>
                            <?php foreach ($features as $feature) : ?>
                                <li><i class="fas fa-check"></i> <?php echo esc_html($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button class="btn btn-primary subscribe-btn">Subscribe</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="testimonials">
        <div class="container">
            <h2><?php echo get_theme_mod('testimonials_title', 'What Our Students Say'); ?></h2>
            <div class="testimonial-grid">
                <?php
                $testimonials = array(
                    array(
                        'image' => 'https://i.pravatar.cc/150?img=1',
                        'content' => 'LitGram Study has transformed my learning experience. The personalized approach really works!',
                        'name' => 'Sarah J.'
                    ),
                    array(
                        'image' => 'https://i.pravatar.cc/150?img=2',
                        'content' => 'The expert instructors and comprehensive study guides have helped me ace my exams.',
                        'name' => 'Mike T.'
                    ),
                    array(
                        'image' => 'https://i.pravatar.cc/150?img=3',
                        'content' => 'Studying on-the-go has never been easier. I love the mobile accessibility of LitGram Study!',
                        'name' => 'Emily R.'
                    )
                );

                foreach ($testimonials as $index => $testimonial) :
                    $image = get_theme_mod("testimonial_{$index}_image", $testimonial['image']);
                    $content = get_theme_mod("testimonial_{$index}_content", $testimonial['content']);
                    $name = get_theme_mod("testimonial_{$index}_name", $testimonial['name']);
                ?>
                    <div class="testimonial">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>" class="testimonial-img">
                        <p>"<?php echo esc_html($content); ?>"</p>
                        <p class="testimonial-name">- <?php echo esc_html($name); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <h2><?php echo get_theme_mod('contact_title', 'Get in Touch'); ?></h2>
            <?php echo do_shortcode('[contact-form-7 id="' . get_theme_mod('contact_form_id') . '" title="Contact form"]'); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>