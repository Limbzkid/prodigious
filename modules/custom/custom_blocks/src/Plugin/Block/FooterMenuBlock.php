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
   *   id = "footer_menu",
   *   admin_label = @Translation("Footer Menu Block"),
   * )
   */
  class FooterMenuBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $data = array();
      $tree = \Drupal::menuTree()->load('footer', new \Drupal\Core\Menu\MenuTreeParameters());
      $manipulators = array(
        ['callable' => 'menu.default_tree_manipulators:generateIndexAndSort']
      );
      $tree = \Drupal::menuTree()->transform($tree, $manipulators);

      foreach ($tree as $item) {
        if($item->link->isEnabled()) {
          $data[] = array(
            'title' => $item->link->getTitle(),
            'link'  => $item->link->getUrlObject()->toString(),
          );
        }
      }
      //echo '<pre>'; print_r($data); exit;
      return [
        '#theme'      => 'block__footer_menu',
        '#title'      => $this->t('Footer Menu'),
        '#data_obj'   => $data,
      ];
    }
  }
