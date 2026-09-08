                                <?php
                                $post_type = get_post_type(); // 投稿タイプを取得
                                $post_id = get_the_ID();

                                // 投稿タイプに応じて使うタクソノミーを定義（必要に応じて追加可能）
                                $taxonomy_map = [
                                'blog' => 'blog_cate',
                                'result' => 'genre',
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
                                    $is_result = ($post_type === 'result');
                                    $wrap_class = $is_result ? 'result-details-related' : 'blog-details__related';
                                    $title_class = $is_result ? 'result-details-related__title' : 'blog-details__related-title';
                                    $items_class = $is_result ? 'result-details-related-items' : 'blog-details__related-items';
                                    $item_class = $is_result ? 'result-details-related-item' : 'blog-details__related-item';
                                    $image_class = $is_result ? 'result-details-related-item__image' : 'blog-details__related-image';
                                    $img_class = $is_result ? '' : 'blog-details__related-img';
                                    $category_class = $is_result ? 'result-details-related-item__category' : 'blog-list-item__category';
                                    $body_class = $is_result ? 'result-details-related-item__body' : 'blog-details__related-body';
                                    $item_title_class = $is_result ? 'result-details-related-item__title' : 'blog-details__related-item-title';
                                    $item_date_class = $is_result ? 'result-details-related-item__date' : 'blog-details__related-item-date';
                                ?>
                                <div class="<?php echo esc_attr($wrap_class); ?>">
                                    <h2 class="<?php echo esc_attr($title_class); ?>">関連記事</h2>
                                    <div class="<?php echo esc_attr($items_class); ?>">
                                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                        <a href="<?php the_permalink(); ?>" class="<?php echo esc_attr($item_class); ?>">
                                            <div class="<?php echo esc_attr($image_class); ?>">
                                                <?php
                                                $item_terms = get_the_terms(get_the_ID(), $taxonomy);
                                                if (!empty($item_terms) && !is_wp_error($item_terms)) :
                                                ?>
                                                <span class="<?php echo esc_attr($category_class); ?>"><?php echo esc_html($item_terms[0]->name); ?></span>
                                                <?php endif; ?>
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('medium', $img_class ? ['class' => $img_class] : []); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="<?php echo esc_attr(get_the_title()); ?>"<?php echo $img_class ? ' class="' . esc_attr($img_class) . '"' : ''; ?>>
                                                <?php endif; ?>
                                            </div>
                                            <div class="<?php echo esc_attr($body_class); ?>">
                                                <p class="<?php echo esc_attr($item_title_class); ?>"><?php echo esc_html(get_the_title()); ?></p>
                                                <time class="<?php echo esc_attr($item_date_class); ?>" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
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
