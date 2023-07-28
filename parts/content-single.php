<article id="post-<?php the_ID();?>" <?php post_class(); ?>>

    <header>
        <h1><?php the_title(); ?></h1>
        <div class="meta-info">
            <p><?php esc_html_e( 'Posted in', 'wp-cdsl' ) ?> <?php echo esc_html( get_the_date() ); ?> <?php esc_html_e( 'by', 'wp-cdsl' ) ?> <?php the_author_posts_link(); ?></p>
            <?php if( has_category()): ?>
                <p><?php esc_html_e( 'Categories', 'wp-cdsl' ) ?>: <?php the_category( ' ' ); ?></p>
            <?php endif; ?>
            <?php if( has_tag()): ?>
                <p><?php esc_html_e( 'Tags', 'wp-cdsl' ) ?>: <?php the_tags( '', ', '); ?></p>
            <?php endif; ?>    
        </div>
    </header>
    <div class="content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div>
</article>