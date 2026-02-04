<?php

if ( class_exists( 'WPForms_Template', false ) ) :
/**
 * Modelo básico com consentimento
 * Template for WPForms.
 */
class WPForms_Template_modelo_bsico_com_consentimento extends WPForms_Template {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Template name
		$this->name = 'Modelo básico com consentimento';

		// Template slug
		$this->slug = 'modelo_bsico_com_consentimento';

		// Template description
		$this->description = '';

		// Template field and settings
		$this->data = array (
	'meta' => array (
		'template' => 'modelo_bsico_com_consentimento',
	),
	'fields' => array (
		1 => array (
			'id' => '1',
			'type' => 'text',
			'label' => 'Nome',
			'size' => 'medium',
			'limit_count' => '1',
			'limit_mode' => 'characters',
		),
		3 => array (
			'id' => '3',
			'type' => 'phone',
			'label' => 'Telefone',
			'format' => 'international',
			'size' => 'medium',
		),
		2 => array (
			'id' => '2',
			'type' => 'gdpr-checkbox',
			'required' => '1',
			'label' => 'Termos de serviço e política de privacidade',
			'choices' => array (
				1 => array (
					'label' => 'Eu aceito que os dados sejam tratados para os fins descritos neste formulário, nos termos da nossa <a href="https://itabirito.mg.gov.br/privacidade-e-protecao-de-dados-pessoais/politica-de-privacidade/">política de privacidade</a>.',
					'icon' => 'face-smile',
					'icon_style' => 'regular',
				),
			),
		),
	),
	'settings' => array (
		'form_title' => 'Modelo básico com consentimento',
		'submit_text' => 'Enviar',
		'submit_text_processing' => 'Enviando…',
		'ajax_submit' => '1',
		'notification_enable' => '1',
		'notifications' => array (
			1 => array (
				'enable' => '1',
				'notification_name' => 'Notificação padrão',
				'email' => '{admin_email}',
				'subject' => 'Entrada: Formulário em branco (ID #93978)',
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
				'page' => '93884',
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
			'filtering_store_spam' => '1',
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
		'form_locker_verification_type' => 'password',
		'form_locker_age' => '18',
		'form_locker_age_criteria' => '>=',
		'form_locker_user_entry_email_duration' => 'day_start',
		'form_tags' => array (
		),
	),
);
	}
}
new WPForms_Template_modelo_bsico_com_consentimento();
endif;

?>