<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\taxonomy\Entity\Term;
  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Annotation\Translation;
  use Drupal\Core\Url;
  use Drupal\Core\Link;

  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "contact_us",
   *   admin_label = @Translation("Contact Us Block"),
   * )
   */
  class ContactFrmBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
  public function build() {
    $business_form = \Drupal::formBuilder()->getForm('Drupal\custom_blocks\Form\BusinessForm');
    $career_form = \Drupal::formBuilder()->getForm('Drupal\custom_blocks\Form\CareerForm');
    $enquiry_form = \Drupal::formBuilder()->getForm('Drupal\custom_blocks\Form\EnquiryForm');

    return [
      '#theme'        => 'block__contact_us',
      '#title'        => $this->t('Contact Us'),
      '#businessform' => $business_form,
      '#enquiryform'  => $enquiry_form,
      '#careerform'   => $career_form,
    ];
  }

}
