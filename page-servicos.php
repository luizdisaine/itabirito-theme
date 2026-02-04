<?php if (wp_is_mobile()) {
        get_header('mobile');
    } else {
        get_header();
    }

$args = array(
    'post_type' => 'servico',
    'post_parent' => 0,
);

$servicos = new WP_Query($args);

$cargs = array(
    'taxonomy' => 'grupo',
    'hide_empty' => true,
);

$cats = get_terms($cargs); ?>
<div class="modal-servicos">
    <div class="modal-list loading">
        <div class="listhead d-flex py-3 px-5">
            <h3 class="text-uppercase">Serviços para o cidadão</h3>
            <a href="#" class="ms-auto" id="closelist"><i class="fa-solid fa-xmark ms-1"></i></a>
        </div>
        <div class="listbody p-3"></div>
    </div>
</div>
<div class="container-fluid bg-light py-5" id="area_servico">
    <div class="row">
        <div class="col-lg-10 mx-auto py-5">
            <ul class="atendimento">
            <?php
                foreach($cats as $cat) { ?>
                    <li><a href="<?php echo get_category_link($cat->term_id); ?>" class="btn btn-primary servlink" tax="<?php echo $cat->slug; ?>"><?php echo get_field('servicon', $cat).$cat->name; ?></a></li>
                <?php }
                ?>
            </ul>
            <ul>
                <li><a href="#" class="btn btn-outline-dark btn-sm"><?php _e('Serviços por secretaria', 'pmi'); ?></a></li>
                <li><a href="#" class="btn btn-outline-dark btn-sm"><?php _e('Serviços por tema', 'pmi'); ?></a></li>
            </ul>
        </div>
    </div>
</div>
<?php
    get_footer();
?>

<script>
    jQuery('.servlink').on('click', function(e){
        e.preventDefault();
        $container = jQuery('.listbody');
        jQuery('.modal-servicos').show();
        $cat = jQuery(this).attr('tax');
        jQuery.ajax({
            url: ajax_post.ajaxurl,
            type: 'POST',
            data: {
            'action':'get_services',
            'categoria': $cat
        },
        success: function(data) {
            jQuery('.modal-list').removeClass('loading');
            $container.empty().append(data);
        },
        error: function() {
            
        }
        })
    })
    jQuery('#closelist').on('click',function(){
        jQuery('.modal-servicos').hide();
        jQuery('.listbody').empty();
        jQuery('.modal-list').addClass('loading');
    })

</script>