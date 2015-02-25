<?php get_header(); //include header.php ?>
<!-- drop description area -->
		<section id="short-info" class="short">
			<ul class="short-info-list"> 
				<li><?php echo get_theme_mod('vs_job_description'); ?></li>
			</ul>
		</section>
<!-- end job desc area -->

	<main id="content">
<?php welcomepost(); ?>

<div id="home-wrap">
	
	<?php echo vs_recent_work(); ?>

</div>


</main><!-- end #content -->


<?php get_footer(); //include footer.php ?>