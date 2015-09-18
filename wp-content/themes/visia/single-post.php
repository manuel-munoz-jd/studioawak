<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php get_header(); ?>

<section class="content padded container blog" id="<?php $content->slug(); ?>">

	<div class="grid-6">			
		<?php $t->content->loop(); ?>
	</div>
	<?php // get_sidebar(); ?>
</section>

<?php get_footer(); ?>