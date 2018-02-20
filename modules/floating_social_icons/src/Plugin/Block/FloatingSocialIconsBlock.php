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
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    // Facebook details
    $form['floating_facebook'] = array(
      '#type' => 'details',
      '#title' => t('Facebook settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    );
    

    $form ['floating_facebook']['link'] = array(
      '#type' => 'url',
      '#title' => $this->t('Facebook Link'),
      '#size' => 40,
    );
    
    $form['floating_facebook']['enable'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Enable facebook icon.'),
      '#description' => $this->t(''),
    );
   
    // Google Plus details
    $form['floating_google_plus'] = array(
      '#type' => 'details',
      '#title' => t('Google Plus settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    );
    

    $form ['floating_google_plus']['link'] = array(
      '#type' => 'url',
      '#title' => $this->t('Google Link'),
      '#size' => 40,
    );
    
    $form['floating_google_plus']['enable'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Enable Google Plus icon.'),
      '#description' => $this->t(''),
    );

    // LinkedIn details
    $form['floating_linkedIn'] = array(
      '#type' => 'details',
      '#title' => t('LinkdIn settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    );
    

    $form ['floating_linkedIn']['link'] = array(
      '#type' => 'url',
      '#title' => $this->t('LinkedIn Link'),
      '#size' => 40,
    );
    
    $form['floating_linkedIn']['enable'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Enable LinkedIn icon.'),
      '#description' => $this->t(''),
    );
    

    // Twitter details
    $form['floating_twitter'] = array(
      '#type' => 'details',
      '#title' => t('Twitter settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    );
    

    $form ['floating_twitter']['link'] = array(
      '#type' => 'url',
      '#title' => $this->t('Twitter Link'),
      '#size' => 40,
    );
    
    $form['floating_twitter']['enable'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Enable twitter icon.'),
      '#description' => $this->t(''),
    );

    return $form;
  }
}
