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
    
    $build = [];
    $build['#cache']['max-age'] = 0; // No cache
    $build['#theme'] = 'floating_social_icons_block';

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    
    $config = $this->getConfiguration();

    // kint($this->configuration['facebook']);

    // Facebook details
    $form['floating_facebook'] = array(
      '#type' => 'details',
      '#title' => t('Facebook settings'),
      '#collapsible' => TRUE,
      '#open' => TRUE,
      '#description' => '',
    );
    

    $form ['floating_facebook']['link'] = array(
      '#type' => 'url',
      '#title' => $this->t('Facebook Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['facebook']) ? $this->configuration['facebook'] : '',
    );
    
    // $form['floating_facebook']['enable'] = array(
    //   '#type' => 'checkbox',
    //   '#title' => $this->t('Enable facebook icon.'),
    //   '#description' => $this->t(''),
    // );

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
      '#size' => 60,
      '#default_value' => isset($this->configuration['twitter']) ? $this->configuration['twitter'] : '',
    );
    
    // $form['floating_twitter']['enable'] = array(
    //   '#type' => 'checkbox',
    //   '#title' => $this->t('Enable twitter icon.'),
    //   '#description' => $this->t(''),
    // );
   
    // Google Plus details
    $form['floating_google_plus'] = array(
      '#type' => 'details',
      '#title' => t('Google Plus settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#description' => '',
    );
    

    $form ['floating_google_plus']['link'] = array(
      '#type' => 'url',
      '#title' => $this->t('Google Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['google_plus']) ? $this->configuration['google_plus'] : '',
    );
    
    // $form['floating_google_plus']['enable'] = array(
    //   '#type' => 'checkbox',
    //   '#title' => $this->t('Enable Google Plus icon.'),
    //   '#description' => $this->t(''),
    // );

    // LinkedIn details
    $form['floating_linkedIn'] = array(
      '#type' => 'details',
      '#title' => t('LinkedIn settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#description' => '',
    );
    

    $form ['floating_linkedIn']['link'] = array(
      '#type' => 'url',
      '#title' => $this->t('LinkedIn Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['linkedIn']) ? $this->configuration['linkedIn'] : '',
    );
    
    // $form['floating_linkedIn']['enable'] = array(
    //   '#type' => 'checkbox',
    //   '#title' => $this->t('Enable LinkedIn icon.'),
    //   '#description' => $this->t(''),
    // );  

    // Pinterest details
    $form['floating_pinterest'] = array(
      '#type' => 'details',
      '#title' => t('Pinterest settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    );
    

    $form ['floating_pinterest']['link'] = array(
      '#type' => 'url',
      '#title' => $this->t('Pinterest Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['pinterest']) ? $this->configuration['pinterest'] : '',
    );

    // $form['floating_pinterest']['enable'] = array(
    //   '#type' => 'checkbox',
    //   '#title' => $this->t('Enable Pinterest icon.'),
    //   '#description' => $this->t(''),
    // );

    // Instagram details
    $form['floating_instagram'] = array(
      '#type' => 'details',
      '#title' => t('Instagram settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    );
    

    $form ['floating_instagram']['link'] = array(
      '#type' => 'url',
      '#title' => $this->t('Instagram Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['instagram']) ? $this->configuration['instagram'] : '',
    );

    // $form['floating_instagram']['enable'] = array(
    //   '#type' => 'checkbox',
    //   '#title' => $this->t('Enable Instagram icon.'),
    //   '#description' => $this->t(''),
    // );

    // Mail details
    $form['floating_mail'] = array(
      '#type' => 'details',
      '#title' => t('Mail settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => '',
    );
    

    $form ['floating_mail']['link'] = array(
      '#type' => 'url',
      '#title' => $this->t('Mail Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['mail']) ? $this->configuration['mail'] : '',
    );

    // $form['floating_mail']['enable'] = array(
    //   '#type' => 'checkbox',
    //   '#title' => $this->t('Enable Mail icon.'),
    //   '#description' => $this->t(''),
    // );

    // Block details
    $form['floating_icons'] = array(
      '#type' => 'details',
      '#title' => t('Display Icons'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#description' => $this->t(''),
    );
    
    $form['floating_icons']['place'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Where do you want to display the icons'),
      '#default_value' => isset($this->configuration['icons']) ? $this->configuration['icons'] : 0,
      '#options' => array(
          0 => $this->t('Top'),
          1 => $this->t('Bottom'),
          2 => $this->t('Right'),
          3 => $this->t('Left'),
      ),
    );

    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state) {
    
    parent::blockSubmit($form, $form_state);
    
    $values = $form_state->getValues();

    $this->configuration['facebook'] = $values['floating_facebook'];
    $this->configuration['google_plus'] = $values['floating_google_plus'];
    $this->configuration['linkedIn'] = $values['floating_linkedIn'];
    $this->configuration['twitter'] = $values['floating_twitter'];
    $this->configuration['pinterest'] = $values['floating_pinterest'];
    $this->configuration['instagram'] = $values['floating_instagram'];
    $this->configuration['mail'] = $values['floating_mail'];
    $this->configuration['icons'] = $values['floating_icons'];


    
  }
}
