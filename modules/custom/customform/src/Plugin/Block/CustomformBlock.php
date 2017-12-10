<?php
/**
 * @file
 * Contains \Drupal\first_module\Plugin\Block\HelloBlock.
 */
 
namespace Drupal\customform\Plugin\Block;
use Drupal\Core\Block\BlockBase;
 
/**
 * Provides a 'customform' Block
 *
 * @Block(
 *   id = "custom_form",
 *   admin_label = @Translation("Custom form details"),
 * )
 */
class CustomformBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $myConfig = \Drupal::config('customform.settings');
    $name = $myConfig->get('name');
    $department = $myConfig->get('department');
    $email = $myConfig->get('email');
    $details = 'Your details are:'.'<br>'.'Name: '.$name.'<br>'.'Department: '.$department.'<br>'.'Email: '.$email;
    return array(
    '#title' => 'Form Details',
    '#description' => $details,
    '#theme' => 'my_block',
  );
  }
 
}