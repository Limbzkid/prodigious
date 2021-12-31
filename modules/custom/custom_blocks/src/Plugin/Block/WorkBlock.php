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
   *   id = "work",
   *   admin_label = @Translation("Work Block"),
   * )
   */
  class WorkBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $data = array();

      $node = \Drupal::routeMatch()->getParameter('node');
      $nid = $node->id();

      $query = \Drupal::entityQuery('node')
          ->condition('status', NODE_PUBLISHED)
          ->condition('type', 'work')
          ->condition('nid', $nid, '<>')
          ->sort('field_date', 'DESC');
          //->range(0,6);
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
          'image' => file_create_url($node->field_image->entity->getFileUri()),
          'url'   => $node->toUrl()->setAbsolute()->toString(),
          'category' => $catg,
          'nid'   => $node->nid->value,
          'alt'   => $node->field_image->alt,
          'title' => $node->field_image->title
        );

      }

      //echo '<pre>'; print_r($data); exit;

      return [
        '#theme'    => 'block__work',
        '#data_obj' => $data,
      ];
    }
  }
