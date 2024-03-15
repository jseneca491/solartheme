<?php
 
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    ?>
    <div class="blog-container-page">
        <div class="blog-container-wrap-page">
    <?php
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) {
        $loop->the_post();
        $thumbnail_id = get_post_thumbnail_id();
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        ?>
        <div class="blog-container-inner-wrap-page">
            <div class="blog-item-page">
                <div class="blog-item-wrap1">
                <a href="<?php the_permalink();?>"><img alt="<?php echo esc_attr($alt); ?>" src="<?php the_post_thumbnail_url('blog_thumb');?>"></a>
            </div>
                <div class="blog-item-wrap">
                <p class="blog-date"><?php echo get_the_date('d M Y');?></p> 
                    <a href="<?php the_permalink();?>" class="blog-title"><h2><?php the_title();?></h2></a>
                    <p><?php $content = get_the_content(); 
                    echo wp_trim_words( $content, 30, '...' );?></p>
                
                </div>
              
            </div>
        </div>
    <?php
 
    }
    
    ?>
        </div>
    </div>
    <?php
    
    wp_reset_postdata();