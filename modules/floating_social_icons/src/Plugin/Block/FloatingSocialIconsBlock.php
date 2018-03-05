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

  public function build() {  

    // Load the configuration from the form
    $config = $this->getConfiguration();

    $facebook = isset($config['facebook']) ? $config['facebook'] : '';
    $google_plus = isset($config['google_plus']) ? $config['google_plus'] : '';
    $linkedIn = isset($config['linkedIn']) ? $config['linkedIn'] : '';
    $twitter = isset($config['twitter']) ? $config['twitter'] : '';
    $pinterest = isset($config['pinterest']) ? $config['pinterest'] : '';
    $instagram = isset($config['instagram']) ? $config['instagram'] : '';
    $icons = isset($config['place']) ? $config['place'] : '';
    $count = isset($config['count']) ? $config['count'] : '';

    $social_values = [
      'facebook' => $facebook,
      'google_plus' => $google_plus,
      'linkedIn' => $linkedIn,
      'twitter' => $twitter,
      'pinterest' => $pinterest,
      'instagram' => $instagram,
      'mail' => $mail,
      'icons' => $icons,
      'count' => $count,
    ];

    return [
      '#theme' => 'floating_social_icons_display',
      '#social_values' => $social_values,
      '#attached' => [
      'library' => ['floating_social_icons/floating_social_icons'],
      ],
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
    

    $form ['floating_facebook']['facebook_link'] = [
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
    

    $form ['floating_twitter']['twitter_link'] = [
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
    

    $form ['floating_google_plus']['google_plus_link'] = [
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
    

    $form ['floating_linkedIn']['linkedIn_link'] = [
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
    

    $form ['floating_pinterest']['pinterest_link'] = [
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
    

    $form ['floating_instagram']['instagram_link'] = [
      '#type' => 'url',
      '#title' => $this->t('Instagram Link'),
      '#size' => 60,
      '#default_value' => isset($this->configuration['instagram']) ? $this->configuration['instagram'] : '',
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
      '#required' => TRUE,
      '#default_value' => isset($this->configuration['place']) ? $this->configuration['place'] : 4,
      '#options' => [
          1 => $this->t('Top'),
          2 => $this->t('Right'),
          3 => $this->t('Bottom'),
          4 => $this->t('Left'),
      ],
    ];

    $form['floating_icons']['count'] = [
      '#title' =>  t('count'),
      '#value' => isset($this->configuration['count']) ? $this->configuration['count'] :'',
      '#type' => 'hidden'
    ];

    return $form;
  }

  public function blockValidate($form, FormStateInterface $form_state) {

    $values = $form_state->getValues();

    $links = [];
    $links[] = $values['floating_facebook']['facebook_link'];
    $links[] = $values['floating_twitter']['twitter_link'];
    $links[] = $values['floating_google_plus']['google_plus_link'];
    $links[] = $values['floating_linkedIn']['linkedIn_link'];
    $links[] = $values['floating_pinterest']['pinterest_link'];
    $links[] = $values['floating_instagram']['instagram_link'];

    $count = 0;
    if($links) {
      foreach ($links as $key => $link) {
        if(!empty($link)){
            $count = $count + 1;
        }      
      } 
    }
    if ($count < 2) {
      $form_state->setErrorByName('floatingsocialblock',$this->t('Atleast two fields should be filled.'));
    }
    // Setting count value
    $this->configuration['count'] = $count;
  }
  

  public function blockSubmit($form, FormStateInterface $form_state) {
    
    parent::blockSubmit($form, $form_state);

    $values = $form_state->getValues();
  
    $this->configuration['facebook'] = $values['floating_facebook']['facebook_link'];
    $this->configuration['google_plus'] = $values['floating_google_plus']['google_plus_link'];
    $this->configuration['linkedIn'] = $values['floating_linkedIn']['linkedIn_link'];
    $this->configuration['twitter'] = $values['floating_twitter']['twitter_link'];
    $this->configuration['pinterest'] = $values['floating_pinterest']['pinterest_link'];
    $this->configuration['instagram'] = $values['floating_instagram']['instagram_link'];
    $this->configuration['place'] = $values['floating_icons']['place'];    
  }
}