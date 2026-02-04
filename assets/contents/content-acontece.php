    <article id="post-<?php echo $post->ID ?>" class="evento_chamada col-lg-12 p-3 bg-light">
      <?php $inicio = strtotime(get_field('datas_0_data_inicial')); ?>
      <div class="row">
        <div class="col-lg-12">
        <h6><span><?php echo date_i18n('j \d\e F',$inicio); ?></span><?php the_title(); ?></h6>
        </div>
        <div class="col-lg-4">
        <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
          <?php
          if (has_post_thumbnail()) { 
            the_post_thumbnail('noticia-home');
          } else {
            echo '<img src="'.get_template_directory_uri().'/img/no-event-thumb.jpg'.'" alt="Não há imagem disponível" >';
          }
          ?>
        </a>
        </div>
        <div class="col-lg-8">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" class="btn btn-sm btn-primary">Saiba mais</a>
        </div>
      </div>
    </article>
