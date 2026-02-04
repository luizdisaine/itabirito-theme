
jQuery(document).ready(function() {
    var owl = jQuery('.carousel-noticias');
    owl.owlCarousel({
        center: false,
        autoplay: false,
        loop: false,
        margin: 30,
        nav: false,
        dots: true,
        responsive: {
            320: {
                items: 1
            },
            768: {
                items: 2
            }
        }
    });

    jQuery('.menu-item-has-children > a').click(function(e){
        e.preventDefault();
    }) ;
    
    jQuery('.site_quick_jump').change(function(){
        // option 1 use a JS redirect in the current window
        window.location.href = jQuery(this).val();     
    });
    $page = jQuery('input[name=page_url').val();
    $pagename = jQuery('input[name=page_title').val();
    jQuery('#wpforms-85144-field_2').attr('value',$page);
    jQuery('#wpforms-85960-field_2').attr('value',$pagename);
});

jQuery('.print').click(function() {
    $print_content = jQuery(".main .row").html();
    jQuery(".print_preview .modal-body").html($print_content).find(".collapse").addClass("show");
    jQuery('.print_preview .modal-body').find(".col-lg-4, .col-lg-8").removeClass();
});

jQuery('.printThis').on('click', function() {
    jQuery(".print_preview .modal-body").print();
});

jQuery('.loadmore').on('click', function(e){
    e.preventDefault();
    var pagenumber = jQuery(this).attr('data-page');
    var cpt = jQuery(this).attr('cpt');
    jQuery().loadmore(pagenumber,cpt);
    jQuery(this).empty().text('Carregando...');
});