<?php

  function the_classPage() {

  $mt = get_post_ancestors( $post );
    print_r($mt);
  
  if( is_array( $breadcrumb ) ) :
    //krsort($breadcrumb[0]);
    $count_breadcrumb = 0;
    foreach($breadcrumb[0] as $breadcrumb_id){
     if($count_breadcrumb==0) {
        $first=$breadcrumb_id;

        #pega a página principal para colorir a página de acordo com a sessão;
        switch (get_the_title($first)) {
          case 'Descubra Itabirito':
            $classPage = 'descubra';
            break;
          case 'Negócios e investimentos':
            $classPage = 'negocios';
            break;
          case 'Serviços':
            $classPage = 'servicos';
            break;
          case 'Programação':
            $classPage = 'programacao';
            break;
          case 'A Prefeitura':
            $classPage = 'prefeitura';
            break;
          case 'Espaço do Servidor':
            $classPage = 'servidor';
            break;
          case 'Notícias':
            $classPage = 'noticias';
            break;
          default:
            $classPage = 'prefeitura';
            break;
        }
     }
     $count_breadcrumb++;
  }
endif;

  }
  
?>