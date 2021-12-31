<?php
  namespace Drupal\custom_blocks\Plugin\Block;

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
   *   id = "work_listing",
   *   admin_label = @Translation("Work Listing Block"),
   * )
   */
  class WorkListingBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $data = array();

      $cap = array();

      if(isset($_GET['q'])) {
        $cap =  str_replace('_', ' ', $_GET['q']);
      }

      $query = \Drupal::entityQuery('node');
      $query->condition('status', NODE_PUBLISHED);
      $query->condition('type', 'work');
      if(isset($_GET['q'])) {
        $query->condition('field_category.entity:taxonomy_term.name', $cap);
      }
      $query->sort('field_date', 'DESC');
      $nids = $query->execute();
      $nodes = entity_load_multiple('node', $nids);

      foreach($nodes as $node) {
        $catg = array();
        foreach($node->field_category as $cat) {
          $catg[] = array(
            'name' => $cat->entity->name->value,
            'color' => $cat->entity->field_color->value,
          );
        }
        $data[] = array(
          'name' => $node->title->value,
          'brand' => $node->field_brand->value,
          'image' => $node->field_image->target_id?file_create_url($node->field_image->entity->getFileUri()):'',
          'url'   => $node->toUrl()->setAbsolute()->toString(),
          'category' => $catg,
          'alt'  => $node->field_image->alt,
          'title' => $node->field_image->title
        );

      }

      //echo '<pre>'; print_r($data); exit;

      return [
        '#theme'    => 'block__work_listing',
        '#data_obj' => $data,
      ];
    }
  }
