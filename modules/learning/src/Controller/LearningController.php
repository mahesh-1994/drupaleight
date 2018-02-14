<?php

namespace Drupal\learning\Controller;

use Drupal\Core\Controller\ControllerBase;
/**
 * Controller routines for page example routes.
 */
class LearningController extends ControllerBase {

  /**
   * Constructs a simple page.
   *
   * The router _controller callback, maps the path
   * 'learning/page/simple' to this method.
   *
   * _controller callbacks return a renderable array for the content area of the
   * page. The theme system will later render and surround the content with the
   * appropriate blocks, navigation, and styling.
   */
  public function simple() {
    return [
      '#markup' => '<h1>'.t('This is my first module').'</h1>'.'<p>' . $this->t('English Pangram: The quick brown fox jumps over the lazy dog.') . '</p>',
    ];
  }
}
