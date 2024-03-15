<?php
 
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    ?>
    <div class="blog-container">
        <div class="blog-container-wrap">
    <?php
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) {
        $loop->the_post();
        $thumbnail_id = get_post_thumbnail_id();
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        ?>
        <div class="blog-container-inner-wrap">
            <div class="blog-item">
                
            <img alt="<?php echo esc_attr($alt); ?>" src="<?php the_post_thumbnail_url();?>">
            
                <div class="blog-item-wrap">
                
                    <p class="blog-title"><?php the_title();?></p>
                    <p><?php $content = get_the_content(); 
                    echo wp_trim_words( $content, 10, '...' );?></p>
                    <a class="blog-readmore" href="<?php the_permalink();?>">Read More >></a>
                
                </div>
                <p class="blog-date"><?php echo get_the_date('d M Y');?></p> 
            </div>
        </div>
    <?php
 
    }
    
    ?>
        </div>
    </div>
    <?php
    
    wp_reset_postdata();