<div class="container-fluid" id="survey">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <?php if (!is_front_page()) {
                    echo do_shortcode( '[wpforms id="85144"]' ); 
                }
                ?>
            </div>
        </div>
    </div>
</div>
<footer class="container-fluid pt-5" id="rodape">
    <div class="container">
        <div class="row">
            <?php get_sidebar( 'footer' ); ?>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-4"><a href="<?php bloginfo( 'url' )?>" alt="<?php bloginfo('name'); ?>"><img
                        src="<?php echo get_template_directory_uri().'/img/logo-footer.png'; ?>" width="160"></a></div>
            <div class="col-lg-4">
                <span class="copyright">&copy; 2019 – <?php echo date('Y'); ?>. Todos os direitos reservados.</span>
            </div>
            <div class="col-lg-4">
                <?php get_template_part( 'assets/nav/nav_social' ); ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
<script>
    const descubraita = document.querySelector('#descubraita');
    const carousel1 = new bootstrap.Carousel(descubraita, {
        ride: "carousel",
        interval: 20000,
    })

    const banner = document.querySelector('#bannerslider');
    const carousel2 = new bootstrap.Carousel(banner, {
        ride: "carousel",
        interval: 5000,
    })

    jQuery(document).ready(function () {
        jQuery(".owl-carousel").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                430: {
                    items: 1,
                    nav: false
                },
                1200: {
                    items: 3
                },
            }
        });
    });
</script>
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
</body>

</html>