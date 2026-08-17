<?php get_header(); ?>

        <main>
            <div class="main">
                <?php get_template_part('template-parts/breadcrumbs'); ?>

                <?php
                if (have_posts()):
                while (have_posts()):
                    the_post();
                ?>
                <article class="result-details">
                    <div class="inner">
                        <div class="result-details__image">
                            <span class="result-details__category">
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'genre');
                                if (!empty($terms) && !is_wp_error($terms)) {
                                echo $terms[0]->name;
                                }
                                ?>
                            </span>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="No image">
                            <?php endif; ?>
                        </div>

                        <h1 class="result-details__title"><?php the_title(); ?></h1>
                        <div class="result-details__date">
                            <time datetime="<?php echo esc_attr(get_the_time('Y-m-d')); ?>"><?php the_time('Y.m.d'); ?></time>
                        </div>

                        <div class="result-details__info">
                            <table class="result-details__table">
                                <tbody>
                                    <tr>
                                        <th>名前</th>
                                        <td><?php the_field('name'); ?></td>
                                    </tr>
                                    <tr>
                                        <th>職業</th>
                                        <td><?php the_field('job'); ?></td>
                                    </tr>
                                    <tr>
                                        <th>ジャンル</th>
                                        <td>
                                            <?php
                                            $terms = get_the_terms(get_the_ID(), 'genre');
                                            if (!empty($terms) && !is_wp_error($terms)) {
                                                echo esc_html($terms[0]->name);
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>実績</th>
                                        <td><?php the_field('achievements'); ?></td>
                                    </tr>
                                    <tr>
                                        <th>SNS</th>
                                        <td><?php the_field('sns'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="result-details__text">
                                <?php the_content(); ?>
                            </div>
                        </div>

                        <?php get_template_part('template-parts/single-pagination', null, ['prefix' => 'result-details__pager']); ?>

                        <?php get_template_part('template-parts/related-articles'); ?>
                    </div>
                </article>
                <?php
                endwhile;
                endif;
                ?>
            </div>
        </main>

        <a href="#" id="js-pagetop" class="pagetop" aria-label="ページトップへ戻る">
            <img class="pagetop__icon" src="<?php echo get_template_directory_uri(); ?>/images/top-icon.svg" width="68" height="68" alt="ページトップへ戻る">
        </a>

        <?php get_template_part('template-parts/fix-area'); ?>
        <?php get_footer(); ?>