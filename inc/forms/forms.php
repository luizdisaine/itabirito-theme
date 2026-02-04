<?php

if ( class_exists( 'WPForms_Template', false ) ) :
    /**
     * Avaliação de Reação - Modelo
     * Template for WPForms.
     */
    class WPForms_Template_avaliao_de_reao___modelo extends WPForms_Template {
    
        /**
         * Primary class constructor.
         *
         * @since 1.0.0
         */
        public function init() {
    
            // Template name
            $this->name = 'Avaliação de Reação - Modelo';
    
            // Template slug
            $this->slug = 'avaliao_de_reao___modelo';
    
            // Template description
            $this->description = '';
    
            // Template field and settings
            $this->data = array (
        'fields' => array (
            1 => array (
                'id' => '1',
                'type' => 'text',
                'label' => 'Treinamento',
                'required' => '1',
                'size' => 'medium',
                'limit_count' => '1',
                'limit_mode' => 'characters',
            ),
            2 => array (
                'id' => '2',
                'type' => 'text',
                'label' => 'Nome',
                'size' => 'medium',
                'limit_count' => '1',
                'limit_mode' => 'characters',
            ),
            4 => array (
                'id' => '4',
                'type' => 'date-time',
                'label' => 'Data',
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
            7 => array (
                'id' => '7',
                'type' => 'divider',
                'label' => 'Avaliação do treinamento',
                'label_disable' => '1',
            ),
            5 => array (
                'id' => '5',
                'type' => 'rating',
                'label' => 'Conteúdo do treinamento: atualizado, informativo, útil;',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            8 => array (
                'id' => '8',
                'type' => 'rating',
                'label' => 'Contribuição do treinamento para aquisição de novos conhecimentos.',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            9 => array (
                'id' => '9',
                'type' => 'rating',
                'label' => 'Aplicabilidade do tema que foi tratado. ',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            10 => array (
                'id' => '10',
                'type' => 'divider',
                'label' => 'Avaliação do instrutor',
                'label_disable' => '1',
            ),
            11 => array (
                'id' => '11',
                'type' => 'rating',
                'label' => 'Pontualidade',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            14 => array (
                'id' => '14',
                'type' => 'rating',
                'label' => 'Domínio conceitual e prático do tema abordado ',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            13 => array (
                'id' => '13',
                'type' => 'rating',
                'label' => 'Clareza, segurança e organização',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            12 => array (
                'id' => '12',
                'type' => 'rating',
                'label' => 'Interação do instrutor com a turma( disposição para esclarecimentos de dúvidas e feedback',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            15 => array (
                'id' => '15',
                'type' => 'divider',
                'label' => 'Avaliação do local do treinamento',
                'label_disable' => '1',
            ),
            16 => array (
                'id' => '16',
                'type' => 'rating',
                'label' => 'Conforto térmico',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            19 => array (
                'id' => '19',
                'type' => 'rating',
                'label' => 'Conforto acústico (isolamento de ruídos)',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            18 => array (
                'id' => '18',
                'type' => 'rating',
                'label' => 'Equipamentos, recursos, disponíveis',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            17 => array (
                'id' => '17',
                'type' => 'rating',
                'label' => 'Mobiliário',
                'scale' => '5',
                'required' => '1',
                'icon' => 'smiley',
                'icon_size' => 'medium',
                'icon_color' => '#066aab',
            ),
            20 => array (
                'id' => '20',
                'type' => 'textarea',
                'label' => 'Observações, críticas ou sugestões',
                'required' => '1',
                'size' => 'medium',
                'limit_count' => '1',
                'limit_mode' => 'characters',
            ),
            21 => array (
                'id' => '21',
                'type' => 'text',
                'label' => 'Você tem alguma sugestão de melhoria para este curso?',
                'size' => 'medium',
                'limit_count' => '1',
                'limit_mode' => 'characters',
            ),
            22 => array (
                'id' => '22',
                'type' => 'radio',
                'label' => 'Você tem sugestões de cursos que gostaria que a Prefeitura ofertasse?',
                'choices' => array (
                    1 => array (
                        'label' => 'Sim',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                    2 => array (
                        'label' => 'Não',
                        'icon' => 'face-smile',
                        'icon_style' => 'regular',
                    ),
                ),
                'choices_images_style' => 'modern',
                'choices_icons_color' => '#066aab',
                'choices_icons_size' => 'large',
                'choices_icons_style' => 'default',
            ),
            23 => array (
                'id' => '23',
                'type' => 'text',
                'label' => 'Qual?',
                'size' => 'medium',
                'limit_count' => '1',
                'limit_mode' => 'characters',
                'conditional_logic' => '1',
                'conditional_type' => 'show',
                'conditionals' => array (
                    0 => array (
                        0 => array (
                            'field' => '22',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
            ),
        ),
        'field_id' => 24,
        'settings' => array (
            'form_title' => 'Avaliação de Reação - Modelo',
            'submit_text' => 'Enviar',
            'submit_text_processing' => 'Enviando…',
            'ajax_submit' => '1',
            'notification_enable' => '1',
            'notifications' => array (
                1 => array (
                    'notification_name' => 'Default Notification',
                    'email' => '{admin_email}',
                    'subject' => 'New Entry: Avaliação de Reação - Modelo',
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
                    'name' => 'Default Confirmation',
                    'type' => 'message',
                    'message' => '<p>Thanks for contacting us! We will be in touch with you shortly.</p>',
                    'message_scroll' => '1',
                    'page' => '50736',
                    'message_entry_preview_style' => 'basic',
                ),
            ),
            'antispam' => '1',
            'anti_spam' => array (
                'country_filter' => array (
                    'action' => 'allow',
                    'country_codes' => array (
                    ),
                    'message' => 'Sorry, this form does not accept submissions from your country.',
                ),
                'keyword_filter' => array (
                    'message' => 'Sorry, your message can\'t be submitted because it contains prohibited words.',
                ),
            ),
            'form_tags' => array (
            ),
        ),
        'meta' => array (
            'template' => 'avaliao_de_reao___modelo',
        ),
    );
        }
    }
    new WPForms_Template_avaliao_de_reao___modelo();
    endif;

    if ( class_exists( 'WPForms_Template', false ) ) :
        /**
         * Inscrição - Trilhas de Desenvolvimento - Modelo
         * Template for WPForms.
         */
        class WPForms_Template_inscrio___trilhas_de_desenvolvimento___modelo extends WPForms_Template {
        
            /**
             * Primary class constructor.
             *
             * @since 1.0.0
             */
            public function init() {
        
                // Template name
                $this->name = 'Inscrição - Trilhas de Desenvolvimento - Modelo';
        
                // Template slug
                $this->slug = 'inscrio___trilhas_de_desenvolvimento___modelo';
        
                // Template description
                $this->description = '';
        
                // Template field and settings
                $this->data = array (
            'fields' => array (
                1 => array (
                    'id' => '1',
                    'type' => 'text',
                    'label' => 'Nome completo',
                    'required' => '1',
                    'size' => 'medium',
                    'limit_count' => '1',
                    'limit_mode' => 'characters',
                ),
                2 => array (
                    'id' => '2',
                    'type' => 'phone',
                    'label' => 'Telefone',
                    'format' => 'smart',
                    'required' => '1',
                    'size' => 'medium',
                ),
                3 => array (
                    'id' => '3',
                    'type' => 'email',
                    'label' => 'E-mail',
                    'size' => 'medium',
                    'default_value' => false,
                ),
                4 => array (
                    'id' => '4',
                    'type' => 'text',
                    'label' => 'Cargo',
                    'required' => '1',
                    'size' => 'medium',
                    'limit_count' => '1',
                    'limit_mode' => 'characters',
                ),
                5 => array (
                    'id' => '5',
                    'type' => 'radio',
                    'label' => 'Secretaria a que pertence',
                    'choices' => array (
                        1 => array (
                            'label' => 'Controladoria Geral',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        2 => array (
                            'label' => 'Gabinete',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        3 => array (
                            'label' => 'Procuradoria Consultiva',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        4 => array (
                            'label' => 'Procuradoria Contenciosa',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        5 => array (
                            'label' => 'Administração',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        6 => array (
                            'label' => 'Agronegócio e Desenvolvimento Rural',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        7 => array (
                            'label' => 'Desenvolvimento Social',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        8 => array (
                            'label' => 'Comunicação',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        9 => array (
                            'label' => 'Desenvolvimento Econômico',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        10 => array (
                            'label' => 'Educação',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        11 => array (
                            'label' => 'Esportes e Lazer',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        12 => array (
                            'label' => 'Fazenda e Tributação',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        13 => array (
                            'label' => 'Meio Ambiente e Desenvolvimento Sustentável',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        14 => array (
                            'label' => 'Obras, Serviços e Infraestrutura',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        15 => array (
                            'label' => 'Patrimônio, Cultura e Turismo',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        16 => array (
                            'label' => 'Planejamento e Orçamento',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        17 => array (
                            'label' => 'Saúde',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        18 => array (
                            'label' => 'Segurança, Prevenção e Mobilidade Urbana',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        19 => array (
                            'label' => 'Gestão de Frotas',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        20 => array (
                            'label' => 'Políticas Urbanas e Habitação',
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
                7 => array (
                    'id' => '7',
                    'type' => 'text',
                    'label' => 'Departamento a que pertence',
                    'required' => '1',
                    'size' => 'medium',
                    'limit_count' => '1',
                    'limit_mode' => 'characters',
                ),
                6 => array (
                    'id' => '6',
                    'type' => 'text',
                    'label' => 'Chefia imediata',
                    'required' => '1',
                    'size' => 'medium',
                    'limit_count' => '1',
                    'limit_mode' => 'characters',
                ),
                8 => array (
                    'id' => '8',
                    'type' => 'text',
                    'label' => 'E-mail da chefia imediata',
                    'size' => 'medium',
                    'limit_count' => '1',
                    'limit_mode' => 'characters',
                ),
                11 => array (
                    'id' => '11',
                    'type' => 'gdpr-checkbox',
                    'required' => '1',
                    'label' => 'Autorização',
                    'choices' => array (
                        1 => array (
                            'label' => 'Declaro estar autorizado(a) pela minha chefia imediata a participar do respectivo curso, durante meu horário de trabalho, me responsabilizando por quaisquer implicações.',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                    ),
                ),
                14 => array (
                    'id' => '14',
                    'type' => 'gdpr-checkbox',
                    'required' => '1',
                    'label' => 'Compromisso de frequência',
                    'choices' => array (
                        1 => array (
                            'label' => 'Me comprometo a participar de todos os módulos da Trilha de Comunicação Assertiva, agendados para os dias 26/03, 09/04 e 23/04 de 2024, no horário de 8 às 11.',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                    ),
                ),
                12 => array (
                    'id' => '12',
                    'type' => 'textarea',
                    'label' => 'Qual a sua expectativa em relação à trilha de comunicação assertiva?',
                    'required' => '1',
                    'size' => 'medium',
                    'limit_count' => '1',
                    'limit_mode' => 'characters',
                ),
                15 => array (
                    'id' => '15',
                    'type' => 'textarea',
                    'label' => 'Quais os principais desafios que você encontra na sua comunicação?',
                    'required' => '1',
                    'size' => 'medium',
                    'limit_count' => '1',
                    'limit_mode' => 'characters',
                ),
                16 => array (
                    'id' => '16',
                    'type' => 'radio',
                    'label' => 'Por que meio você teve conhecimento das trilhas',
                    'choices' => array (
                        1 => array (
                            'label' => 'E-mail institucional',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        2 => array (
                            'label' => 'Cartaz',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        3 => array (
                            'label' => 'Pílula É de servidor pra servidor',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                        4 => array (
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
                ),
                17 => array (
                    'id' => '17',
                    'type' => 'text',
                    'label' => 'Outro meio',
                    'size' => 'medium',
                    'limit_count' => '1',
                    'limit_mode' => 'characters',
                    'conditional_logic' => '1',
                    'conditional_type' => 'show',
                    'conditionals' => array (
                        0 => array (
                            0 => array (
                                'field' => '16',
                                'operator' => '==',
                                'value' => '4',
                            ),
                        ),
                    ),
                ),
                13 => array (
                    'id' => '13',
                    'type' => 'gdpr-checkbox',
                    'required' => '1',
                    'label' => 'Termos de uso dos dados e política de privacidade',
                    'choices' => array (
                        1 => array (
                            'label' => 'Eu concordo que este site armazene minhas informações enviadas para que elas possam responder à minha consulta e contatar-me em caso de necessidade.',
                            'icon' => 'face-smile',
                            'icon_style' => 'regular',
                        ),
                    ),
                ),
            ),
            'field_id' => 18,
            'settings' => array (
                'form_title' => 'Inscrição - Trilhas de Desenvolvimento - Modelo',
                'submit_text' => 'Enviar',
                'submit_text_processing' => 'Enviando…',
                'ajax_submit' => '1',
                'notification_enable' => '1',
                'notifications' => array (
                    1 => array (
                        'notification_name' => 'Default Notification',
                        'email' => 'rh@pmi.mg.gov.br',
                        'subject' => 'Nova inscrição: Inscrição - Banco de Talentos',
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
                        'name' => 'Default Confirmation',
                        'type' => 'message',
                        'message' => '<p>Sua inscrição foi realizada com sucesso!</p>',
                        'message_scroll' => '1',
                        'page' => '50736',
                        'message_entry_preview_style' => 'basic',
                    ),
                ),
                'antispam' => '1',
                'recaptcha' => '1',
                'anti_spam' => array (
                    'country_filter' => array (
                        'action' => 'allow',
                        'country_codes' => array (
                        ),
                        'message' => 'Sorry, this form does not accept submissions from your country.',
                    ),
                    'keyword_filter' => array (
                        'message' => 'Sorry, your message can\'t be submitted because it contains prohibited words.',
                    ),
                ),
                'form_tags' => array (
                ),
            ),
            'meta' => array (
                'template' => 'inscrio___trilhas_de_desenvolvimento___modelo',
            ),
        );
            }
        }
        new WPForms_Template_inscrio___trilhas_de_desenvolvimento___modelo();
        endif;


        if ( class_exists( 'WPForms_Template', false ) ) :
            /**
             * Inscrição - Banco de Talentos - Modelo
             * Template for WPForms.
             */
            class WPForms_Template_inscrio___banco_de_talentos___modelo extends WPForms_Template {
            
                /**
                 * Primary class constructor.
                 *
                 * @since 1.0.0
                 */
                public function init() {
            
                    // Template name
                    $this->name = 'Inscrição - Banco de Talentos - Modelo';
            
                    // Template slug
                    $this->slug = 'inscrio___banco_de_talentos___modelo';
            
                    // Template description
                    $this->description = '';
            
                    // Template field and settings
                    $this->data = array (
                'fields' => array (
                    1 => array (
                        'id' => '1',
                        'type' => 'text',
                        'label' => 'Nome completo',
                        'required' => '1',
                        'size' => 'medium',
                        'limit_count' => '1',
                        'limit_mode' => 'characters',
                    ),
                    2 => array (
                        'id' => '2',
                        'type' => 'phone',
                        'label' => 'Telefone',
                        'format' => 'smart',
                        'required' => '1',
                        'size' => 'medium',
                    ),
                    3 => array (
                        'id' => '3',
                        'type' => 'email',
                        'label' => 'E-mail',
                        'size' => 'medium',
                        'default_value' => false,
                    ),
                    4 => array (
                        'id' => '4',
                        'type' => 'text',
                        'label' => 'Cargo',
                        'required' => '1',
                        'size' => 'medium',
                        'limit_count' => '1',
                        'limit_mode' => 'characters',
                    ),
                    5 => array (
                        'id' => '5',
                        'type' => 'radio',
                        'label' => 'Secretaria a que pertence',
                        'choices' => array (
                            1 => array (
                                'label' => 'Controladoria Geral',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            2 => array (
                                'label' => 'Gabinete',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            3 => array (
                                'label' => 'Procuradoria Consultiva',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            4 => array (
                                'label' => 'Procuradoria Contenciosa',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            5 => array (
                                'label' => 'Administração',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            6 => array (
                                'label' => 'Agronegócio e Desenvolvimento Rural',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            7 => array (
                                'label' => 'Desenvolvimento Social',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            8 => array (
                                'label' => 'Comunicação',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            9 => array (
                                'label' => 'Desenvolvimento Econômico',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            10 => array (
                                'label' => 'Educação',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            11 => array (
                                'label' => 'Esportes e Lazer',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            12 => array (
                                'label' => 'Fazenda e Tributação',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            13 => array (
                                'label' => 'Meio Ambiente e Desenvolvimento Sustentável',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            14 => array (
                                'label' => 'Obras, Serviços e Infraestrutura',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            15 => array (
                                'label' => 'Patrimônio, Cultura e Turismo',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            16 => array (
                                'label' => 'Planejamento e Orçamento',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            17 => array (
                                'label' => 'Saúde',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            18 => array (
                                'label' => 'Segurança, Prevenção e Mobilidade Urbana',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            19 => array (
                                'label' => 'Gestão de Frotas',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                            20 => array (
                                'label' => 'Políticas Urbanas e Habitação',
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
                    7 => array (
                        'id' => '7',
                        'type' => 'text',
                        'label' => 'Departamento a que pertence',
                        'required' => '1',
                        'size' => 'medium',
                        'limit_count' => '1',
                        'limit_mode' => 'characters',
                    ),
                    6 => array (
                        'id' => '6',
                        'type' => 'text',
                        'label' => 'Chefia imediata',
                        'required' => '1',
                        'size' => 'medium',
                        'limit_count' => '1',
                        'limit_mode' => 'characters',
                    ),
                    8 => array (
                        'id' => '8',
                        'type' => 'text',
                        'label' => 'E-mail da chefia imediata',
                        'size' => 'medium',
                        'limit_count' => '1',
                        'limit_mode' => 'characters',
                    ),
                    9 => array (
                        'id' => '9',
                        'type' => 'radio',
                        'label' => 'Para qual curso você está se inscrevendo?',
                        'choices' => array (
                            1 => array (
                                'label' => '16/07 - Oratória',
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
                    11 => array (
                        'id' => '11',
                        'type' => 'gdpr-checkbox',
                        'required' => '1',
                        'label' => 'Autorização',
                        'choices' => array (
                            1 => array (
                                'label' => 'Declaro estar autorizado(a) pela minha chefia imediata a participar do respectivo curso, durante meu horário de trabalho, me responsabilizando por quaisquer implicações.',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                        ),
                    ),
                    13 => array (
                        'id' => '13',
                        'type' => 'gdpr-checkbox',
                        'required' => '1',
                        'label' => 'Termos de uso dos dados e política de privacidade',
                        'choices' => array (
                            1 => array (
                                'label' => 'Eu concordo que este site armazene minhas informações enviadas para que elas possam responder à minha consulta e contatar-me em caso de necessidade.',
                                'icon' => 'face-smile',
                                'icon_style' => 'regular',
                            ),
                        ),
                    ),
                    12 => array (
                        'id' => '12',
                        'type' => 'textarea',
                        'label' => 'Qual a sua expectativa em relação a esse curso?',
                        'size' => 'medium',
                        'limit_count' => '1',
                        'limit_mode' => 'characters',
                    ),
                ),
                'field_id' => 14,
                'settings' => array (
                    'form_title' => 'Inscrição - Banco de Talentos - Modelo',
                    'submit_text' => 'Enviar',
                    'submit_text_processing' => 'Enviando…',
                    'ajax_submit' => '1',
                    'notification_enable' => '1',
                    'notifications' => array (
                        1 => array (
                            'notification_name' => 'Default Notification',
                            'email' => 'rh@pmi.mg.gov.br',
                            'subject' => 'Nova inscrição: Inscrição - Banco de Talentos',
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
                            'name' => 'Default Confirmation',
                            'type' => 'message',
                            'message' => '<p>Sua inscrição foi realizada com sucesso!</p>',
                            'message_scroll' => '1',
                            'page' => '50736',
                            'message_entry_preview_style' => 'basic',
                        ),
                    ),
                    'antispam' => '1',
                    'recaptcha' => '1',
                    'anti_spam' => array (
                        'country_filter' => array (
                            'action' => 'allow',
                            'country_codes' => array (
                            ),
                            'message' => 'Sorry, this form does not accept submissions from your country.',
                        ),
                        'keyword_filter' => array (
                            'message' => 'Sorry, your message can\'t be submitted because it contains prohibited words.',
                        ),
                    ),
                    'form_tags' => array (
                    ),
                ),
                'meta' => array (
                    'template' => 'inscrio___banco_de_talentos___modelo',
                ),
            );
                }
            }
            new WPForms_Template_inscrio___banco_de_talentos___modelo();
            endif;
            if ( class_exists( 'WPForms_Template', false ) ) :
                /**
                 * Café com Prosa - Dia das Mães
                 * Template for WPForms.
                 */
                class WPForms_Template_caf_com_prosa___dia_das_mes extends WPForms_Template {
                
                    /**
                     * Primary class constructor.
                     *
                     * @since 1.0.0
                     */
                    public function init() {
                
                        // Template name
                        $this->name = 'Café com Prosa';
                
                        // Template slug
                        $this->slug = 'caf_com_prosa';
                
                        // Template description
                        $this->description = '';
                
                        // Template field and settings
                        $this->data = array (
                    'fields' => array (
                        1 => array (
                            'id' => '1',
                            'type' => 'text',
                            'label' => 'Nome completo',
                            'size' => 'medium',
                            'limit_count' => '1',
                            'limit_mode' => 'characters',
                        ),
                        2 => array (
                            'id' => '2',
                            'type' => 'phone',
                            'label' => 'Telefone',
                            'format' => 'smart',
                            'required' => '1',
                            'size' => 'medium',
                        ),
                        3 => array (
                            'id' => '5',
                            'type' => 'radio',
                            'label' => 'Secretaria a que pertence',
                            'choices' => array (
                                1 => array (
                                    'label' => 'Controladoria Geral',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                2 => array (
                                    'label' => 'Gabinete',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                3 => array (
                                    'label' => 'Procuradoria Consultiva',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                4 => array (
                                    'label' => 'Procuradoria Contenciosa',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                5 => array (
                                    'label' => 'Administração',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                6 => array (
                                    'label' => 'Agronegócio e Desenvolvimento Rural',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                7 => array (
                                    'label' => 'Desenvolvimento Social',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                8 => array (
                                    'label' => 'Comunicação',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                9 => array (
                                    'label' => 'Desenvolvimento Econômico',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                10 => array (
                                    'label' => 'Educação',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                11 => array (
                                    'label' => 'Esportes e Lazer',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                12 => array (
                                    'label' => 'Fazenda e Tributação',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                13 => array (
                                    'label' => 'Meio Ambiente e Desenvolvimento Sustentável',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                14 => array (
                                    'label' => 'Obras, Serviços e Infraestrutura',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                15 => array (
                                    'label' => 'Patrimônio, Cultura e Turismo',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                16 => array (
                                    'label' => 'Planejamento e Orçamento',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                17 => array (
                                    'label' => 'Saúde',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                18 => array (
                                    'label' => 'Segurança, Prevenção e Mobilidade Urbana',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                19 => array (
                                    'label' => 'Gestão de Frotas',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                                20 => array (
                                    'label' => 'Políticas Urbanas e Habitação',
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
                        4 => array (
                            'id' => '3',
                            'type' => 'text',
                            'label' => 'Cargo',
                            'required' => '1',
                            'size' => 'medium',
                            'limit_count' => '1',
                            'limit_mode' => 'characters',
                        ),
                        5 => array (
                            'id' => '4',
                            'type' => 'gdpr-checkbox',
                            'required' => '1',
                            'label' => 'Contrato GDPR',
                            'choices' => array (
                                1 => array (
                                    'label' => 'Eu concordo que este site armazene minhas informações enviadas para que elas possam responder à minha consulta.',
                                    'icon' => 'face-smile',
                                    'icon_style' => 'regular',
                                ),
                            ),
                        ),
                        
                    ),
                    'field_id' => 5,
                    'settings' => array (
                        'form_title' => 'Café com Prosa - Dia das Mães',
                        'submit_text' => 'Enviar',
                        'submit_text_processing' => 'Enviando…',
                        'ajax_submit' => '1',
                        'notification_enable' => '1',
                        'notifications' => array (
                            1 => array (
                                'notification_name' => 'Default Notification',
                                'email' => '{admin_email}',
                                'subject' => 'New Entry: Café com Prosa - Dia das Mães',
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
                                'name' => 'Default Confirmation',
                                'type' => 'message',
                                'message' => '<p>Thanks for contacting us! We will be in touch with you shortly.</p>',
                                'message_scroll' => '1',
                                'page' => '50736',
                                'message_entry_preview_style' => 'basic',
                            ),
                        ),
                        'antispam' => '1',
                        'anti_spam' => array (
                            'country_filter' => array (
                                'action' => 'allow',
                                'country_codes' => array (
                                ),
                                'message' => 'Sorry, this form does not accept submissions from your country.',
                            ),
                            'keyword_filter' => array (
                                'message' => 'Sorry, your message can\'t be submitted because it contains prohibited words.',
                            ),
                        ),
                        'form_tags' => array (
                        ),
                    ),
                    'meta' => array (
                        'template' => 'caf_com_prosa___dia_das_mes',
                    ),
                );
                    }
                }
                new WPForms_Template_caf_com_prosa___dia_das_mes();
                endif;
?>

