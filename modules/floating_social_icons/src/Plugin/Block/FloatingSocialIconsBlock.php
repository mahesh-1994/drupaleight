<?php

namespace Drupal\floating_social_icons\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Floating Social Icon' Block.
 *
 * @Block(
 *   id = "floating icons",
 *   admin_label = @Translation("Floating Social Block"),
 *   category = @Translation("social icon"),
 * )
 */
class FloatingSocialIconsBlock extends BlockBase {

  public function build() {
    return array(
      '#markup' => $this->t('Hello, World!'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    // $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['simple_social_icons_twitter'] = array(
      '#type' => 'details',
      '#title' => t('Twitter settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    );
    
    $form['simple_social_icons_twitter']['twitter_via'] = array(
      '#type' => 'textfield',
      '#title' => t('Via'),
      '#size' => 60,
      '#maxlength' => 128,
      '#weight' => '0',
    );
    
    $form['simple_social_icons_twitter']['twitter_enable'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Disable twitter icon.'),
      '#description' => $this->t(''),
      '#weight' => '1',
    );

    return $form;
  }
}
