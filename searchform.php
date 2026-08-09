<form class="sidebar-search__form" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                                            <input type="text" class="sidebar-search__input" name="s" aria-label="検索キーワード">
                                            <button type="submit" class="sidebar-search__btn" aria-label="検索">
                                                <span class="sidebar-search__btn-icon">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt="検索">
                                                </span>
                                            </button>
                                        </form>