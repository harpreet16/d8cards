<?php

namespace Drupal\customform\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure customform for this site.
 */
class CustomConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'customform.settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'customform.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('customform.settings');
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => t('Name'),
      '#default_value' => $config->get('name'),
    ];
    $form['department'] = [
      '#type' => 'textfield',
      '#title' => t('Department'),
      '#default_value' => $config->get('department'),
    ];
    $form['email'] = array(
      '#type' => 'email',
      '#title' => t('Email'),
      '#default_value' => $config->get('email'),
    );
    return parent::buildForm($form, $form_state);

  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $this->config('customform.settings')
      // Set the submitted configuration settings.
      ->set('name', $form_state->getValue('name'))
      ->set('department', $form_state->getValue('department'))
      ->set('email', $form_state->getValue('email'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
