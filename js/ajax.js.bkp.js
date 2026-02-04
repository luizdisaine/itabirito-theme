var $ = jQuery.noConflict();
jQuery.fn.exists = function(callback) {
  var args = [].slice.call(arguments, 1);
  if (this.length) {
    callback.call(this, args);
  }
  return this;
};


jQuery.fn.loadmore = function(pagenumber,cpt) {
    $container = jQuery('.entry-list');
    jQuery.ajax({
        url: ajax_post.ajaxurl,
        type: 'POST',
        data: {
            'action':'load_more',
            'pageno':pagenumber,
            'cpt':cpt
        },
        datatype: JSON,
        success: function(list) {
            var lista = jQuery.parseJSON(list);
            var list = (lista.lista);
            var next = (lista.next);
            $container.append(list);
            if (next!=0) {
                jQuery('.loadmore').attr('data-page', next);
            } else {
                jQuery('.loadmore').remove();
            }
            //var h = (jQuery(document).height() + 100);
            //jQuery('html, body').scrollTop(h);
        },
    });
}