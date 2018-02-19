<?php

/**
 * @file
 * Contains \Drupal\simple_social_icons\Plugin\Block\SimpleSocialIconsBlock.
 */

namespace Drupal\simple_social_icons\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Markup;
use Drupal\Core\Url;
use Symfony\Cmf\Component\Routing\RouteObjectInterface;

/**
 * Provides a 'SimpleSocialIconsBlock' block.
 *
 * @Block(
 *  id = "social_floating_block",
 *  admin_label = @Translation("Social floating block"),
 * )
 */
class SocialFloatingIcons extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    
    $form['social_floating_icons_twitter'] = array(
      '#type' => 'details',
      '#title' => t('Twitter settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    );
    $form['social_floating_icons_twitter']['twitter_via'] = array(
      '#type' => 'textfield',
      '#title' => t('Via'),
      '#default_value' => isset($this->configuration['twitter_via']) ? $this->configuration['twitter_via'] : '',
      '#size' => 60,
      '#maxlength' => 128,
      '#weight' => '0',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function build() {

  }

