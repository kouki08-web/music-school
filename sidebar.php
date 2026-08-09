<aside class="blog-details__sidebar">
                                <div class="sidebar-widget">
                                    <p class="sidebar-widget__title">無料メールマガジン</p>
                                    <a href="#" class="sidebar-ad">
                                        <p>バナー広告</p>
                                    </a>
                                </div>

                                <div class="sidebar-widget sidebar-search">
                                    <p class="sidebar-widget__title">ブログ内を検索</p>
                                    <div class="sidebar-widget__body">
                                        <?php get_search_form(); ?>
                                    </div>
                                </div>

                                <div class="sidebar-widget sidebar-recommended">
                                    <p class="sidebar-widget__title">おすすめの記事</p>
                                    <div class="sidebar-widget__body">
                                        <ul class="sidebar-recommended__list">
                                            <?php
                                            $recommend_args = array(
                                                'posts_per_page' => 3,
                                                'post_type'      => 'blog',
                                                'taxonomy'       => 'blog_recommend',
                                                'term'           => 'recommend',
                                                'orderby'        => 'date',
                                                'order'          => 'DESC',
                                            );
                                            $recommend_query = new WP_Query($recommend_args);
                                            if ($recommend_query->have_posts()) :
                                                while ($recommend_query->have_posts()) : $recommend_query->the_post();
                                            ?>
                                            <li class="sidebar-recommended__item">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="sidebar-recommended__image">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <?php the_post_thumbnail(); ?>
                                                        <?php else : ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="No image">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="sidebar-recommended__body">
                                                        <p class="sidebar-recommended__title"><?php echo wp_trim_words(get_the_title(), 15, '...'); ?></p>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php
                                                endwhile;
                                                wp_reset_postdata();
                                            endif;
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="sidebar-widget sidebar-categories">
                                    <p class="sidebar-widget__title">カテゴリー</p>
                                    <div class="sidebar-widget__body">
                                        <ul class="sidebar-categories__list">
                                            <?php
                                            $terms = get_terms([
                                                'taxonomy' => 'blog_cate',
                                                'hide_empty' => true,
                                            ]);
                                            if (!is_wp_error($terms) && !empty($terms)) :
                                                foreach ($terms as $term):
                                                $term_link = get_term_link($term->term_id);
                                            ?>
                                            <li><a href="<?php echo esc_url($term_link); ?>"><?php echo esc_html($term->name); ?></a></li>
                                            <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </aside>