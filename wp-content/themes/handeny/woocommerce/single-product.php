<?php get_header() ?>
    <main>
		<?php 
			global $post;
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		?>                             
		<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
		<?php wp_title(); ?>
        <?php the_content(); ?>
    </main>
<?php get_footer() ?>