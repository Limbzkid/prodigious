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
   *   id = "work_next",
   *   admin_label = @Translation("Work Next Block"),
   * )
   */
  class WorkNextBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {

      $next = '';
      $prev = '';

      $node = \Drupal::routeMatch()->getParameter('node');
      if ($node instanceof \Drupal\node\NodeInterface) {
        $nid = $node->id();
        $date = $node->field_date->value;
      }

      //echo 'current'. $nid .'<br>';

      $query = \Drupal::entityQuery('node');
      $query->condition('status', NODE_PUBLISHED);
      $query->condition('type', 'work');
      $query->condition('nid', $nid, '>');
      $query->condition('field_date', $date, '>=');
      //$query->sort('field_date', 'ASC');
      $query->sort('created', 'ASC');
      $query->range(0,1);
      $nodes = $query->execute();
      if ($node = reset($nodes)) {
        $next_id = $node;
        $options = ['absolute' => TRUE];
        $next = \Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $next_id], $options);
      }

      $query = \Drupal::entityQuery('node');
      $query->condition('status', NODE_PUBLISHED);
      $query->condition('type', 'work');
      $query->condition('nid', $nid, '<');
      //$query->sort('field_date', 'DESC');
      $query->sort('created', 'DESC');
      $query->range(0,1);
      $nodes = $query->execute();
      if ($node = reset($nodes)) {
        echo $node->nid->value;
        $prev_id = $node;
        $options = ['absolute' => TRUE];
        $prev = \Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $prev_id], $options);
      }

      return [
        '#theme'  => 'block__work_next',
        '#next'   => $next,
        '#prev'   => $prev
      ];
    }
  }
