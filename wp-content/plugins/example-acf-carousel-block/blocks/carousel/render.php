<?php
/**
 * Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 *
 * @package wpdev
 */

global $post;
$posts_field = get_field( 'posts' );
?>
<section <?php echo ( ! $is_preview ) ? get_block_wrapper_attributes() : ''; ?>>
	<?php if ( $posts_field ) : ?>
		<div class="is-carousel">
			<?php foreach ( $posts_field as $post ) : ?>
				<?php setup_postdata( $post ); 
					$date_month = date("M", strtotime($post->post_date));
					$date_number = date("j", strtotime($post->post_date));
				?>
				<div class="wp-block-acf-carousel--item">
					<div class="carousel-block-image-category-post">
						<a class="carousel-image-posts" href="<?php echo esc_url( get_the_permalink() ); ?>">
							<div>
								<div class="date-post">
									<span class="number-date-post"><?php echo $date_number ?></span>
									<span class="month-date-post"><?php echo $date_month ?></span>
								</div>
							</div>
							<?php the_post_thumbnail( 'full' ); ?>
						</a>
						<div class="category-post">
							<div>
									<span>
										<?php
											$categories = get_the_category( $post );
											if( $categories ){
												foreach( $categories as $category ) {
													echo $category->cat_name;
												}
											}
										?>
									</span>
								</div>
							</div>
					</div>
					<h2 class="title-post">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo wp_kses_post( get_the_title() ); ?></a>
					</h2>
					<h2 class="author-post">
						<span>Posted by</span>
						<img src="http://test-task-web-design-sun/wp-content/uploads/2023/11/Avatar.png" alt="avatar">
						<span><?php the_author(); ?></span>
					</h2>
					<h2 class="desc-post">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo wp_kses_post( the_content() ); ?></a>
					</h2>
					<div class="link-post">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>">Continue reading</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php else : ?>
		<p>No posts selected.</p>
	<?php endif; ?>
</section>
