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
   *   id = "home_ourwork",
   *   admin_label = @Translation("Home OurWork Block"),
   * )
   */
  class HomeOurWorkBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $data = array();
      $query = \Drupal::entityQuery('node')
          ->condition('status', NODE_PUBLISHED)
          ->condition('type', 'work')
          ->sort('field_date', 'DESC')
          ->range(0,8);
      $nids = $query->execute();
      $nodes = entity_load_multiple('node', $nids);

      foreach($nodes as $node) {
        if($node->field_home_block_image->target_id) {
          $image = file_create_url($node->field_home_block_image->entity->getFileUri());
        } else {
          $image = file_create_url($node->field_image->entity->getFileUri());
        }
        $data[] = array(
          'image' => $image,
          'link'  => $node->toUrl()->setAbsolute()->toString(),
          'alt'   => $node->field_image->alt,
          'title' => $node->field_image->title,
        );
      }

      //echo '<pre>'; print_r($data); exit;

      return [
        '#theme'    => 'block__ourwork',
        '#data_obj' => $data,
      ];
    }
  }
