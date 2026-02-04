<?php

/** CADASTRO de tutor **/

if ( class_exists( 'WPForms_Template', false ) ) :

class WPForms_Template_cadastro_de_tutor extends WPForms_Template {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Template name
		$this->name = 'Cadastro de tutor';

		// Template slug
		$this->slug = 'cadastro_de_tutor';

		// Template description
		$this->description = '';

		// Template field and settings
		$this->data = array (
	'fields' => array (
		1 => array (
			'id' => '1',
			'type' => 'text',
			'label' => 'CPF',
			'required' => '1',
			'size' => 'small',
			'limit_count' => '1',
			'limit_mode' => 'characters',
			'input_mask' => '999.999.999-99',
		),
		7 => array (
			'id' => '7',
			'type' => 'text',
			'label' => 'RG/CNH',
			'required' => '1',
			'size' => 'small',
			'limit_enabled' => '1',
			'limit_count' => '11',
			'limit_mode' => 'characters',
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
			'type' => 'date-time',
			'label' => 'Data de nascimento',
			'format' => 'date',
			'required' => '1',
			'size' => 'small',
			'date_type' => 'datepicker',
			'date_format' => 'd/m/Y',
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
		4 => array (
			'id' => '4',
			'type' => 'address',
			'label' => 'Endereço',
			'scheme' => 'international',
			'required' => '1',
			'size' => 'medium',
		),
		5 => array (
			'id' => '5',
			'type' => 'phone',
			'label' => 'Telefone',
			'format' => 'smart',
			'required' => '1',
			'size' => 'medium',
		),
		6 => array (
			'id' => '6',
			'type' => 'email',
			'label' => 'E-mail',
			'required' => '1',
			'size' => 'medium',
			'default_value' => false,
		),
	),
	'field_id' => 8,
	'settings' => array (
		'form_title' => 'Cadastro de tutor',
		'submit_text' => 'Enviar',
		'submit_text_processing' => 'Enviando…',
		'ajax_submit' => '1',
		'notification_enable' => '1',
		'notifications' => array (
			1 => array (
				'notification_name' => 'Notificação padrão',
				'email' => '{admin_email}',
				'subject' => 'Entrada: Formulário em branco (ID #92742)',
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
		'recaptcha' => '1',
		'form_tags' => array (
		),
	),
	'search_terms' => '',
	'meta' => array (
		'template' => 'cadastro_de_tutor',
		'category' => 'all',
		'subcategory' => 'all',
	),
);
	}
}
new WPForms_Template_cadastro_de_tutor();
endif;



if ( class_exists( 'WPForms_Template', false ) ) :
/**
 * Formulário de Inscrição SNPCD
 * Template for WPForms.
 */
class WPForms_Template_formulrio_de_inscrio_snpcd extends WPForms_Template {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Template name
		$this->name = 'Formulário de Inscrição SNPCD';

		// Template slug
		$this->slug = 'formulrio_de_inscrio_snpcd';

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
			'type' => 'radio',
			'label' => 'Município de atuação',
			'choices' => array (
				1 => array (
					'label' => 'Itabirito',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				2 => array (
					'label' => 'Ouro Preto',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				3 => array (
					'label' => 'Mariana',
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
		3 => array (
			'id' => '3',
			'type' => 'radio',
			'label' => 'Categoria profissional',
			'choices' => array (
				1 => array (
					'label' => 'Médico - Saúde da Família',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				2 => array (
					'label' => 'Médico pediatra',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				3 => array (
					'label' => 'Enfermeiro',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				5 => array (
					'label' => 'Psicólogo',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				4 => array (
					'label' => 'Fisioterapeuta',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				7 => array (
					'label' => 'Assistente social',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				6 => array (
					'label' => 'Profissional de Educação Física',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				10 => array (
					'label' => 'Nutricionista',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				9 => array (
					'label' => 'Fonoaudiólogo',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				8 => array (
					'label' => 'Terapeuta Ocupacional',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				11 => array (
					'label' => 'Outra',
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
		10 => array (
			'id' => '10',
			'type' => 'text',
			'label' => 'Outra categoria',
			'size' => 'medium',
			'limit_count' => '1',
			'limit_mode' => 'characters',
			'conditional_logic' => '1',
			'conditional_type' => 'show',
			'conditionals' => array (
				0 => array (
					0 => array (
						'field' => '3',
						'operator' => '==',
						'value' => '11',
					),
				),
			),
		),
		4 => array (
			'id' => '4',
			'type' => 'radio',
			'label' => 'Unidade de referência',
			'choices' => array (
				1 => array (
					'label' => 'Unidade Básica de Saúde',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				2 => array (
					'label' => 'Centro de Especialidades Médicas',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				3 => array (
					'label' => 'CER II',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				6 => array (
					'label' => 'CREAB',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				5 => array (
					'label' => 'CEO',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
				4 => array (
					'label' => 'Outros',
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
		5 => array (
			'id' => '5',
			'type' => 'text',
			'label' => 'Outra unidade de referência',
			'size' => 'medium',
			'limit_count' => '1',
			'limit_mode' => 'characters',
			'conditional_logic' => '1',
			'conditional_type' => 'show',
			'conditionals' => array (
				0 => array (
					0 => array (
						'field' => '4',
						'operator' => '==',
						'value' => '4',
					),
				),
			),
		),
		11 => array (
			'id' => '11',
			'type' => 'number',
			'label' => 'CPF',
			'required' => '1',
			'size' => 'medium',
			'placeholder' => 'Apenas os números',
		),
		6 => array (
			'id' => '6',
			'type' => 'email',
			'label' => 'E-mail',
			'required' => '1',
			'size' => 'medium',
			'default_value' => false,
		),
		7 => array (
			'id' => '7',
			'type' => 'phone',
			'label' => 'Telefone de contato',
			'format' => 'smart',
			'required' => '1',
			'size' => 'medium',
		),
		8 => array (
			'id' => '8',
			'type' => 'text',
			'label' => 'Endereço completo (Rua, número, bairro, cidade e CEP)',
			'size' => 'medium',
			'limit_count' => '1',
			'limit_mode' => 'characters',
		),
		9 => array (
			'id' => '9',
			'type' => 'gdpr-checkbox',
			'required' => '1',
			'label' => 'Termos de uso dos dados e política de privacidade',
			'choices' => array (
				1 => array (
					'label' => 'Eu concordo que este site armazene minhas informações para efetivação de minha inscrição e posterior acesso às dependências do evento, que pode ser controlado por terceiros fornecedores contratados, corresponsáveis pela segurança dos dados.',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
			),
		),
	),
	'field_id' => 13,
	'settings' => array (
		'form_title' => 'Formulário de Inscrição SNPCD',
		'submit_text' => 'Enviar',
		'submit_text_processing' => 'Enviando…',
		'ajax_submit' => '1',
		'notification_enable' => '1',
		'notifications' => array (
			1 => array (
				'notification_name' => 'Default Notification',
				'email' => 'fernanda.goncalves@pmi.mg.gov.br',
				'subject' => 'Nova inscrição: Formulário de Inscrição SNPCD',
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
				'message' => '<p>Agradecemos a sua inscrição</p>',
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
		'template' => 'formulrio_de_inscrio_snpcd',
	),
);
	}
}
new WPForms_Template_formulrio_de_inscrio_snpcd();
endif;

if ( class_exists( 'WPForms_Template', false ) ) :
	/**
	 * Formulário de inscrição do usuário
	 * Template for WPForms.
	 */
	class WPForms_Template_formulrio_de_inscrio_do_usurio extends WPForms_Template {
	
		/**
		 * Primary class constructor.
		 *
		 * @since 1.0.0
		 */
		public function init() {
	
			// Template name
			$this->name = 'Formulário de inscrição do usuário';
	
			// Template slug
			$this->slug = 'formulrio_de_inscrio_do_usurio';
	
			// Template description
			$this->description = '';
	
			// Template field and settings
			$this->data = array (
		'fields' => array (
			0 => array (
				'id' => '0',
				'type' => 'text',
				'label' => 'Nome completo',
				'required' => '1',
				'size' => 'medium',
				'limit_count' => '1',
				'limit_mode' => 'characters',
			),
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
				'type' => 'phone',
				'label' => 'Telefone',
				'format' => 'smart',
				'required' => '1',
				'size' => 'medium',
			),
			3 => array (
				'id' => '3',
				'type' => 'text',
				'label' => 'Local de trabalho',
				'required' => '1',
				'size' => 'medium',
				'limit_count' => '1',
				'limit_mode' => 'characters',
			),
		),
		'field_id' => 4,
		'settings' => array (
			'form_title' => 'Formulário de inscrição do usuário',
			'submit_text' => 'Enviar',
			'notifications' => array (
				1 => array (
					'notification_name' => 'Notificação padrão',
					'email' => '{admin_email}',
					'subject' => 'Entrada: Formulário de inscrição do usuário',
					'sender_name' => 'Prefeitura de Itabirito',
					'sender_address' => '{admin_email}',
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
			'anti_spam' => array (
				'time_limit' => array (
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
			'store_spam_entries' => '0',
		),
		'search_terms' => '',
		'meta' => array (
			'template' => 'formulrio_de_inscrio_do_usurio',
		),
	);
		}
	}
	new WPForms_Template_formulrio_de_inscrio_do_usurio();
	endif;

	if ( class_exists( 'WPForms_Template', false ) ) :
		/**
		 * Mapeamento de PICs na Rede Municipal de Saúde
		 * Template for WPForms.
		 */
		class WPForms_Template_mapeamento_de_pics_na_rede_municipal_de_sade extends WPForms_Template {
		
			/**
			 * Primary class constructor.
			 *
			 * @since 1.0.0
			 */
			public function init() {
		
				// Template name
				$this->name = 'Mapeamento de PICs na Rede Municipal de Saúde';
		
				// Template slug
				$this->slug = 'mapeamento_de_pics_na_rede_municipal_de_sade';
		
				// Template description
				$this->description = '';
		
				// Template field and settings
				$this->data = array (
			'fields' => array (
				2 => array (
					'id' => '2',
					'type' => 'text',
					'label' => 'Nome completo',
					'size' => 'medium',
					'limit_count' => '1',
					'limit_mode' => 'characters',
				),
				3 => array (
					'id' => '3',
					'type' => 'phone',
					'label' => 'Telefone',
					'format' => 'smart',
					'size' => 'medium',
				),
				4 => array (
					'id' => '4',
					'type' => 'email',
					'label' => 'E-mail',
					'required' => '1',
					'size' => 'medium',
					'default_value' => false,
				),
				5 => array (
					'id' => '5',
					'type' => 'text',
					'label' => 'Local de trabalho',
					'size' => 'medium',
					'limit_count' => '1',
					'limit_mode' => 'characters',
				),
				6 => array (
					'id' => '6',
					'type' => 'text',
					'label' => 'Categoria profissional',
					'size' => 'medium',
					'limit_count' => '1',
					'limit_mode' => 'characters',
				),
				7 => array (
					'id' => '7',
					'type' => 'radio',
					'label' => 'Vínculo profissional',
					'choices' => array (
						1 => array (
							'label' => 'Efetivo',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						2 => array (
							'label' => 'Contrato',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						3 => array (
							'label' => 'PJ',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						4 => array (
							'label' => 'Comissão',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
					),
					'choices_images_style' => 'modern',
					'choices_icons_color' => '#066aab',
					'choices_icons_size' => 'large',
					'choices_icons_style' => 'default',
					'input_columns' => '2',
				),
				10 => array (
					'id' => '10',
					'type' => 'radio',
					'label' => 'Possui formação em Práticas Integrativas Complementares?',
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
					'input_columns' => '2',
				),
				11 => array (
					'id' => '11',
					'type' => 'checkbox',
					'label' => 'Quais?',
					'choices' => array (
						1 => array (
							'label' => 'Apiterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						2 => array (
							'label' => 'Aromaterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						3 => array (
							'label' => 'Arteterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						4 => array (
							'label' => 'Ayurveda',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						5 => array (
							'label' => 'Biodança',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						6 => array (
							'label' => 'Bioenergética',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						7 => array (
							'label' => 'Constelação Familiar',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						8 => array (
							'label' => 'Cromoterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						9 => array (
							'label' => 'Dança circular',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						10 => array (
							'label' => 'Geoterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						11 => array (
							'label' => 'Hipnoterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						12 => array (
							'label' => 'Homeopatia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						13 => array (
							'label' => 'Imposição de mãos',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						14 => array (
							'label' => 'Medicina Antroposófica / Antroposofia aplica à saúde',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						15 => array (
							'label' => 'Medicina Tradicional Chinesa - Acunputura',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						16 => array (
							'label' => 'Meditação',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						17 => array (
							'label' => 'Musicoterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						18 => array (
							'label' => 'Naturopatia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						19 => array (
							'label' => 'Osteopatia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						20 => array (
							'label' => 'Ozonioterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						21 => array (
							'label' => 'Plantas medicinais - fitoterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						22 => array (
							'label' => 'Quiropraxia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						23 => array (
							'label' => 'Reflexoterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						24 => array (
							'label' => 'Reiki',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						25 => array (
							'label' => 'Shantala',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						26 => array (
							'label' => 'Terapia Comunitária Integrativa',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						27 => array (
							'label' => 'Terapia de florais',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						28 => array (
							'label' => 'Termalismo social / Crenoterapia',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						29 => array (
							'label' => 'Yoga',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
						30 => array (
							'label' => 'Outras',
							'icon' => 'face-smile',
							'icon_style' => 'regular',
						),
					),
					'choices_images_style' => 'modern',
					'choices_icons_color' => '#066aab',
					'choices_icons_size' => 'large',
					'choices_icons_style' => 'default',
					'input_columns' => '2',
					'conditional_logic' => '1',
					'conditional_type' => 'show',
					'conditionals' => array (
						0 => array (
							0 => array (
								'field' => '10',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
				),
				12 => array (
					'id' => '12',
					'type' => 'text',
					'label' => 'Qual outra?',
					'size' => 'medium',
					'limit_count' => '1',
					'limit_mode' => 'characters',
					'conditional_logic' => '1',
					'conditional_type' => 'show',
					'conditionals' => array (
						0 => array (
							0 => array (
								'field' => '11',
								'operator' => '==',
								'value' => '30',
							),
						),
					),
				),
				13 => array (
					'id' => '13',
					'type' => 'radio',
					'label' => 'Você atua com as PICs no seu local de trabalho?',
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
			),
			'field_id' => 14,
			'settings' => array (
				'form_title' => 'Mapeamento de PICs na Rede Municipal de Saúde',
				'submit_text' => 'Enviar',
				'submit_text_processing' => 'Enviando…',
				'ajax_submit' => '1',
				'notification_enable' => '1',
				'notifications' => array (
					1 => array (
						'notification_name' => 'Notificação padrão',
						'email' => 'fernanda.goncalves@pmi.mg.gov.br',
						'subject' => 'Mapeamento de PICs',
						'sender_name' => 'Prefeitura de Itabirito',
						'sender_address' => '{admin_email}',
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
						'message' => '<p>Obrigado por participar!</p>',
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
				'template' => 'mapeamento_de_pics_na_rede_municipal_de_sade',
			),
		);
			}
		}
		new WPForms_Template_mapeamento_de_pics_na_rede_municipal_de_sade();
		endif;

?>