<?php get_header(); ?>

<div class="container main" id="conteudo">
    <div class="row">
    <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-9 ms-auto">

            <?php
                
                if (have_posts()) { ?>
                <ul class="nav nav-tabs" id="glossario" role="glossario">
                    <?php $words = array();
                        while (have_posts()) { the_post();
                            $titles = get_the_title();
                            $entries = array_push($words, substr($titles, 0, 1));
                            }
                                 
                    $initials = array_unique($words, SORT_REGULAR); 

                    array_walk_recursive($initials, function ($value, $key) {
                        echo '<li class="nav-item"><a class="nav-link';
                        if ($key == 0) {echo ' active"'; } else {echo '"';}
                        echo 'id="'.$value.'-tab" data-bs-toggle="tab" ';
                        echo 'href="#'.$value.'tab" ';
                        echo 'aria-controls="'.$value.'tab"';
                        echo 'aria-selected="';
                        if ($key == 0) {echo 'true"'; } else {echo 'false"';}
                        echo '>'.$value.'</a></li>';
                    }); ?>

</ul>
                    <div class="tab-content" id="glossarioContent">
                    <?php 
                        $count = 0;
                        foreach ($initials as $initial) {
                        $count++
                        ?>
                        <?php 
                            $args = array(
                                'post_type' => 'glossario',
                                'posts_per_page' => -1,
                                'search_prod_title' => $initial,
                                'post_status' => 'publish',
                                'orderby'     => 'title', 
                                'order'       => 'ASC'
                                 );
                                $the_query = new WP_Query($args);
                                if ( $the_query->have_posts() ) : ?>
                                <div class="tab-pane fade <?php if($count == 1) { echo ' show active'; } ?>" id="<?php echo $initial; ?>tab" role="tabpanel" aria-labelledby="<?php echo $initial; ?>-tab" >                       
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                                $title=get_the_title(); 
                                $capital=strtoupper(substr($title,0,1));
                                if($capital==$initial) {
                                 echo '<h6>'.$title.'</h6>';
                                 the_content();
                                }
                                endwhile;
                                wp_reset_postdata(); ?>
                                </div>
                            <?php endif; ?>
                    <?php }; ?>
                </div>
                    
 <?php } ?>

                    
        </div>
    </div>
</div>



<?php get_footer(); ?>