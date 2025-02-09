<?php declare( strict_types=1 ); ?>

<article class="article">
	<?php if ( has_post_thumbnail() ): ?>
        <a class="article__thumbnail" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'large', array( 'class' => 'img-cover' ) ); ?>
        </a>
	<?php endif; ?>

    <div class="article__content">
        <div class="entry-meta">
			<?php theme_domain_post_date(); ?>
        </div>
        <h3 class="article__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="article__excerpt"><?php echo theme_domain_excerpt( 15 ); ?></div>
        <a class="btn btn-primary article__more" href="<?php the_permalink(); ?>">
			<?php esc_html_e( 'Read more', 'theme_domain' ); ?>
        </a>
    </div>
</article>
