<?php get_header(); ?>

<div class="white-container">

	<div class="page-container">

		<div class="section group">

			<div class="content">

			<div class="col span_8_of_12">

				<section class="error-404 not-found">

					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Hmm. That page doesn&rsquo;t exist.', 'strunk-and-white-free' ); ?></h1>
					</header>

					<div class="page-content">

						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'strunk-and-white-free' ); ?></p>

						<?php get_search_form(); ?>

					</div>

				</section>

			</div>

				<div class="col span_4_of_12">

					<?php get_sidebar( 'page' ); ?>

				</div>

		</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>
