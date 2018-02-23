<?php

namespace Drupal\floating_social_icons\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Floating Social Icon' Block.
 *
 * @Block(
 *   id = "floating_icons",
 *   admin_label = @Translation("Floating Social Block"),
 *   category = @Translation("social icon"),
 * )
 */
class FloatingSocialIconsBlock extends BlockBase {
// https://spinningcode.org/2017/01/a-pattern-for-drupal-8-blocks/
  public function build() {

    // Load the configuration from the form
    $config = $this->getConfiguration();
    $facebook = isset($config['facebook']) ? $config['facebook'] : '';
    $google_plus = isset($config['google_plus']) ? $config['google_plus'] : '';
    $linkedIn = isset($config['linkedIn']) ? $config['linkedIn'] : '';
    $twitter = isset($config['twitter']) ? $config['twitter'] : '';
    $pinterest = isset($config['pinterest']) ? $config['pinterest'] : '';
    $instagram = isset($config['instagram']) ? $config['instagram'] : '';
    $mail = isset($config['mail']) ? $config['mail'] : '';
    $icons = isset($config['icons']) ? $config['icons'] : '';


    $social_values = [
      'facebook' => $facebook,
      'google_plus' => $google_plus,
      'linkedIn' => $linkedIn,
      'twitter' => $twitter,
      'pinterest' => $pinterest,
      'instagram' => $instagram,
      'mail' => $mail,
      'icons' => $icons,
    ];
    
    // $build = [];
    // $build['#cache']['max-age'] = 0; // No cache
    // $build['#theme'] = 'floating_social_icons_block';

    // return $build;
    
    // return [
    //   '#markup' => $this->t('Hello, World!'),
    // ];

    return [
      '#theme' => 'floating_social_icons_display',
      '#social_values' => $social_values,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    
    $config = $this->getConfiguration();

    // Facebook details
    $form['floating_facebook'] = [
      '#type' => 'details',
      '#title' => t('Facebook settings'),
      '#collapsible' => TRUE,
      '#open' => TRUE,
      '#description' => '',
    ];
    

    $form ['floating_facebook']['link'] = [
      '#type' => 'url',
      '#title' => $this->t('Facebook Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['facebook']) ? $this->configuration['facebook'] : '',
    ];
    
    // $form['floating_facebook']['enable'] = [
    //   '#type' => 'checkbox',
    //   '#title' => $this->t('Enable facebook icon.'),
    //   '#description' => $this->t(''),
    // ];

        // Twitter details
    $form['floating_twitter'] = [
      '#type' => 'details',
      '#title' => t('Twitter settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    ];
    

    $form ['floating_twitter']['link'] = [
      '#type' => 'url',
      '#title' => $this->t('Twitter Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['twitter']) ? $this->configuration['twitter'] : '',
    ];
    
    // Google Plus details
    $form['floating_google_plus'] = [
      '#type' => 'details',
      '#title' => t('Google Plus settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#description' => '',
    ];
    

    $form ['floating_google_plus']['link'] = [
      '#type' => 'url',
      '#title' => $this->t('Google Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['google_plus']) ? $this->configuration['google_plus'] : '',
    ];
    
    // LinkedIn details
    $form['floating_linkedIn'] = [
      '#type' => 'details',
      '#title' => t('LinkedIn settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#description' => '',
    ];
    

    $form ['floating_linkedIn']['link'] = [
      '#type' => 'url',
      '#title' => $this->t('LinkedIn Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['linkedIn']) ? $this->configuration['linkedIn'] : '',
    ];
    

    // Pinterest details
    $form['floating_pinterest'] = [
      '#type' => 'details',
      '#title' => t('Pinterest settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    ];
    

    $form ['floating_pinterest']['link'] = [
      '#type' => 'url',
      '#title' => $this->t('Pinterest Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['pinterest']) ? $this->configuration['pinterest'] : '',
    ];

    // Instagram details
    $form['floating_instagram'] = [
      '#type' => 'details',
      '#title' => t('Instagram settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    ];
    

    $form ['floating_instagram']['link'] = [
      '#type' => 'url',
      '#title' => $this->t('Instagram Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['instagram']) ? $this->configuration['instagram'] : '',
    ];

    // Mail details
    $form['floating_mail'] = [
      '#type' => 'details',
      '#title' => t('Mail settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    ];
    

    $form ['floating_mail']['link'] = [
      '#type' => 'url',
      '#title' => $this->t('Mail Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['mail']) ? $this->configuration['mail'] : '',
    ];

    // Block details
    $form['floating_icons'] = [
      '#type' => 'details',
      '#title' => t('Display Icons'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => $this->t(''),
    ];
    
    $form['floating_icons']['place'] = [
      '#type' => 'radios',
      '#title' => $this->t('Where do you want to display the icons'),
      '#default_value' => isset($this->configuration['place']) ? $this->configuration['place'] : 3,
      '#options' => [
          0 => $this->t('Top'),
          1 => $this->t('Bottom'),
          2 => $this->t('Right'),
          3 => $this->t('Left'),
      ],
    ];

    return $form;
  }

  public function blockValidate($form, FormStateInterface $form_state) {

  }

  public function blockSubmit($form, FormStateInterface $form_state) {
    
    parent::blockSubmit($form, $form_state);

    $values = $form_state->getValues();

    $this->configuration['facebook'] = $values['floating_facebook']['link'];
    $this->configuration['google_plus'] = $values['floating_google_plus']['link'];
    $this->configuration['linkedIn'] = $values['floating_linkedIn']['link'];
    $this->configuration['twitter'] = $values['floating_twitter']['link'];
    $this->configuration['pinterest'] = $values['floating_pinterest']['link'];
    $this->configuration['instagram'] = $values['floating_instagram']['link'];
    $this->configuration['mail'] = $values['floating_mail']['link'];
    $this->configuration['place'] = $values['floating_icons']['place'];    
  }
}
