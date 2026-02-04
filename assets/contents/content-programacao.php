<?php if (is_front_page( )) { ?>
      <div class="item">
      <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
      <?php if (has_post_thumbnail()) { 
        the_post_thumbnail('full',array( 'class' => 'mb-2' ));
      } else {
        echo '<img src="'.get_template_directory_uri().'/img/no-event-thumb.jpg'.'" class="mb-2" alt="Não há imagem disponível" >';
      } ?>
      </a>
      <?php $categorias = wp_get_post_terms($post->ID, 'categoria_programacao');
            if( !empty( $categorias ) ) {
          ?>
            <span class="categoria">
              <?php
              foreach( $categorias as $categoria ) {
                echo $categoria->name;
              }
              ?>
            </span>
          <?php } ?>
          <h4><a href="<?php the_permalink(); ?>" class="titulo"><?php the_title(); ?></a></h4>
          <?php the_excerpt(  ); ?>
          <a href="<?php the_permalink(); ?>" class="link d-block">Ler mais</a>
    </div>

<?php } else { ?>
    <article id="post-<?php echo $post->ID ?>" class="evento_chamada col-lg-4 mb-5">
        <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
        <h6><span><?php echo date_i18n('j \d\e F \d\e Y',strtotime(get_field('datas_0_data_inicial'))); ?></span><?php the_title(); ?></h6>
        <?php if (has_post_thumbnail()) { 
          the_post_thumbnail();
        } else {
          echo '<img src="'.get_template_directory_uri().'/img/no-event-thumb.jpg'.'" alt="Não há imagem disponível" >';
        } ?>
        </a>
        <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" class="btn btn-primary">Saiba mais</a>
    </article>
<?php } ?>