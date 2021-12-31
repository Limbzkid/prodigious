<?php

  /**
    * @file
    * Contains \Drupal\custom_pages\Form\BusinessListingFrm.
    */
  namespace Drupal\custom_pages\Form;

  use Drupal\Core\Form\FormBase;
  use Drupal\Core\Ajax\AjaxResponse;
  use Drupal\Core\Ajax\ChangedCommand;
  use Drupal\Core\Ajax\CssCommand;
  use Drupal\Core\Ajax\HtmlCommand;
  use Drupal\Core\Ajax\InvokeCommand;
  use Drupal\Core\Form\FormStateInterface;

  class BusinessListingFrm extends FormBase {

    /**
    * {@inheritdoc}
    */
    public function getFormId() {
      return 'business-listing';
    }

    /**
    * {@inheritdoc}
    */

    public function buildForm(array $form, FormStateInterface $form_state) {

      $form['from_date'] = array(
        '#weight' => '0',
        '#type' => 'date',
        '#title' => 'From Date',
        '#date_format' => 'd/m/Y',
        '#date_year_range' => '-5:+5', //allow 5 years past and future
        '#default_value' => time(), //default date to January 1 of current year
      );

      $form['to_date'] = array(
        '#weight' => '1',
        '#type' => 'date',
        '#title' => 'To Date',
        '#date_format' => 'd/m/Y',
        '#date_year_range' => '-5:+5', //allow 5 years past and future
        '#default_value' => time(), //default date to January 1 of current year
      );

      $form['submit'] = array(
        '#weight' => '2',
        '#type' => 'button',
        '#value' => 'Filter',
        '#ajax' => array(
          'callback' => '::contactCallback',
          'event' => 'click',
          'wrapper' => 'upload-resume',
          'progress' => array(
            'type' => 'throbber',
            'message' => 'Please wait',
          ),
        ),
      );

      return $form;

    }

    public function submitForm(array &$form, FormStateInterface $form_state) {


      //exit;
    }

    public function contactCallback(array &$form, FormStateInterface $form_state) {
      $base_url = \Drupal::urlGenerator()->generateFromRoute('<front>', [], ['absolute' => TRUE]);
      $error = '';
      if($form_state->getValue('from_date') == '') {
        $error .= '<li class="messages__item">Please select From date.</li>';
      }

      if($form_state->getValue('from_date') == '') {
        $error .= '<li class="messages__item">Please select To date.</li>';
      }

      $from = strtotime($form_state->getValue('from_date'));
      $to = strtotime($form_state->getValue('to_date')) + 86400;
      if($from > $to) {
        $error .= '<li class="messages__item">From date cannot be greater than To date.</li>';
      }

      $ajax_response = new AjaxResponse();

      if($error != '') {
        $error = '<div data-drupal-messages-fallback="" class="hidden"></div>
                  <div data-drupal-messages="">
                    <div role="contentinfo" aria-label="Error message" class="messages messages--error">
                      <div role="alert">
                        <h2 class="visually-hidden">Error message</h2>
                        <ul class="messages__list">'.$error.'</ul>
                      </div>
                    </div>
                  </div>';
        $ajax_response->addCommand(new HtmlCommand('.region-highlighted', $error));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.region-highlighted', ''));
        $index = 1;
        $htmlContent = '';
        $query = \Drupal::database()->select('contact_us', 'co');
        $query->fields('co', ['id','type','name','email','location', 'message', 'created']);
        $query->orderBy('co.created', 'DESC');
        $query->condition('co.type', 'Business');
        $query->condition('co.created', $from, '>=');
        $query->condition('co.created', $to, '<=');
        $count_query = $query->countQuery();
        $num_rows = $query->countQuery()->execute()->fetchField();
        $results = $query->execute();


        if($num_rows > 0) {
          foreach($results as $row) {
            $file_arr = array();

            $htmlContent .= '<tr>
                              <td>'.$index.'</td>
                              <td>'.$row->type.'</td>
                              <td>'.ucwords($row->name).'</td>
                              <td>'.$row->email.'</td>
                              <td>'.$row->location.'</td>
                              <td>'.$row->message.'</td>
                              <td>'.date('d/m/Y', $row->created).'</td>';
            $htmlContent .= '</tr>';
            $index++;
          }
          $download = '<a href="'.$base_url.'admin/contact-data/business/download?frm='.$from.'&to='.$to.'">Download</a>';
          $ajax_response->addCommand(new HtmlCommand('.download', $download));
          $ajax_response->addCommand(new HtmlCommand('tbody', $htmlContent));
        } else {
          $ajax_response->addCommand(new HtmlCommand('tbody', 'No Records found.'));
          $ajax_response->addCommand(new HtmlCommand('.download', ''));
        }
        $ajax_response->addCommand(new HtmlCommand('.pager', ''));
      }

      return $ajax_response;
    }




  }
