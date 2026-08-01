<?php get_header(); ?>

        <main>
            <div class="main">
                <nav class="breadcrumb">
                    <div class="inner">
                        <ol class="breadcrumb__list">
                            <li class="breadcrumb__item"><a href="./index.html" class="breadcrumb__link">ホーム</a></li>
                            <li class="breadcrumb__item"><a href="./blog_list.html" class="breadcrumb__link">ブログ</a></li>
                            <li class="breadcrumb__item"><a href="./blog_list.html" class="breadcrumb__link">ギター</a></li>
                            <li class="breadcrumb__item">アルペジオが劇的に向上する３つの習慣</li>
                        </ol>
                    </div>
                </nav>

                <?php
                    if (have_posts()):
                    while (have_posts()):
                    the_post();
                    ?>
                <section class="blog-details">
                    <div class="inner">
                        <div class="blog-details__wrapper">

                            <article class="blog-details__main">
                                <div class="blog-details__image">
                                    <span class="blog-details__category">
                                        <?php
                                            $terms = get_the_terms(get_the_ID(), 'blog_cate');
                                            if (!empty($terms) && !is_wp_error($terms)) {
                                                echo esc_html($terms[0]->name);
                                            }
                                            ?>
                                    </span>
                                    <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="No image">
                                    <?php endif; ?>
                                </div>

                                <div class="blog-details__head">
                                    <h1 class="blog-details__title"><?php the_title(); ?></h1>
                                    <time class="blog-details__date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                                </div>

                                <div class="blog-details__share">
                                    <?php
                                    $url = urlencode(get_permalink());
                                    $title = urlencode(get_the_title());
                                    ?>
                                    <a href="#" class="share-btn share-btn--facebook" target="_blank" rel="noopener noreferrer">
                                        <span class="share-btn__icon">
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/list-facebook-pc.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/list-facebook-sp.svg" alt="Facebookでシェア">
                                            </picture>
                                        </span>
                                    </a>
                                    <a href="#" class="share-btn share-btn--twitter" target="_blank" rel="noopener noreferrer">
                                        <span class="share-btn__icon">
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/list-twitter-pc.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/list-twitter-sp.svg" alt="Twitterでシェア">
                                            </picture>
                                        </span>
                                    </a>
                                    <a href="#" class="share-btn share-btn--hatena" target="_blank" rel="noopener noreferrer">
                                        <span class="share-btn__icon">
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/list-hatena-pc.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/list-hatena-sp.svg" alt="はてなブックマーク">
                                            </picture>
                                        </span>
                                    </a>
                                    <a href="#" class="share-btn share-btn--line" target="_blank" rel="noopener noreferrer">
                                        <span class="share-btn__icon">
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/list-line-pc.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/list-line-sp.svg" alt="LINEでシェア">
                                            </picture>
                                        </span>
                                    </a>
                                    <a href="#" class="share-btn share-btn--pocket" target="_blank" rel="noopener noreferrer">
                                        <span class="share-btn__icon">
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/list-pocket-pc.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/list-pocket-sp.svg" alt="Pocketに保存">
                                            </picture>
                                        </span>
                                    </a>
                                </div>

                                <div class="blog-details__body">
                                    <?php the_content(); ?>
                                </div>
                                <?php get_template_part('template-parts/single-pagination'); ?>
                                
                                <?php get_template_part('template-parts/related-articles'); ?>
                            </article>

                            <?php get_sidebar(); ?>

                        </div>
                    </div>
                </section>
                <?php
                endwhile;
                endif;
                ?>
            </div>
        </main>

        <a href="#" id="js-pagetop" class="pagetop" aria-label="ページトップへ戻る">
            <img src="<?php echo get_template_directory_uri(); ?>/images/top-icon.svg" alt="ページトップへ戻る">
        </a>

        <?php get_template_part('template-parts/fix-area'); ?>
        <?php get_footer(); ?>