<?php get_header(); ?>

        <main>
            <div class="main">
                <section class="fv">
                    <div class="fv__contents">
                        <div class="fv-slide__image">
                            <picture>
                                <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/result-fv-pc.jpg">
                                <img class="fv-slide__img" src="<?php echo get_template_directory_uri(); ?>/images/result_details-fv-sp.jpg" alt="卒業実績">
                            </picture>
                        </div>
                        <div class="fv__catch">
                            <h1>卒業実績</h1>
                        </div>
                    </div>
                </section>

                <?php get_template_part('template-parts/breadcrumbs'); ?>

                <section class="result-list">
                    <div class="inner">
                        <h2 class="result-list__title">卒業実績一覧</h2>
                        <div class="result-list__items">
                            <?php
                            if (have_posts()):
                            while (have_posts()):
                                the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>" class="result-list-item">
                                <div class="result-list-item__image">
                                    <span class="result-list-item__category">
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'genre');
                                        if (!empty($terms) && !is_wp_error($terms)) {
                                        echo $terms[0]->name;
                                        }
                                        ?>
                                    </span>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="No image">
                                    <?php endif; ?>
                                </div>
                                <div class="result-list-item__body">
                                    <p class="result-list-item__text"><?php echo wp_trim_words(get_the_title(), 32, '...'); ?></p>
                                    <div class="result-list-item__date">
                                        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
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
                </section>
            </div>
        </main>

        <a href="#" id="js-pagetop" class="pagetop" aria-label="ページトップへ戻る">
            <img class="pagetop__icon" src="<?php echo get_template_directory_uri(); ?>/images/top-icon.svg" width="68" height="68" alt="ページトップへ戻る">
        </a>

        <?php get_template_part('template-parts/fix-area'); ?>
        <?php get_footer(); ?>