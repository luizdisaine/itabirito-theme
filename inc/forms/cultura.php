<?php
if ( class_exists( 'WPForms_Template', false ) ) :
    /**
     * Decoração Natalina - Natal Iluminado 2024
     * Template for WPForms.
     */
    class WPForms_Template_decorao_natalina___natal_iluminado_2024 extends WPForms_Template {
    
        /**
         * Primary class constructor.
         *
         * @since 1.0.0
         */
        public function init() {
    
            // Template name
            $this->name = 'Decoração Natalina - Natal Iluminado 2024';
    
            // Template slug
            $this->slug = 'decorao_natalina___natal_iluminado_2024';
    
            // Template description
            $this->description = '';
    
            // Template field and settings
            $this->data = array (
        'fields' => array (
            5 => array (
                'id' => '5',
                'type' => 'radio',
                'label' => 'Categoria do imóvel',
                'choices' => array (
                    1 => array (
                        'label' => 'Residencial',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    2 => array (
                        'label' => 'Comercial',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                ),
                'choices_images_style' => 'modern',
                'choices_icons_color' => '#066aab',
                'choices_icons_size' => 'large',
                'choices_icons_style' => 'default',
                'required' => '1',
                'input_columns' => '2',
            ),
            6 => array (
                'id' => '6',
                'type' => 'text',
                'label' => 'Nome do participante',
                'required' => '1',
                'size' => 'medium',
                'limit_count' => '1',
                'limit_mode' => 'characters',
                'conditional_logic' => '1',
                'conditional_type' => 'show',
                'conditionals' => array (
                    0 => array (
                        0 => array (
                            'field' => '5',
                            'operator' => '!e',
                        ),
                    ),
                ),
            ),
            7 => array (
                'id' => '7',
                'type' => 'address',
                'label' => 'Endereço',
                'scheme' => 'international',
                'required' => '1',
                'size' => 'medium',
                'address1_default' => 'Endereço completo (logradouro e número)',
                'address2_default' => 'Informe o bairro',
                'city_placeholder' => 'Itabirito',
                'city_default' => 'Itabirito',
                'state_placeholder' => 'MG',
                'state_default' => 'MG',
                'country_hide' => '1',
                'conditional_logic' => '1',
                'conditional_type' => 'show',
                'conditionals' => array (
                    0 => array (
                        0 => array (
                            'field' => '6',
                            'operator' => '!e',
                        ),
                    ),
                ),
            ),
            8 => array (
                'id' => '8',
                'type' => 'email',
                'label' => 'E-mail',
                'required' => '1',
                'size' => 'medium',
                'default_value' => false,
                'conditional_logic' => '1',
                'conditional_type' => 'show',
                'conditionals' => array (
                    0 => array (
                        0 => array (
                            'field' => '6',
                            'operator' => '!e',
                        ),
                    ),
                ),
            ),
            9 => array (
                'id' => '9',
                'type' => 'phone',
                'label' => 'Telefone',
                'format' => 'smart',
                'required' => '1',
                'size' => 'medium',
                'conditional_logic' => '1',
                'conditional_type' => 'show',
                'conditionals' => array (
                    0 => array (
                        0 => array (
                            'field' => '6',
                            'operator' => '!e',
                        ),
                    ),
                ),
            ),
        ),
        'field_id' => 10,
        'settings' => array (
            'form_title' => 'Decoração Natalina - Natal Iluminado 2024',
            'submit_text' => 'Enviar',
            'submit_text_processing' => 'Enviando…',
            'ajax_submit' => '1',
            'notification_enable' => '1',
            'notifications' => array (
                1 => array (
                    'notification_name' => 'Notificação padrão',
                    'email' => 'alessandra.baeta@pmi.mg.gov.br',
                    'subject' => 'Concurso Decoração Natalina',
                    'sender_name' => 'Prefeitura de Itabirito',
                    'sender_address' => '{admin_email}',
                    'replyto' => '{field_id="8"}',
                    'message' => '{all_fields}',
                    'file_upload_attachment_fields' => array (
                    ),
                    'entry_csv_attachment_entry_information' => array (
                    ),
                    'entry_csv_attachment_file_name' => 'entry-details',
                ),
            ),
            'confirmations' => array (
                1 => array (
                    'name' => 'Confirmação padrão',
                    'type' => 'message',
                    'message' => '<p>Obrigado por nos contatar! Entraremos em contato em breve.</p>',
                    'message_scroll' => '1',
                    'page' => '50736',
                    'message_entry_preview_style' => 'basic',
                ),
            ),
            'antispam_v3' => '1',
            'store_spam_entries' => '1',
            'anti_spam' => array (
                'time_limit' => array (
                    'enable' => '1',
                    'duration' => '2',
                ),
                'country_filter' => array (
                    'action' => 'allow',
                    'country_codes' => array (
                    ),
                    'message' => 'Este formulário não aceita envios do seu país.',
                ),
                'keyword_filter' => array (
                    'message' => 'Sua mensagem não pode ser enviada por conter palavras proibidas.',
                ),
            ),
            'form_tags' => array (
            ),
        ),
        'search_terms' => '',
        'meta' => array (
            'template' => 'decorao_natalina___natal_iluminado_2024',
        ),
    );
        }
    }
    new WPForms_Template_decorao_natalina___natal_iluminado_2024();
    endif;

?>