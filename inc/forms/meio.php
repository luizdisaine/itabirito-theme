<?php

if ( class_exists( 'WPForms_Template', false ) ) :
    /**
     * 1ª Conferência Intermunicipal de Meio Ambiente
     * Template for WPForms.
     */
    class WPForms_Template_1_conferncia_intermunicipal_de_meio_ambiente extends WPForms_Template {
    
        /**
         * Primary class constructor.
         *
         * @since 1.0.0
         */
        public function init() {
    
            // Template name
            $this->name = '1ª Conferência Intermunicipal de Meio Ambiente';
    
            // Template slug
            $this->slug = '1_conferncia_intermunicipal_de_meio_ambiente';
    
            // Template description
            $this->description = '1º Conferência Municipal de Meio Ambiente dos Municípios de Itabirito e Minas Gerais. Emergência Climática - O Desafio da Transformação Ecológica';
    
            // Template field and settings
            $this->data = array (
        'fields' => array (
            1 => array (
                'id' => '1',
                'type' => 'email',
                'label' => 'E-mail',
                'required' => '1',
                'size' => 'medium',
                'default_value' => false,
            ),
            2 => array (
                'id' => '2',
                'type' => 'text',
                'label' => 'Nome completo',
                'required' => '1',
                'size' => 'medium',
                'limit_count' => '1',
                'limit_mode' => 'characters',
            ),
            3 => array (
                'id' => '3',
                'type' => 'text',
                'label' => 'Documentação (CPF ou Identidade)',
                'required' => '1',
                'size' => 'medium',
                'limit_count' => '1',
                'limit_mode' => 'characters',
            ),
            4 => array (
                'id' => '4',
                'type' => 'phone',
                'label' => 'Telefone',
                'format' => 'smart',
                'required' => '1',
                'size' => 'medium',
            ),
            5 => array (
                'id' => '5',
                'type' => 'date-time',
                'label' => 'Data / Hora',
                'format' => 'date',
                'required' => '1',
                'size' => 'medium',
                'date_type' => 'datepicker',
                'date_format' => 'm/d/Y',
                'date_limit_days_mon' => '1',
                'date_limit_days_tue' => '1',
                'date_limit_days_wed' => '1',
                'date_limit_days_thu' => '1',
                'date_limit_days_fri' => '1',
                'time_interval' => '30',
                'time_format' => 'g:i A',
                'time_limit_hours_start_hour' => '09',
                'time_limit_hours_start_min' => '00',
                'time_limit_hours_start_ampm' => 'am',
                'time_limit_hours_end_hour' => '06',
                'time_limit_hours_end_min' => '00',
                'time_limit_hours_end_ampm' => 'pm',
            ),
            6 => array (
                'id' => '6',
                'type' => 'radio',
                'label' => 'Gênero',
                'choices' => array (
                    1 => array (
                        'label' => 'Masculino',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    2 => array (
                        'label' => 'Feminino',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    3 => array (
                        'label' => 'Prefiro não declara',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                ),
                'choices_images_style' => 'modern',
                'choices_icons_color' => '#066aab',
                'choices_icons_size' => 'large',
                'choices_icons_style' => 'default',
                'required' => '1',
                'input_columns' => '3',
            ),
            7 => array (
                'id' => '7',
                'type' => 'radio',
                'label' => 'Cidade',
                'choices' => array (
                    1 => array (
                        'label' => 'Ouro Preto',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    2 => array (
                        'label' => 'Mariana',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    3 => array (
                        'label' => 'Outro',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                ),
                'choices_images_style' => 'modern',
                'choices_icons_color' => '#066aab',
                'choices_icons_size' => 'large',
                'choices_icons_style' => 'default',
                'required' => '1',
                'input_columns' => '3',
            ),
            13 => array (
                'id' => '13',
                'type' => 'text',
                'label' => 'Outro município',
                'size' => 'medium',
                'limit_count' => '1',
                'limit_mode' => 'characters',
                'conditional_logic' => '1',
                'conditional_type' => 'show',
                'conditionals' => array (
                    0 => array (
                        0 => array (
                            'field' => '7',
                            'operator' => '==',
                            'value' => '3',
                        ),
                    ),
                ),
            ),
            8 => array (
                'id' => '8',
                'type' => 'radio',
                'label' => 'Raça',
                'choices' => array (
                    1 => array (
                        'label' => 'Preta',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    2 => array (
                        'label' => 'Parda',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    3 => array (
                        'label' => 'Indígena',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    4 => array (
                        'label' => 'Amarela',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    5 => array (
                        'label' => 'Branca',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                ),
                'choices_images_style' => 'modern',
                'choices_icons_color' => '#066aab',
                'choices_icons_size' => 'large',
                'choices_icons_style' => 'default',
                'required' => '1',
                'input_columns' => '3',
            ),
            9 => array (
                'id' => '9',
                'type' => 'radio',
                'label' => 'Segmento',
                'choices' => array (
                    1 => array (
                        'label' => 'Sociedade civil',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    2 => array (
                        'label' => 'Comunidade tradicional',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    3 => array (
                        'label' => 'Povos originários',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    4 => array (
                        'label' => 'Setor privado',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    5 => array (
                        'label' => 'Poder público municipal',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    6 => array (
                        'label' => 'Poder público estadual',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    7 => array (
                        'label' => 'Poder público federal',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    8 => array (
                        'label' => 'Outro',
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
            14 => array (
                'id' => '14',
                'type' => 'text',
                'label' => 'Outro segmento',
                'size' => 'medium',
                'limit_count' => '1',
                'limit_mode' => 'characters',
                'conditional_logic' => '1',
                'conditional_type' => 'show',
                'conditionals' => array (
                    0 => array (
                        0 => array (
                            'field' => '9',
                            'operator' => '==',
                            'value' => '8',
                        ),
                    ),
                ),
            ),
            10 => array (
                'id' => '10',
                'type' => 'radio',
                'label' => 'Eixo temático de interesse',
                'choices' => array (
                    1 => array (
                        'label' => 'Mitigação',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    2 => array (
                        'label' => 'Adaptação e preparação para desastres',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    3 => array (
                        'label' => 'Justiça climática',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    4 => array (
                        'label' => 'Transformação ecológica ou Governança',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    5 => array (
                        'label' => 'Educação ambiental',
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
            11 => array (
                'id' => '11',
                'type' => 'radio',
                'label' => 'Participarei da "Conferência Intermunicipal de Meio Ambiente"',
                'choices' => array (
                    1 => array (
                        'label' => 'Sim. Durante TODO O DIA',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    2 => array (
                        'label' => 'Sim. Apenas na parta da MANHÃ',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    3 => array (
                        'label' => 'Sim. Apenas na parte da TARDE',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    4 => array (
                        'label' => 'Não participarei',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                ),
                'choices_images_style' => 'modern',
                'choices_icons_color' => '#066aab',
                'choices_icons_size' => 'large',
                'choices_icons_style' => 'default',
                'required' => '1',
            ),
        ),
        'field_id' => 15,
        'settings' => array (
            'form_title' => '1ª Conferência Intermunicipal de Meio Ambiente',
            'form_desc' => '1º Conferência Municipal de Meio Ambiente dos Municípios de Itabirito e Minas Gerais.
    Emergência Climática - O Desafio da Transformação Ecológica',
            'submit_text' => 'Enviar',
            'submit_text_processing' => 'Enviando…',
            'ajax_submit' => '1',
            'notification_enable' => '1',
            'notifications' => array (
                1 => array (
                    'notification_name' => 'Notificação padrão',
                    'email' => 'alessandra.paranhos@pmi.mg.gov.br',
                    'subject' => 'Formulário 1ª Conferência Intermuncipal de Meio Ambiente',
                    'sender_name' => 'Prefeitura de Itabirito',
                    'sender_address' => 'webmaster@itabirito.mg.gov.br',
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
            'template' => '1_conferncia_intermunicipal_de_meio_ambiente',
        ),
    );
        }
    }
    new WPForms_Template_1_conferncia_intermunicipal_de_meio_ambiente();
    endif;

?>