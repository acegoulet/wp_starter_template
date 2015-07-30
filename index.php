<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class(); ?>>
		<div class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="entry-meta">
				<p>Posted by <?php the_author_posts_link(); ?> on <span class="datetime"><?php the_time('c'); ?> <?php the_time(get_option('date_format')); ?></span>. <a href="<?php the_permalink(); ?>/#comments"><?php comments_number('No comments','One comment','% comments'); ?></a>.</p>
			</div>
		</div>
        <div class="entry-summary">
			<?php the_excerpt(); ?>
        </div>
	</article>
	
<?php endwhile; ?>

<div class="pagination">
    <p class="next"><?php previous_posts_link('Newer posts', '0'); ?></p>
    <p class="previous"><?php next_posts_link('Older posts', '0'); ?></p>
</div>

<?php get_footer(); ?>
