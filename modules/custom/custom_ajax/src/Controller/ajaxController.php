<?php

/**
  @file
  Contains \Drupal\custom_ajax\Controller\ajaxController.
 */

namespace Drupal\custom_ajax\Controller;

use Drupal\Core\Database\Connection;
use Drupal\node\Entity\Node;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use GuzzleHttp\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Drupal\Core\Url;
use Drupal\taxonomy\Entity\Term;
use Google\Cloud\Translate\V2\TranslateClient;
use Symfony\Component\HttpFoundation\Request;

class ajaxController extends ControllerBase {

  public function uploadFile() {

    $units = array( 'B', 'KB', 'MB');
    $source = $_POST['source'];

    $file = $_FILES['file'];
    $filename = $file['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $error = 0;
    $msg = '';

    $size = $file['size'];

    $base = log($size) / log(1024);
    $f_base = floor($base);

    $file_size = round(pow(1024, $base - floor($base)), 1);
    if($file_size > 5 && $units[$f_base] == 'MB') {
      $error = 1;
      $msg = 'Uploaded file exceeds max file size allowed';
    } else {
      $file_size = $file_size . ' ' . $units[$f_base];
    }
    if($ext == 'pdf' || $ext == 'docx' || $ext == 'doc') {

    } else {
      $error = 1;
      $msg = 'Only doc,docx and pdf files are allowed.';
    }
    $uri = 'public://assets/resumes/';
    $realpath = \Drupal::service('file_system')->realpath($uri);

    if($error == 0) {
      $dest = $realpath.'/'.$filename;
      $name = pathinfo($filename, PATHINFO_FILENAME );
      $extension   = pathinfo($filename, PATHINFO_EXTENSION );
      $indx = 0;
      if(strlen($name) > 10) {
        $uploaded_file = substr($name,0,10).'...';
      } else {
        $uploaded_file = $name;
      }
      while(file_exists($dest)) {
        if(strlen($name) > 10) {
          $uploaded_file = substr($uploaded_file,0,10) .'_' .$indx;
        } else {
          $uploaded_file = $name .'_' .$indx;
        }
        $filename = $name . '_' . $indx . '.' . $extension;
        $dest = $realpath.'/'.$filename;
        $indx++;
      };

      $file_path = file_create_url($uri.$filename);

      if(move_uploaded_file($file['tmp_name'], $dest)) {
        $uuid_service = \Drupal::service('uuid');
        $uuid = $uuid_service->generate();
        $database = \Drupal::database();
        $lastid = $database->query("SELECT fid FROM {file_managed} ORDER BY fid DESC LIMIT 1")->fetchField();
        $fid = (int)$lastid + 1;
        $result = $database->insert('file_managed')
          ->fields([
            'fid'      => $fid,
            'uuid'     => $uuid,
            'langcode' => 'en',
            'filename' => $filename,
            'uri'      => $uri.$filename,
            'filemime' => $file['type'],
            'filesize' => $file['size'],
            'status'   => 1,
            'created'  => REQUEST_TIME,
            'changed'  => REQUEST_TIME,
            'uid'      => 1
          ])->execute();
      }
    }



    return new JsonResponse(array('name' => $uploaded_file.'.'.$extension, 'fid' => $fid, 'msg'=> $msg, 'size' => $file_size, 'err' => $error));
  }

  public function uploadRemove() {
    $source = $_POST['src'];
    $database = \Drupal::database();
    $fid = $_POST['fid'];
    $uri = $database->query("SELECT uri FROM {file_managed} where fid=:fid",[':fid' => $fid])->fetchField();
    $delete = $database->delete('file_managed')
              ->condition('fid', $fid)
              ->execute();
    $filepath = \Drupal::service('file_system')->realpath($uri);
    unset($filepath);
    return new JsonResponse(array('source'=>$source));
  }

  public function getProjects() {
    $capability = $_POST['capability'];
    $market     = $_POST['market'];
    $industry   = $_POST['industry'];

    $output = '';

    $query = \Drupal::entityQuery('node');
    $query->condition('type', 'work');
    $query->condition('status', 1);
    if(!empty($capability)) {
      $query->condition('field_category.entity:taxonomy_term.name', $capability, 'IN');
    }
    if(!empty($industry)) {
      $query->condition('field_industry.entity:taxonomy_term.name', $industry, 'IN');
    }
    if($market != '') {
      $query->condition('field_market.entity:taxonomy_term.name', $market, '=');
    }

    $nids = $query->execute();
    $nodes = Node::loadMultiple($nids);

    foreach($nodes as $node) {
      $output.= '<div class="col-xl-4 col-md-6">
                    <div class="product-card">
                      <div class="top-img">
                        <div class="bg-img" style="background: url('.file_create_url($node->field_image->entity->getFileUri()).') center center / cover no-repeat;"></div>
                        <img src="'.file_create_url($node->field_image->entity->getFileUri()).'" class="img-fluid grayscale">
                        <a href="'.$node->toUrl()->setAbsolute()->toString().'" class="plus-icon"><img src="themes/prodigious/images/icons/plus-icon.png"></a>
                      </div>
                      <div class="bottom-text">
                        <h3 class="heading-3 text-uppercase text-lightblack">'.$node->title->value.' </h3>
                        <div class="animate-div">
                          <p class="p20 text-lightgrey">'.$node->field_brand->value.'</p>
                          <div class="category font-light text-white">';
      foreach($node->field_category as $cat) {
        $output.= '<span class="circletext text-'.$cat->entity->field_color->value.'">'.$cat->entity->name->value.'</span>';
      }

      $output.= '</div></div></div></div></div>';
    }


    return new JsonResponse(array('output' => $output));
  }

  public function setPath() {
    $_SESSION['block_id'] = str_replace(' ', '', trim($_POST['block']));
    return new JsonResponse('');
  }

  public function getPath() {
    $block = strtolower($_SESSION['block_id']);
    unset($_SESSION['block_id']);
    return new JsonResponse($block);
  }



}
