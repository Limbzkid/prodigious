<?php

/**
  @file
  Contains \Drupal\custom_pages\Controller\customPagesController.
 */

namespace Drupal\custom_pages\Controller;

use Drupal\node\Entity\Node;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use GuzzleHttp\Client;
use Drupal\Core\Url;

class customPagesController extends ControllerBase {

  public function admin_page() {

    $htmlContent = '<ul class="admin-list">
          <li><a href="/admin/contact-data/business"><span class="label">Business</span><div class="description">Lists Business data.</div></a></li>
          <li><a href="/admin/contact-data/enquiry"><span class="label">Enquiry</span><div class="description">Lists Enquiry data.</div></a></li>
          <li><a href="/admin/contact-data/career"><span class="label">Career</span><div class="description">Lists Carrer data.</div></a></li>
      </ul>';
    $build = array(
      '#type' => 'markup',
      '#markup' => $htmlContent,
    );
    return $build;
  }

  public function business_form_listing() {

    $base_url = \Drupal::urlGenerator()->generateFromRoute('<front>', [], ['absolute' => TRUE]);
    $htmlContent = '<br><br><hr>';
    $htmlContent .= "<table><thead><tr><th>Sl.No</th><th>Type</th><th>Name</th><th>Email</th><th>Location</th><th>Comment</th><th>Created</th></tr></thead><tbody>";
    $index = 1;
    $query = \Drupal::database()->select('contact_us', 'co');
    $query->fields('co', ['id','type','name', 'email','location', 'message', 'created']);
    $query->condition('co.type', 'Business');
    $query->orderBy('co.created', 'DESC');
    $pager = $query->extend('Drupal\Core\Database\Query\PagerSelectExtender')
          ->limit(20);
    $results = $pager->execute();
    //$users = $query->execute()->fetchAllAssoc('uid');
    foreach($results as $row) {
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
    $htmlContent .= '</tbody></table><br><div class="download"><a href="'.$base_url.'admin/contact-data/business/download">Download</a></div>';
    $output = array(
        '#markup' => $htmlContent,
    );
    $build['form'] = $this->formBuilder()->getForm('Drupal\custom_pages\Form\BusinessListingFrm');
    $build['result'] = $output;
    $build['pager'] = [
      '#type' => 'pager',
    ];
    return $build;
  }

  public function business_download() {
    $query = \Drupal::database()->select('contact_us', 'co');
    $query->fields('co', ['type','name', 'email', 'location', 'message', 'created']);
    if(isset($_GET['frm'])) {
      $query->condition('co.created', $_GET['frm'], '>=');
    }
    if(isset($_GET['to'])) {
      $query->condition('co.created', $_GET['to'], '<=');
    }
    $query->condition('co.type', 'Business');
    $query->orderBy('co.created', 'DESC');
    $results = $query->execute();

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=contact_data.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Type','Name','email', 'Location', 'Comment', 'Date'));
    foreach($results as $row) {
      $created = date('d/m/Y', $row->created);
      $data = array($row->type,$row->name,$row->email, $row->location,$row->message,$created);
      fputcsv($output, $data);
    }
    fclose($output);
    exit();
  }

  public function enquiry_form_listing() {

    $base_url = \Drupal::urlGenerator()->generateFromRoute('<front>', [], ['absolute' => TRUE]);
    $htmlContent = '<br><br><hr>';
    $htmlContent .= "<table><thead><tr><th>Sl.No</th><th>Type</th><th>Name</th><th>Email</th><th>Location</th><th>Comment</th><th>Created</th></tr></thead><tbody>";
    $index = 1;
    $query = \Drupal::database()->select('contact_us', 'co');
    $query->fields('co', ['id','type','name', 'email', 'location', 'message', 'created']);
    $query->condition('co.type', 'Enquiry');
    $query->orderBy('co.created', 'DESC');
    $pager = $query->extend('Drupal\Core\Database\Query\PagerSelectExtender')
          ->limit(20);
    $results = $pager->execute();
    //$users = $query->execute()->fetchAllAssoc('uid');
    foreach($results as $row) {
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
    $htmlContent .= '</tbody></table><br><div class="download"><a href="'.$base_url.'admin/contact-data/enquiry/download">Download</a></div>';
    $output = array(
        '#markup' => $htmlContent,
    );
    $build['form'] = $this->formBuilder()->getForm('Drupal\custom_pages\Form\EnquiryListingFrm');
    $build['result'] = $output;
    $build['pager'] = [
      '#type' => 'pager',
    ];
    return $build;
  }

  public function enquiry_download() {
    $query = \Drupal::database()->select('contact_us', 'co');
    $query->fields('co', ['type','name', 'email', 'location', 'message', 'created']);
    if(isset($_GET['frm'])) {
      $query->condition('co.created', $_GET['frm'], '>=');
    }
    if(isset($_GET['to'])) {
      $query->condition('co.created', $_GET['to'], '<=');
    }
    $query->condition('co.type', 'Enquiry');
    $query->orderBy('co.created', 'DESC');
    $results = $query->execute();

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=contact_data.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Type','Name','email', 'Location', 'Comment', 'Date'));
    foreach($results as $row) {
      $created = date('d/m/Y', $row->created);
      $data = array($row->type,$row->name,$row->email, $row->location,$row->message,$created);
      fputcsv($output, $data);
    }
    fclose($output);
    exit();
  }

  public function career_form_listing() {

    $base_url = \Drupal::urlGenerator()->generateFromRoute('<front>', [], ['absolute' => TRUE]);
    $htmlContent = '<br><br><hr>';
    $htmlContent .= "<table><thead><tr><th>Sl.No</th><th>Type</th><th>Name</th><th>Email</th><th>Location</th><th>Comment</th><th>Created</th><th>Resume 1</th><th>Resume 2</th><th>Resume 3</th></tr></thead><tbody>";
    $index = 1;
    $query = \Drupal::database()->select('contact_us', 'co');
    $query->fields('co', ['id','type','name', 'email', 'location', 'message', 'fids', 'created']);
    $query->condition('co.type', 'Career');
    $query->orderBy('co.created', 'DESC');
    $pager = $query->extend('Drupal\Core\Database\Query\PagerSelectExtender')
          ->limit(20);
    $results = $pager->execute();
    //$users = $query->execute()->fetchAllAssoc('uid');
    foreach($results as $row) {
      $file_arr = array();
      if($row->fids != '') {
        $fids = explode(',', $row->fids);
        if(!empty($fids)) {
          foreach($fids as $fid) {
            $file = \Drupal\file\Entity\File::load($fid);
            if($file) {
              $file_arr[] = file_create_url($file->getFileUri());
            }
          }
        }
      }
      $htmlContent .= '<tr>
                        <td>'.$index.'</td>
                        <td>'.$row->type.'</td>
                        <td>'.ucwords($row->name).'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$row->location.'</td>
                        <td>'.$row->message.'</td>
                        <td>'.date('d/m/Y', $row->created).'</td>';
      if(!empty($file_arr)) {
        foreach($file_arr as $item) {
          $htmlContent .= '<td><a href="'.$item.'" target="_blank">View</a></td>';
        }
      } else {
        $htmlContent .= '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
      }
      $htmlContent .= '</tr>';
        $index++;
    }
    $htmlContent .= '</tbody></table><br><div class="download"><a href="'.$base_url.'admin/contact-data/career/download">Download</a></div>';
    $output = array(
        '#markup' => $htmlContent,
    );
    $build['form'] = $this->formBuilder()->getForm('Drupal\custom_pages\Form\CareerListingFrm');
    $build['result'] = $output;
    $build['pager'] = [
      '#type' => 'pager',
    ];
    return $build;
  }

  public function career_download() {
    $query = \Drupal::database()->select('contact_us', 'co');
    $query->fields('co', ['type','name', 'email', 'location', 'message', 'created']);
    if(isset($_GET['frm'])) {
      $query->condition('co.created', $_GET['frm'], '>=');
    }
    if(isset($_GET['to'])) {
      $query->condition('co.created', $_GET['to'], '<=');
    }
    $query->condition('co.type', 'Career');
    $query->orderBy('co.created', 'DESC');
    $results = $query->execute();

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=contact_data.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Type','Name', 'email', 'Location', 'Message', 'Date'));
    foreach($results as $row) {
      $created = date('d/m/Y', $row->created);
      $data = array($row->type,$row->name,$row->email,$row->location,$row->message,$created);
      fputcsv($output, $data);
    }
    fclose($output);
    exit();
  }

}
