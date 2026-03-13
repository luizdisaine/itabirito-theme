<?php
/**
 * Template Name: Verificar Dados Pessoais
 * Description: Página para varrer o banco de dados em busca de dados pessoais
 */

// Verificar se o usuário tem permissão de administrador
if (!current_user_can('manage_options')) {
    wp_die('Você não tem permissão para acessar esta página.');
}

get_header();

global $wpdb;

$resultado = [];
$termo_busca = '';
$termo_sanitizado = '';

if (isset($_POST['buscar_dados']) && check_admin_referer('verificar_dados_pessoais', 'verificar_dados_nonce')) {
    $termo_busca = $_POST['termo_busca'] ?? '';
    $termo_sanitizado = sanitize_text_field($termo_busca);
    
    if (!empty($termo_sanitizado)) {
        $termo_like = '%' . $wpdb->esc_like($termo_sanitizado) . '%';
        
        // 1. Buscar em usuários
        $usuarios = $wpdb->get_results($wpdb->prepare(
            "SELECT ID, user_login, user_email, user_nicename, display_name 
            FROM {$wpdb->users} 
            WHERE user_login LIKE %s 
            OR user_email LIKE %s 
            OR user_nicename LIKE %s 
            OR display_name LIKE %s",
            $termo_like, $termo_like, $termo_like, $termo_like
        ));
        
        if ($usuarios) {
            $resultado['usuarios'] = $usuarios;
        }
        
        // 2. Buscar em user meta
        $user_meta = $wpdb->get_results($wpdb->prepare(
            "SELECT um.umeta_id, um.user_id, um.meta_key, um.meta_value, u.user_login 
            FROM {$wpdb->usermeta} um 
            LEFT JOIN {$wpdb->users} u ON um.user_id = u.ID 
            WHERE um.meta_value LIKE %s",
            $termo_like
        ));
        
        if ($user_meta) {
            $resultado['user_meta'] = $user_meta;
        }
        
        // 3. Buscar em posts (conteúdo)
        $posts = $wpdb->get_results($wpdb->prepare(
            "SELECT ID, post_title, post_type, post_content, post_author 
            FROM {$wpdb->posts} 
            WHERE (post_content LIKE %s 
            OR post_title LIKE %s 
            OR post_excerpt LIKE %s)
            AND post_status != 'trash'",
            $termo_like, $termo_like, $termo_like
        ));
        
        if ($posts) {
            $resultado['posts'] = $posts;
        }
        
        // 4. Buscar em post meta
        $post_meta = $wpdb->get_results($wpdb->prepare(
            "SELECT pm.meta_id, pm.post_id, pm.meta_key, pm.meta_value, p.post_title, p.post_type 
            FROM {$wpdb->postmeta} pm 
            LEFT JOIN {$wpdb->posts} p ON pm.post_id = p.ID 
            WHERE pm.meta_value LIKE %s
            AND p.post_status != 'trash'",
            $termo_like
        ));
        
        if ($post_meta) {
            $resultado['post_meta'] = $post_meta;
        }
        
        // 5. Buscar em comentários
        $comentarios = $wpdb->get_results($wpdb->prepare(
            "SELECT comment_ID, comment_post_ID, comment_author, comment_author_email, comment_content, comment_date 
            FROM {$wpdb->comments} 
            WHERE comment_author LIKE %s 
            OR comment_author_email LIKE %s 
            OR comment_content LIKE %s 
            OR comment_author_IP LIKE %s",
            $termo_like, $termo_like, $termo_like, $termo_like
        ));
        
        if ($comentarios) {
            $resultado['comentarios'] = $comentarios;
        }
        
        // 6. Buscar em options (cuidado com serialized data)
        $options = $wpdb->get_results($wpdb->prepare(
            "SELECT option_id, option_name, option_value 
            FROM {$wpdb->options} 
            WHERE option_value LIKE %s
            AND option_name NOT LIKE '_transient%'
            LIMIT 50",
            $termo_like
        ));
        
        if ($options) {
            $resultado['options'] = $options;
        }
    }
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Verificar Dados Pessoais no Banco de Dados</h1>
            
            <div class="alert alert-warning">
                <strong>⚠️ Atenção:</strong> Esta ferramenta varre o banco de dados em busca de informações pessoais. 
                Use apenas para fins de conformidade com LGPD e auditoria de dados.
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="">
                        <?php wp_nonce_field('verificar_dados_pessoais', 'verificar_dados_nonce'); ?>
                        
                        <div class="form-group mb-3">
                            <label for="termo_busca"><strong>Digite o dado pessoal a buscar:</strong></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="termo_busca" 
                                name="termo_busca" 
                                value="<?php echo esc_attr($termo_sanitizado); ?>"
                                placeholder="Ex: email@exemplo.com, CPF, nome, telefone..."
                                required
                            >
                            <small class="form-text text-muted">
                                Pode ser email, CPF, nome, telefone ou qualquer outro dado pessoal.
                            </small>
                        </div>
                        
                        <button type="submit" name="buscar_dados" class="btn btn-primary">
                            🔍 Buscar Dados Pessoais
                        </button>
                    </form>
                </div>
            </div>

            <?php if (!empty($resultado)): ?>
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">Resultados da Busca: "<?php echo esc_html($termo_sanitizado); ?>"</h3>
                    </div>
                    <div class="card-body">
                        
                        <?php if (isset($resultado['usuarios'])): ?>
                            <h4 class="mt-3">👤 Usuários (<?php echo count($resultado['usuarios']); ?>)</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Login</th>
                                            <th>Email</th>
                                            <th>Nome</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultado['usuarios'] as $user): ?>
                                            <tr>
                                                <td><?php echo $user->ID; ?></td>
                                                <td><?php echo esc_html($user->user_login); ?></td>
                                                <td><?php echo esc_html($user->user_email); ?></td>
                                                <td><?php echo esc_html($user->display_name); ?></td>
                                                <td>
                                                    <a href="<?php echo admin_url('user-edit.php?user_id=' . $user->ID); ?>" 
                                                       class="btn btn-sm btn-info" target="_blank">Editar</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($resultado['user_meta'])): ?>
                            <h4 class="mt-4">📋 Meta dados de Usuários (<?php echo count($resultado['user_meta']); ?>)</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Login</th>
                                            <th>Meta Key</th>
                                            <th>Meta Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultado['user_meta'] as $meta): ?>
                                            <tr>
                                                <td><?php echo $meta->user_id; ?></td>
                                                <td><?php echo esc_html($meta->user_login); ?></td>
                                                <td><?php echo esc_html($meta->meta_key); ?></td>
                                                <td><?php echo esc_html(substr($meta->meta_value, 0, 100)) . (strlen($meta->meta_value) > 100 ? '...' : ''); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($resultado['posts'])): ?>
                            <h4 class="mt-4">📄 Posts/Páginas (<?php echo count($resultado['posts']); ?>)</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tipo</th>
                                            <th>Título</th>
                                            <th>Conteúdo (prévia)</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultado['posts'] as $post): ?>
                                            <tr>
                                                <td><?php echo $post->ID; ?></td>
                                                <td><?php echo esc_html($post->post_type); ?></td>
                                                <td><?php echo esc_html($post->post_title); ?></td>
                                                <td><?php echo esc_html(substr(strip_tags($post->post_content), 0, 80)) . '...'; ?></td>
                                                <td>
                                                    <a href="<?php echo admin_url('post.php?post=' . $post->ID . '&action=edit'); ?>" 
                                                       class="btn btn-sm btn-info" target="_blank">Editar</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($resultado['post_meta'])): ?>
                            <h4 class="mt-4">🏷️ Meta dados de Posts (<?php echo count($resultado['post_meta']); ?>)</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Post ID</th>
                                            <th>Tipo</th>
                                            <th>Título do Post</th>
                                            <th>Meta Key</th>
                                            <th>Meta Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultado['post_meta'] as $meta): ?>
                                            <tr>
                                                <td><?php echo $meta->post_id; ?></td>
                                                <td><?php echo esc_html($meta->post_type); ?></td>
                                                <td><?php echo esc_html($meta->post_title); ?></td>
                                                <td><?php echo esc_html($meta->meta_key); ?></td>
                                                <td><?php echo esc_html(substr($meta->meta_value, 0, 100)) . (strlen($meta->meta_value) > 100 ? '...' : ''); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($resultado['comentarios'])): ?>
                            <h4 class="mt-4">💬 Comentários (<?php echo count($resultado['comentarios']); ?>)</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Autor</th>
                                            <th>Email</th>
                                            <th>Conteúdo</th>
                                            <th>Data</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultado['comentarios'] as $comment): ?>
                                            <tr>
                                                <td><?php echo $comment->comment_ID; ?></td>
                                                <td><?php echo esc_html($comment->comment_author); ?></td>
                                                <td><?php echo esc_html($comment->comment_author_email); ?></td>
                                                <td><?php echo esc_html(substr($comment->comment_content, 0, 80)) . '...'; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($comment->comment_date)); ?></td>
                                                <td>
                                                    <a href="<?php echo admin_url('comment.php?action=editcomment&c=' . $comment->comment_ID); ?>" 
                                                       class="btn btn-sm btn-info" target="_blank">Editar</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($resultado['options'])): ?>
                            <h4 class="mt-4">⚙️ Opções do Sistema (<?php echo count($resultado['options']); ?>)</h4>
                            <div class="alert alert-info">
                                <small>Limitado a 50 resultados para evitar sobrecarga.</small>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Option Name</th>
                                            <th>Option Value (prévia)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultado['options'] as $option): ?>
                                            <tr>
                                                <td><?php echo esc_html($option->option_name); ?></td>
                                                <td><?php echo esc_html(substr($option->option_value, 0, 100)) . (strlen($option->option_value) > 100 ? '...' : ''); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

                        <?php 
                        $total_resultados = 
                            (isset($resultado['usuarios']) ? count($resultado['usuarios']) : 0) +
                            (isset($resultado['user_meta']) ? count($resultado['user_meta']) : 0) +
                            (isset($resultado['posts']) ? count($resultado['posts']) : 0) +
                            (isset($resultado['post_meta']) ? count($resultado['post_meta']) : 0) +
                            (isset($resultado['comentarios']) ? count($resultado['comentarios']) : 0) +
                            (isset($resultado['options']) ? count($resultado['options']) : 0);
                        ?>
                        
                        <div class="alert alert-success mt-4">
                            <strong>Total de ocorrências encontradas: <?php echo $total_resultados; ?></strong>
                        </div>

                    </div>
                </div>
            <?php elseif (isset($_POST['buscar_dados'])): ?>
                <div class="alert alert-info">
                    Nenhum resultado encontrado para "<?php echo esc_html($termo_sanitizado); ?>".
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<style>
    .table-sm {
        font-size: 0.875rem;
    }
    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }
    .card {
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
</style>

<?php get_footer(); ?>
