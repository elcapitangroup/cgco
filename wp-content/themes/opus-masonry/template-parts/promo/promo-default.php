<?php
/**
 * Opus masonry Promo Default
 * @since Opus Blog 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $opus_blog_theme_options;
$promo_cat = absint($opus_blog_theme_options['opus-blog-promo-select-category']);
if( $promo_cat > 0 && is_home() )
{ ?>
    <section class="opus-blog-promo-section">
        <?php if ( is_front_page() && is_home() )
        {  ?>
            <div class="container">
                <div class="promo-section promo-two">
                    <?php
                    $args = array(
                        'cat' => $promo_cat ,
                        'posts_per_page' => 2,
                        'order'=> 'DESC'
                    );
                    
                    $query = new WP_Query($args);
                    if($query->have_posts()):
                        while($query->have_posts()):
                            $query->the_post();
                            ?>
                            <div class="item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if(has_post_thumbnail())
                                    {
                                        
                                        $image_id  = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id,'opus-blog-promo-post',true);
                                        ?>
                                        
                                        <figure>
                                            <img src="<?php echo esc_url($image_url[0]);?>">
                                            <span class="inset"></span>
                                        </figure>
                                    <?php   } ?>
                                </a>
                                <div class="promo-content">    
                                    <div class="post-category">
                                        <?php
                                           $categories = get_the_category();
                                           if ( ! empty( $categories ) ) {
                                              echo '<a class="s-cat" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                                          }                                 
                                        ?>
                                    </div>

                                    <h3 class="post-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-date">
                                        <div class="entry-meta">
                                            <?php
                                            opus_blog_posted_on();
                                            opus_blog_posted_by();
                                            ?>
                                        </div><!-- .entry-meta -->
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php } ?>
    </section>
<?php   }