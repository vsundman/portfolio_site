<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class();//this adds extra classes to the post ?>>

			<div class="entry-content">
				<button onclick="history.go(-1);">Go Back</button>

				<?php 
					if( is_singular() ){	
						?> <h1><?php the_title(); ?> </h1>
						<?php the_content();
					
						
					}else{
						the_excerpt();
					}
				?> 
				
				

			</div>
			<div class="postmeta"> 
				<span class="date"> Posted on: <a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span>
				<span class="categories"><?php the_category(); ?></span>
				<span class="tags"><?php the_tags(); ?></span> 
				
		<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			?>

			</div><!-- end postmeta -->			
		</article><!-- end post -->

		<?php endwhile; ?>

		<div class="pagination">
			<?php 
			next_post_link( '%link', '&larr; Newer Post: %title' );
			previous_post_link( '%link', 'Older Post: %title &rarr;') ; 
 			?>

		</div>


	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>