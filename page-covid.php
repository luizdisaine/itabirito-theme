<?php 

/* Template Name: COVID-19 */

if (wp_is_mobile()) {
  get_header('mobile');
} else {
  get_header();
}

    global $post;
    
    $children = get_pages( array( 'child_of' => $post->ID, 'hierarchical' => 1, 'sort_order' => 'asc' ) ); 
    
    if( count( $children ) != 0 ) { ?>

        <div class="container-fluid py-5 parent-menu">
            <div class="container">
                <div class="row menu-parent">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-7">
                        <ul class="menu-children">
                         <?php
                            wp_list_pages( array(
                                'child_of' => $post->ID, // Only pages that are children of the current page
                                'depth' => 1 ,   // Only show one level of hierarchy
                                'sort_order' => 'asc',
                                'title_li'    => ''
                        )); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

                    <?php } ?>

    <div class="container main" id="conteudo">
        <div class="row">
        <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
        <?php thesidebar(); ?>
                <?php get_sidebar(); ?>
        </div>
        <?php } ?>

            <div class="col-lg-8 ms-auto">
                <?php 
                    if (have_posts()) {
                            while (have_posts()) { the_post();                
                            get_template_part( 'assets/contents/content-page' );
                        }
                    }
                ?>
            </div>
            <?php if (is_page('decretos-e-planilhas-covid-19')) { ?>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Planilha Covid-19</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe width="100%" height="600" src="/planilha-covid/" border="0"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
            
            <?php } ?>
            <!-- Button trigger modal -->
            <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
        <?php thesidebar(); ?>
                <?php get_sidebar(); ?>
        </div>
        <?php } ?>


            </div>
    </div>
<?php get_footer(); ?>