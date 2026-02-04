<?php if (is_active_sidebar('newsletter')) { 
    do_action('before_sidebar');
    dynamic_sidebar('newsletter');
} ?> 