<!-- Incluímos el archivo de cabecera -->
<?php get_header(); ?>

<!-- Título de la página -->
<h2>Entradas escritas por: <?php echo get_the_author(); ?></h2>

<!-- Listado de posts -->
<?php if (have_posts() ):?>
<section>
	<?php while (have_posts() ) : the_post(); ?>
		<article>
			<header>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<time datetime="<?php the_time('Y-m-j'); ?>"><?php the_time("j f, Y")?></time>
				<?php the_category();?>
			</header>
			<?php the_excerpt();?>
			<footer>
				<address>Por <?php the_author_posts_link() ?></address>
			</footer>
		</article>
	<?php endwhile; ?>

	<div class="pagination">
		<span class="in-left"><?php next_posts_link("<- Entradasantiguas"); ?></span>
		<span class="in-right"><?php previous_posts_link("Entradas recientes ->"); ?></span>
	</div>
	
</section>

<?php else : ?>
	<p><?php _e("No hay entradas"); ?></p>
<?php endif; ?>

</div>

<!-- Pié de página -->
<?php get_footer(); ?>