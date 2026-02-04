<?php 

/*Template Name: Vagas */

if (wp_is_mobile()) {
        get_header('mobile');
     } else {
        get_header();
     } ?>
    <div class="container main" id="conteudo">
        <div class="row">
        <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
        <?php thesidebar(); ?>
               
        </div>
        <?php } ?>

            <div class="col-lg-9 ms-auto">
                <?php 
                    if (have_posts()) {
                            while (have_posts()) { the_post();                
                            get_template_part( 'assets/contents/content-page' );
                        }
                    }
                ?>
                <table  id="vagas" class="table table-striped table-hover"></table>
                <script>
var planilha = 'https://docs.google.com/spreadsheets/d/1xA6C_TpVIFh52fzo0_6c6DEAJHJtHFekjO8zrIEdJtI/edit?gid=0#gid=0';
jQuery("#vagas").sheetrock({
                        url: planilha ,
                        query: "select D,E,F where A = 'Itabirito' order by D asc"
                    });

			jQuery(document).ready(function(){
			jQuery("#vagas thead").prepend('<tr><th>Vagas para PCD</th><th>Vagas para nao-PCD</th><th>Ocupacao</th></tr>');
                    jQuery("#vagas tbody tr:first-child").remove();
});
                </script>
            </div>
            <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
        </div>
    </div>

<?php get_footer(); ?>