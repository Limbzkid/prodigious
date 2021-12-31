<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\Core\Block\BlockBase;
  use Drupal\taxonomy\Entity\Term;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Annotation\Translation;
  use Drupal\Core\Url;
  use Drupal\Core\Link;



  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "home_network",
   *   admin_label = @Translation("Home Network Block"),
   * )
   */
  class HomeNetworkBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $region = array();
      $head   = array();
      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid', 'locations');
      $query->sort('weight');
      $tids = $query->execute();
      $terms = Term::loadMultiple($tids);
      foreach($terms as $term) {
        $name = trim($term->name->value);
        $timezone = $term->field_timezone->entity->name->value;
        $addr = $term->description->value;
        $phone = $term->field_contact->value;
        $email = $term->field_email->value;
        $sys_timezone = $term->field_timezone->entity->field_system_timezone->value;

        if(!array_key_exists($timezone, $head)) {
          if($timezone) {
            $head[$timezone] = array(
              'zone'    => $timezone,
              'class'   => $term->field_timezone->entity->field_class_color->value,
              'c_class' => $term->field_timezone->entity->field_clock_class->value,
              'sys_time'=> $sys_timezone,
            );
          }
        }


        $region[$timezone][] = array(
          'name'  => $name,
          'addr'  => $addr,
          'phone' => str_replace(' ', '', trim($phone)),
          'email' => trim($email),
        );

        $data[] = array(
            'name'      => $name,
            'desc'      => strip_tags($addr),
            'timezone'  => $timezone,
            'contact'   => str_replace(' ', '', trim($phone)),
            'email'     => trim($email),
            'sys_time'  => $sys_timezone,
        );
      }

      //echo '<pre>';print_r($head); exit;

      return [
        '#theme'    => 'block__home_network',
        '#data_obj' => $data,
        '#region'   => $region,
        '#head'     => $head
      ];
    }
  }
