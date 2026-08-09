<?php get_header(); ?>

        <main>
            <div class="main">
                <section class="fv">
                    <div class="fv__contents">
                        <div class="fv-slide__image">
                            <picture>
                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/blog-list-fv-pc.jpg">
                                <img class="fv-slide__img" src="<?php echo get_template_directory_uri(); ?>/images/blog-list-fv-sp.jpg" alt="ブログ">
                            </picture>
                        </div>
                        <div class="fv__catch">
                            <h1>ブログ</h1>
                        </div>
                    </div>
                </section>

                <?php get_template_part('template-parts/breadcrumbs'); ?>

                <section class="blog-list">
                    <div class="inner">
                        <div class="blog-list__contents">
                            <?php
                            $term = get_queried_object();
                            $term_name = isset($term->name) ? $term->name : 'カテゴリー名不明';
                            ?>
                            <h2 class="blog-list__title"><?php echo esc_html($term_name); ?></h2>
                            <div class="blog-list__items">
                                <?php
                                if (have_posts()):
                                while (have_posts()):
                                    the_post();
                                ?>
                                <a href="<?php the_permalink(); ?>" class="blog-list__item blog-list-item">
                                    <div class="blog-list-item__image">
                                        <span class="blog-list-item__category blog-list-item__category">
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
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="No image">
                                        <?php endif; ?>
                                    </div>
                                    <div class="blog-list-item__body">
                                        <p class="blog-list-item__title"><?php echo wp_trim_words(get_the_title(), 26, '...'); ?></p>
                                        <div class="blog-list-item__date">
                                            <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                                        </div>
                                        <div class="blog-list-item__text">
                                            <p><?php echo wp_trim_words(get_the_content(), 120, '...'); ?></p>
                                        </div>
                                    </div>
                                </a>
                                <?php
                                endwhile;
                                endif;
                                ?>
                            </div>

                            <nav class="pagination">
                                <ul class="pagination__list pagination__gap">
                                    <?php wp_pagenavi(); ?>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </section>
            </div>
        </main>

        <a href="#" id="js-pagetop" class="pagetop" aria-label="ページトップへ戻る">
            <img class="pagetop__icon" src="<?php echo get_template_directory_uri(); ?>/images/top-icon.svg" width="68" height="68" alt="ページトップへ戻る">
        </a>

        <?php get_template_part('template-parts/fix-area'); ?>
        <?php get_footer(); ?>