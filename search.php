<?php get_header(); ?>

        <main>
            <div class="main">
                <?php get_template_part('template-parts/breadcrumbs'); ?>

                <div class="search">
                    <div class="inner">
                        <div class="search__header">
                            <?php if (!empty(get_search_query())): ?>
                                <?php if (have_posts()): $total_posts = $wp_query->found_posts; ?>
                                    <p class="search__keyword">「<span class="search__keyword-text"><?php echo esc_html(get_search_query()); ?></span>」の検索結果</p>
                                    <p class="search__count"><?php echo $total_posts; ?>件</p>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty(get_search_query())): ?>
                            <?php if (have_posts()): ?>
                                <div class="search__items">
                                    <?php while (have_posts()): the_post(); ?>
                                        <a href="<?php the_permalink(); ?>" class="search__item search-item">
                                            <div class="search-item__image">
                                                <span class="search-item__category">
                                                    <?php
                                                    $terms = get_the_terms(get_the_ID(), 'blog_cate');
                                                    if (!empty($terms) && !is_wp_error($terms)) {
                                                        echo esc_html($terms[0]->name);
                                                    }
                                                    ?>
                                                </span>
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="<?php echo esc_attr(get_the_title()); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="search-item__body">
                                                <p class="search-item__title"><?php echo wp_trim_words(get_the_title(), 26, '...'); ?></p>
                                                <div class="search-item__date">
                                                    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                                                </div>
                                                <div class="search-item__text">
                                                    <p><?php echo wp_trim_words(get_the_content(), 120, '...'); ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endwhile; ?>
                                </div>

                                <?php get_template_part('template-parts/pagination'); ?>
                            <?php else : ?>
                                <div class="p-search-result__no-result">
                                    <p>検索されたキーワードにマッチする記事はありませんでした。</p>
                                    <a onclick="history.back()" class="c-button c-button--main">戻る</a>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="p-search-result__no-result">
                                <p>検索キーワードが未入力です。</p>
                                <a onclick="history.back()" class="c-button c-button--main">戻る</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>

        <a href="#" id="js-pagetop" class="pagetop" aria-label="ページトップへ戻る">
            <img class="pagetop__icon" src="<?php echo get_template_directory_uri(); ?>/images/top-icon.svg" width="68" height="68" alt="ページトップへ戻る">
        </a>
        
        <?php get_template_part('template-parts/fix-area'); ?>
        <?php get_footer(); ?>