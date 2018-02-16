<?php

namespace Drupal\learning\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Learning' Block.
 *
 * @Block(
 *   id = "learning",
 *   admin_label = @Translation("Learning block"),
 *   category = @Translation("Learning World"),
 * )
 */
class LearningBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */  
  public function build() {
    
    $config = $this->getConfiguration();

    if (!empty($config['learning_name'])) {
      $name = $config['learning_name'];
    }
    else {
      $name = $this->t('to no one');
    }
    return array(
      '#markup' => $this->t('Hello @name!', array(
        '@name' => $name,
      )),
    ); 
  }


  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['learning_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => isset($config['learning_name']) ? $config['learning_name'] : '',
    );

    return $form;
  }

  /**
  * {@inheritdoc}
  */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['learning_name'] = $form_state->getValue('learning_name');
  }

  /**
  * {@inheritdoc}
  */
  public function defaultConfiguration() {
    $default_config = \Drupal::config('learning.settings');
    return [
      'learning_name' => $default_config->get('learning.name'),
    ];
  }
}
