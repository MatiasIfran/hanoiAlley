<?php
get_header();
	if ( is_front_page()) {?>

		<div class="container">
			<section id="primary" class="content-area">
				<main id="main" class="site-main">

					<?php

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</section><!-- #primary -->
		</div>
		<?php
	} else {
		echo "<div class='container'>";
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content' );
			}

			// Previous/next page navigation.
			gloriafood_the_posts_navigation();

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		echo '</div>';
	}
	?>

        </main><!-- .site-main -->
    </section><!-- .content-area -->

<?php
get_footer();
