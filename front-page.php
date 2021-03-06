<?php get_header(); ?>

<div id="home-desktop-map-container">

	<div id="planner-wrap">
		<div id="planner">

			<?php get_template_part( 'home-planner'); ?>

		</div> <!-- end #trip-planner-container -->
	</div><!-- end #planner-wrap -->

	<div id="map-wrap" class="mobile-hide">

		<?php
		$svg = file_get_contents(get_theme_file_path('library/images/marta-map.svg'));
		echo $svg;
		?>

		<div id="route-legend">

			<?php
			$rquery = get_posts(array(
				'post_type' => 'route',
				'numberposts' => -1,
				'orderby' => 'meta_value_num',
				'meta_key' => 'route_sort_order',
				'order' => 'ASC',
				'post__not_in' => array(6437, 6439),

			));
			foreach($rquery as $route) {
				echo marta_name_link(null, $route->ID);
			}
			?>

		</div>
	</div>

		<a href="interactive-system-map/" class="mobile-only home-map-link">Interactive System Map &rarr;</a>

	<div id="alerts-wrap">
		<?php tcp_do_alerts( array('collapse' => 'false', 'sep_affected' => ' ' ) ); ?>
	</div>

</div><!-- end #home-desktop-map-container -->

<div id="home-secondary-container" class="clear">

	<div id="home-news-area">
		<h2>News<a href="./news">See all news &raquo;</a></h2>
		<?php
		$news_query = new WP_Query( array(
			'posts_per_page'	=> 3,
		) );
		if ( $news_query->have_posts() ) :
		?>
		<div id="news-container">
				<?php
				while ( $news_query->have_posts() ) : $news_query->the_post();
					$background = '';
					if ( has_post_thumbnail() ) {
						$background = 'style="background-image: url(' . get_the_post_thumbnail_url(null,'medium') . ')" ';
					} ?>
					<a class="news-card" href="<?php the_permalink(); ?>" >
						<div class="card-image" <?php echo $background; ?>></div>
						<h3><?php the_title(); ?><span class="date"><?php the_time('F j, Y')?></span></h3>
					</a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
			<div id="home-more-news"></div>
		<?php else : ?>
			<p>No news at this time.</p>
		<?php endif; ?>
	</div> <!-- end home-news-area -->

	<div id="newsletter-subscribe">
		<!-- Begin Constant Contact Inline Form Code -->
		<div class="ctct-inline-form" data-form-id="e054f108-477a-415e-b5cf-18dc8b97e2cd"></div>
		<!-- End Constant Contact Inline Form Code -->
		<div class="privacy-policy"><a href="/contact-form-privacy-policy">Privacy Policy</a></div>
	</div>

</div> <!-- end home-secondary-container -->

<?php get_footer(); ?>
