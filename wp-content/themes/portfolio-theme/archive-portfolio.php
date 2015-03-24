<?php get_header(); //include header.php ?>

<main id="content">

	<section class="filter">
		<h3>Filter by Type of Work:</h3>
		<ul>
			<?php wp_list_categories(array(
				'taxonomy' => 'typework',
				'orderby' => 'count',
				'title_li' => '',
				'show_option_none' => 'No work types',

			) ); ?>
		</ul>
	</section>


	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>
<a href="<?php the_permalink(); ?>"> 
		<article id="post-<?php the_ID(); ?>" <?php post_class();//this adds extra classes to the post ?>>

			<h2 class="entry-title"> 
				
					<?php the_title(); ?> 
				
			</h2>

			<div class="entry-content">
		<?php the_post_thumbnail('thumbnail'); ?>
			<?php the_excerpt(); ?>
				

			</div>

		</article><!-- end post -->
</a>
		<?php endwhile; ?>

		<div class="pagination">
			<?php 
			//run pagenavi if the plugin exists, otherwise do the default prev/next buttons
			if( function_exists('wp_pagenavi') && !wp_is_mobile() ): wp_pagenavi();
			else: previous_posts_link('&larr; Newer Posts '); 
 			next_posts_link(' Older Posts &rarr;');
 			endif;
			?>

		</div>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->


<?php get_footer(); //include footer.php ?>