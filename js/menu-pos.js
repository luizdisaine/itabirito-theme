$(function(){
    var btn = $('.button');
    var btnPosTop = btn.offset().top;
    var win = $(window);
    win.scroll(function(e){
        var scrollTop = win.scrollTop();
        if(scrollTop >= btnPosTop){
            //we've reached the button
            btn.css({position:'fixed',top:0,marginTop:0});
        }else if(btn.css('position') === 'fixed'){
            //if we scroll back up past the button's original position, and the button had previously been changed to its fixed position, we change it back
            btn.css({position:'',top:'',marginTop:'100px'});
        }
    });
});