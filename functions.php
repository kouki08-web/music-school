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
function my_page_conditions($query)
{
  // 管理画面ではなく、メインクエリの場合のみ実行
  if (!is_admin() && $query->is_main_query()) {

    // カスタム投稿タイプ 'blog' または 'result' のアーカイブページの場合
    if (is_post_type_archive(['blog', 'result'])) {
        $query->set('posts_per_page', 10);
    }

    // 検索結果ページの場合
    if ($query->is_search()) {
        $query->set('post_type', 'blog');
    }
  }
}
add_action('pre_get_posts', 'my_page_conditions');

//管理画面「外観＞メニュー」 を表示
function register_my_menus()
{
  register_nav_menus(array(
    'primary' => 'Primary Menu',
    'footer'  => 'Footer Menu',
  ));
}
add_action('after_setup_theme', 'register_my_menus');

// --------------------------------------------------
// JS読み込み（Swiper・main.js）
// --------------------------------------------------
function enqueue_theme_scripts() {
    wp_enqueue_script('jquery');
    wp_add_inline_script('jquery', 'window.$ = window.jQuery;');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('theme-main-js', get_template_directory_uri() . '/js/main.js', array('jquery', 'swiper-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

// --------------------------------------------------
// タイトルのカスタマイズ
// --------------------------------------------------
function custom_document_title(string $title): string
{
    $site_name = 'きたむらミュージックスクール';

    // トップページ
    if (is_front_page()) {
        return $site_name . ' | 「音楽で生きる」を叶える ミュージックスクール';
    }

    // 固定ページ
    if (is_page()) {
        return get_the_title() . ' | ' . $site_name;
    }

    // 投稿個別ページ
    if (is_single()) {
        return get_the_title() . ' | ' . $site_name;
    }

    // アーカイブ（ページ番号対応）
    if (is_archive()) {
        $paged = max(1, (int) get_query_var('paged'));

        if (is_category()) {
            $name = single_cat_title('', false);
        } elseif (is_tax()) {
            $name = single_term_title('', false);
        } elseif (is_post_type_archive()) {
            $name = post_type_archive_title('', false);
        } else {
            $name = get_the_archive_title();
        }

        // 2ページ目以降だけ「○ページ目」を付ける
        $suffix = ($paged > 1) ? ' ' . $paged . 'ページ目' : '';

        return $name . '一覧ページ' . $suffix . ' | ' . $site_name;
    }

    // 検索結果
    if (is_search()) {
        return '検索結果 | ' . $site_name;
    }

    // 404
    if (is_404()) {
        return 'お探しのページはございません | ' . $site_name;
    }

    // その他
    return get_the_title() . ' | ' . $site_name;
}
add_filter('pre_get_document_title', 'custom_document_title');

// --------------------------------------------------
// メタディスクリプションの出力
// --------------------------------------------------
function custom_meta_description(): void
{
    $description = '';

    // トップページ
    if (is_front_page()) {
        $description = '「音楽で生きる」を叶える ミュージックスクール「きたむらミュージックスクール」の公式ホームページです。';

    // 固定ページ
    } elseif (is_page()) {
        $description = 'きたむらミュージックスクール公式ホームページの' . get_the_title() . 'ページです。';

    // 投稿個別ページ
    } elseif (is_single()) {
        if (has_excerpt()) {
            $description = get_the_excerpt();
        } else {
            $content = get_the_content();
            $content = wp_strip_all_tags($content);      // HTML除去
            $content = preg_replace('/\s+/u', '', $content); // 改行・空白除去
            $description = mb_substr($content, 0, 120, 'UTF-8');
        }

    // 投稿アーカイブ
    } elseif (is_archive()) {
        if (is_category()) {
            $name = single_cat_title('', false);
        } elseif (is_tax()) {
            $name = single_term_title('', false);
        } elseif (is_post_type_archive()) {
            $name = post_type_archive_title('', false);
        } else {
            $name = get_the_archive_title();
        }

        $description = 'きたむらミュージックスクール公式ホームページの' . $name . '一覧ページです。';

    // 検索結果
    } elseif (is_search()) {
        $description = 'きたむらミュージックスクール公式ホームページの検索結果ページです。';

    // 404
    } elseif (is_404()) {
        $description = 'きたむらミュージックスクール公式ホームページの404ページです。';

    // その他のページ
    } else {
        $description = 'きたむらミュージックスクール公式ホームページの' . get_the_title() . 'ページです。';
    }

    if ($description !== '') {
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }
}
add_action('wp_head', 'custom_meta_description', 1);