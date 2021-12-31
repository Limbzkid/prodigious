<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Annotation\Translation;
  use Drupal\Core\Url;
  use Drupal\Core\Link;



  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "work_filter",
   *   admin_label = @Translation("Work Filter Block"),
   * )
   */
  class WorkFilterBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $ind = array();
      $mkt = array();
      $catg = array();
      $query = \Drupal::entityQuery('node')
          ->condition('status', NODE_PUBLISHED)
          ->condition('type', 'work');
      $nids = $query->execute();
      $nodes = entity_load_multiple('node', $nids);

      foreach($nodes as $node) {
        if(!in_array($node->field_industry->entity->name->value, $ind)) {
          if($node->field_industry->entity->name->value) {
            array_push($ind, $node->field_industry->entity->name->value);
          }
        }

        if(!in_array($node->field_market->entity->name->value, $mkt)) {
          array_push($mkt, $node->field_market->entity->name->value);
        }
        foreach($node->field_category as $cat) {
          if(!in_array($cat->entity->name->value, array_column($catg,'name'))) {
            $catg[] = array(
              'name' => $cat->entity->name->value,
              'color' => $cat->entity->field_color->value
            );
          }
        }
      }

      $data['industry'] = $ind;
      $data['market'] = $mkt;
      $data['category'] = $catg;

      //echo '<pre>'; print_r($data); exit;

      return [
        '#theme'    => 'block__workfilter',
        '#data_obj' => $data,
      ];
    }
  }
