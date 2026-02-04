<?php if (is_front_page( )) { ?>
    <div class="col-lg-4 text-center" id="conteudo">
      <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
      <?php if (has_post_thumbnail()) { 
        the_post_thumbnail( 'noticia-home' );
      } else {
        $images = get_attached_media( 'image', $post->ID );
          $images = array_values($images);
          if($images){
            $image_url = $images[0]->guid;
            $image_id = $images[0]->ID;
            set_post_thumbnail($post->ID, $image_id);
          } else {
            echo '<img src="'.get_template_directory_uri().'/img/no-news-thumb.jpg'.'" alt="Não há imagem disponível">';
          }
      } ?>
      <p class="text-start mx-3"><?php the_title(); ?></p>
      </a>
    
          <?php $categorias = wp_get_post_terms($post->ID, 'categoria');
            if( !empty( $categorias ) ) {
          ?>
            <span class="categoria">
              <?php
              foreach( $categorias as $categoria ) {
                echo '<a href="'.get_category_link($categoria->ID).'">'.$categoria->name.'</a>';
              }
              ?>
            </span>
          <?php } ?>
      </div>
        
    <?php } elseif (is_post_type_archive( 'noticia' ) || is_tax('categoria')){ ?>
        <article id="post-<?php echo $post->ID ?>" class="news-item">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('noticia-home');
             } else {
              $images = get_attached_media( 'image', $post->ID );
              $images = array_values($images);
              if($images){
                $image_url = $images[0]->guid;
                $image_id = $images[0]->ID;
                set_post_thumbnail($post->ID, $image_id);
              } else {
                echo '<img src="'.get_template_directory_uri().'/img/no-news-thumb.jpg'.'" alt="Não há imagem disponível">';
              }
             } ?>
             <?php echo '<span>'.get_the_date( 'j \d\e F \d\e Y' ).'</span>'; ?>
            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <?php the_excerpt(); ?>
            <div class="news-footer d-flex">
            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Veja mais</a>
            </div>
        </article>
<?php } else { ?>
    <article id="post-<?php echo $post->ID ?>">
    <?php the_date( 'j \d\e F \d\e Y', '<span class="d-block mb-3 text-right font-italic">', '</span>') ?>
        <hr>
        <h3><?php the_title(); ?></h3>
        <?php if (has_post_thumbnail()) { 
          the_post_thumbnail( 'fullsize' );
        } else {
          $images = get_attached_media( 'image', $post->ID );
          $images = array_values($images);
          if($images){
            $image_url = $images[0]->guid;
            $image_id = $images[0]->ID;
            set_post_thumbnail($post->ID, $image_id);
          }
        } ?>
        <hr>
        <?php the_content(); ?>
        <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your share button code -->
<div class="fb-share-button mb-2" 
data-href="<?php the_permalink(); ?>" 
data-layout="button_count">
</div>
        <?php
          if ( is_user_logged_in() ) { ?>
              <div class="entry-footer d-flex mt-3">
          <?php edit_post_link(__('Edit'), null, null, null, 'btn btn-primary btn-edit-post-link'); ?>
        </div>
        <?php  }  ?>        
    </article>
<?php } ?>