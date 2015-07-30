<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h1 class="page-title">Category: <?php single_cat_title(); ?></h1>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h1 class="page-title">Tag: <?php single_tag_title(); ?></h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h1 class="page-title">Archive: <?php the_time('F j, Y'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h1 class="page-title">Archive: <?php the_time('F, Y'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h1 class="page-title">Archive: <?php the_time('Y'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h1 class="page-title">Posts by <?php echo wp_title(''); ?></h1>
	<?php } ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class(); ?>>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="entry-meta">
				<p>Posted by <?php the_author_posts_link(); ?> on <span class="datetime"><?php the_time('c'); ?> <?php the_time(get_option('date_format')); ?></span>. <a href="<?php the_permalink(); ?>/#comments"><?php comments_number('No comments','One comment','% comments'); ?></a>.</p>
			</div>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
		</article>
	<?php endwhile; ?>

	<?php else : ?>
		<h1 class="entry-title">Not Found</h1>
	<?php endif; ?>
	
<nav class="pagination">
	<p class="next"><?php previous_posts_link('Newer posts', '0'); ?></p>
	<p class="previous"><?php next_posts_link('Older posts', '0'); ?></p>
</nav>

<?php get_footer(); ?>