<?php if (is_active_sidebar('sidebar')) { ?>
    
    <h4><?php wp_title('') ?></h4>
    
    <?php 
        do_action('before_sidebar');
        dynamic_sidebar('sidebar');
    } ?> 