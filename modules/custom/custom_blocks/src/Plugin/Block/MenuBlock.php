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
   *   id = "main_menu",
   *   admin_label = @Translation("Main Menu Block"),
   * )
   */
  class MenuBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $data = array();
      $tree = \Drupal::menuTree()->load('main', new \Drupal\Core\Menu\MenuTreeParameters());
      $manipulators = array(
        ['callable' => 'menu.default_tree_manipulators:generateIndexAndSort']
      );
      $tree = \Drupal::menuTree()->transform($tree, $manipulators);

      $url = Url::fromRoute('<current>',array())->toString();

      foreach ($tree as $item) {
        $class = '';
        $link = $item->link->getUrlObject()->toString();
        if($link == $url) {
          $class = ' active';
        }
        if($item->link->isEnabled()) {
          $data[] = array(
            'title' => $item->link->getTitle(),
            'link'  => $item->link->getUrlObject()->toString(),
            'class' => $class,
          );
        }
      }
      //echo '<pre>'; print_r($data); exit;
      return [
        '#theme'      => 'block__main_menu',
        '#title'      => $this->t('Main Menu'),
        '#data_obj'   => $data,
      ];
    }
  }
