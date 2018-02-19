<?php

namespace Drupal\learning\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure example settings for this site.
 */
class LearningSettingForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'learning_config';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['learning.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('learning.settings');

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#default_value' => $config->get('title'),
    ];

    $form['desc'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#default_value' => $config->get('desc'),
    ];

    $form['select'] = [
      '#type' => 'select',
      '#title' => $this->t('Select element'),
      '#default_value' => $config->get('select'),
      '#options' => ['Yes' => $this->t('Yes'),
                     'No' => $this->t('No'),
                     'Not Applicable' => $this->t('N/A'),
      ],
    ];

    $form['allow_desc'] = [
      '#type' => 'radios',
      '#title' => t('Allow Description'),
      '#default_value' => $config->get('allow_desc'),
      '#options' => [0 => $this->t('No'),
                     1 => $this->t('Yes'),
      ],
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration
    \Drupal::configFactory()->getEditable('learning.settings')
      // Set the submitted configuration setting
      ->set('title', $form_state->getValue('title'))
      ->set('select', $form_state->getValue('select'))
      // You can set multiple configurations at once by making
      // multiple calls to set()
      ->set('desc', $form_state->getValue('desc'))
      ->set('allow_desc', $form_state->getValue('allow_desc'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}