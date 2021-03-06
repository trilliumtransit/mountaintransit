<?php
/*
Template Name: Dial-A-Ride page
*/


get_header(); ?>
			
	<div id="main" role="main">
		
		<?php while (have_posts()) : the_post(); ?>
						
			<?php the_breadcrumb(); ?>
			
		<article class="clear">
			<h1 id="page-title"><?php the_title() ?></h1>
			
			<section class="entry-content cf" itemprop="articleBody">
				
				<?php if( has_post_thumbnail()) : ?>
					<div id="featured-image-container">
						<img class="featured-image" src="
							<?php
									
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
							echo $thumb_url_array[0];
									
							?>
						">
					</div><!-- end featured image -->
				<?php endif; ?>
				
				<div id="dar-phone">
				To request a ride call  <a href="tel:<?php the_field('phone');?>">
				<?php
				the_field('phone');
				?>
				</a>
				</div><!-- end #dar-phone-->

				<div id="dar-service-description">

				<?php
				the_field('service_description');
				?>
				</div><!-- end #dar-service-description-->

				<h2>Hours of Operation</h2>
				<div id="dar-hours-of-operation">
				<?php
				the_field('hours_of_operation');
				?>
				</div><!-- end #dar-hours-of-operation-->

				<h2>Fares</h2>
				<div id="dar-fares">
				<?php
				the_field('dar_fares');
				?>
				</div><!-- end #dar-fares -->

				<?php the_content(); ?>

			</section>
			
			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								esc_html__( 'Edit %s', 'marta' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?> 
			
		</article>

	<?php endwhile;  ?>

	</div> <!-- end #main -->
	
	<?php get_template_part('page-footer'); ?>

<?php get_footer(); ?>
