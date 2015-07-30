<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class(); ?>>
		<div class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>
		
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		
	</article>
	
<?php endwhile; ?>

<?php get_footer(); ?>