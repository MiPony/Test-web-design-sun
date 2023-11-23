<?php get_header() ?>
    <main>
        <?php wp_title(); ?>       
        <?php the_post_thumbnail(); ?>
        <?php the_content(); ?>
    </main>
<?php get_footer() ?>