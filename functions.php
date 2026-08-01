<?php
// --------------------------------------------------
// 最初の設定
// --------------------------------------------------
function custom_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script'
    )
  );
  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'custom_theme_setup');

// --------------------------------------------------
// 関連記事ショートコード（投稿本文内に埋め込み用）
// --------------------------------------------------
function ks_related_posts_content_shortcode() {
    $current_post_id = get_the_ID();
    $current_terms = get_the_terms($current_post_id, 'blog_cate');

    $related_args = array(
        'post_type'      => 'blog',
        'posts_per_page' => 3,
        'post__not_in'   => array($current_post_id),
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    if (!empty($current_terms) && !is_wp_error($current_terms)) {
        $related_args['tax_query'] = array(
            array(
                'taxonomy' => 'blog_cate',
                'field'    => 'slug',
                'terms'    => $current_terms[0]->slug,
            ),
        );
    }

    $related_query = new WP_Query($related_args);

    ob_start();
    ?>
    <div class="blog-details__related">
        <div class="blog-details__related-items">
            <?php if ($related_query->have_posts()) : ?>
                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="blog-details__related-item">
                        <div class="blog-details__related-image">
                            <?php
                            $item_terms = get_the_terms(get_the_ID(), 'blog_cate');
                            if (!empty($item_terms) && !is_wp_error($item_terms)) :
                            ?>
                            <span class="blog-list-item__category blog-list-item__category"><?php echo esc_html($item_terms[0]->name); ?></span>
                            <?php endif; ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="blog-details__related-body">
                            <p class="blog-details__related-item-title"><?php echo esc_html(get_the_title()); ?></p>
                            <time class="blog-details__related-item-date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                        </div>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="blog-details__related-empty">関連記事はまだありません。</p>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('blog_related_posts', 'ks_related_posts_content_shortcode');
