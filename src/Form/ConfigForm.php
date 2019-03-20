<?php

namespace Drupal\hmp_auth0\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ConfigForm extends FormBase {
	public function buildForm(array $form, FormStateInterface $form_state) {
		$hmp_auth0 = \Drupal::state()->get('hmp_auth0');
		
		$form['info'] = array(
			'#type' => 'item',
			'#markup' => '<hr><h2>Auth0/Subscription Field Mapping</h2>',
		);
		$form['auth0_fields'] = array(
			'#type' => 'textarea',
			'#default_value' => $hmp_auth0['auth0_fields'],
			'#title' => 'Field Mapping Format: auth0_field|form_field (comma separated) ',
		);

		/** Submit Button **/
		$form['break'] = array(
			'#type' => 'item',
			'#markup' => '<br><hr><br>',
		);
		$form['submit'] = array(
			'#type' => 'submit',
			'#value' => 'Submit',
		);
		return $form;
	}

	public function getFormId() {
		return 'hmp_elastic_config_form';
	}


	public function submitForm(array &$form, FormStateInterface $form_state) {
		$hmp_auth0 = array(
			'auth0_fields'			=>	$form_state->getValue('auth0_fields'),
		);
		\Drupal::state()->set('hmp_auth0',$hmp_auth0);
	}



}
