<?php
/*
Template Name: Study Guides
*/

get_header();
?>

<main id="study-guides">
    <div class="container">
        <h1><?php the_title(); ?></h1>

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'study_guide',
            'posts_per_page' => 10,
            'paged' => $paged
        );
        $study_guides = new WP_Query($args);

        if ($study_guides->have_posts()) :
            while ($study_guides->have_posts()) : $study_guides->the_post();
        ?>
            <div class="study-guide-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="study-guide-thumbnail">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>
                <div class="study-guide-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
            </div>
        <?php
            endwhile;

            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('Previous', 'litgram-study'),
                'next_text' => __('Next', 'litgram-study'),
            ));

            wp_reset_postdata();
        else :
        ?>
            <p><?php _e('No study guides found.', 'litgram-study'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>