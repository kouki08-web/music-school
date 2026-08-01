                                <?php
                                $post_type = get_post_type(); // 投稿タイプを取得
                                $post_id = get_the_ID();

                                // 投稿タイプに応じて使うタクソノミーを定義（必要に応じて追加可能）
                                $taxonomy_map = [
                                'blog' => 'blog_cate',
                                ];

                                // 投稿タイプに対応するタクソノミーが定義されているか確認
                                if (!isset($taxonomy_map[$post_type])) {
                                return;
                                }

                                $taxonomy = $taxonomy_map[$post_type];
                                $terms = get_the_terms($post_id, $taxonomy);

                                if (!empty($terms)) :
                                $term_ids = wp_list_pluck($terms, 'term_id');

                                $args = [
                                    'posts_per_page' => 3,
                                    'post_type' => $post_type,
                                    'post__not_in' => [$post_id],
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'tax_query' => [
                                    [
                                        'taxonomy' => $taxonomy,
                                        'field' => 'term_id',
                                        'terms' => $term_ids,
                                    ],
                                    ],
                                ];

                                $the_query = new WP_Query($args);

                                if ($the_query->have_posts()) :
                                    // 投稿の最初のタームの名前を取得
                                    $post_terms = get_the_terms(get_the_ID(), $taxonomy);
                                    $term_name = (!empty($post_terms)) ? $post_terms[0]->name : '';
                                ?>
                                <div class="blog-details__related">
                                    <h4 class="blog-details__related-title">関連記事</h4>
                                    <div class="blog-details__related-items">
                                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                        <a href="<?php the_permalink(); ?>" class="blog-details__related-item">
                                            <div class="blog-details__related-image">
                                                <?php
                                                $item_terms = get_the_terms(get_the_ID(), $taxonomy);
                                                if (!empty($item_terms) && !is_wp_error($item_terms)) :
                                                ?>
                                                <span class="blog-list-item__category"><?php echo esc_html($item_terms[0]->name); ?></span>
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
                                        <?php endwhile;
                                        wp_reset_postdata(); ?>
                                    </div>
                                </div>
                                <?php
                                endif;
                                endif;
                                ?>
