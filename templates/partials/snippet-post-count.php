<div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                Sorteret efter nyeste først
                            </div>
                            <div class="col-md-6 text-right">
                                <?php 
                                    $pagenum = $wp_query->query_vars['paged'] < 1 ? 1 : $wp_query->query_vars['paged'];
                                    $first = ( ( $pagenum - 1 ) * $wp_query->query_vars['posts_per_page'] ) + 1;
                                    $last = $first + $wp_query->post_count - 1;
                                    echo "Viser $first - $last af $wp_query->found_posts videoer";
                                ?>
                            </div>
                        </div>
                    </div>