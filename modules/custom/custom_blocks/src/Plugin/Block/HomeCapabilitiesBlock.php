<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\taxonomy\Entity\Term;
  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Annotation\Translation;
  use Drupal\Core\Url;
  use Drupal\Core\Link;
  use Drupal\file\Entity\File;


  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "home_capabilities",
   *   admin_label = @Translation("Home Capabilities Block"),
   * )
   */
  class HomeCapabilitiesBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {

      $base_url = \Drupal::urlGenerator()->generateFromRoute('<front>', [], ['absolute' => TRUE]);

      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid', 'category');
      $query->sort('weight');
      $tids = $query->execute();
      $terms = Term::loadMultiple($tids);
      foreach($terms as $term) {
        $term_name = trim($term->name->value);
        $name = str_replace(' ', '_', strtolower($term_name));
        $data[$name] = array(
            'name'  => str_replace(' ', '<br/>', trim($term_name)),
            'desc'  => $term->description->value,
            'color' => $term->field_color->value,
            'link'  => urldecode($term->toUrl()->setAbsolute()->toString()),
        );
      }

      //echo '<pre>'; print_r($data); exit;

      return [
        '#theme'    => 'block__capabilities',
        '#data_obj' => $data,
      ];
    }
  }
