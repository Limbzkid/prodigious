<?php
  /**
    * @file
    * Contains \Drupal\custom_blocks\Form\CareerForm.
    */
  namespace Drupal\custom_blocks\Form;

  use Drupal\taxonomy\Entity\Term;
  use Drupal\Core\Ajax\AjaxResponse;
  use Drupal\Core\Ajax\ChangedCommand;
  use Drupal\Core\Ajax\CssCommand;
  use Drupal\Core\Ajax\HtmlCommand;
  use Drupal\Core\Ajax\InvokeCommand;
  use Drupal\Core\Form\FormBase;
  use Drupal\file\Entity\File;
  use Symfony\Component\HttpFoundation;
  use Drupal\Core\Form\FormStateInterface;
  use Symfony\Component\HttpFoundation\Request;
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;


  class CareerForm extends FormBase {
    /**
    * {@inheritdoc}
    */
    public function getFormId() {
      return 'career';
    }

    /**
    * {@inheritdoc}
    */
    public function buildForm(array $form, FormStateInterface $form_state) {

      /*
      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid', 'locations');
      $query->sort('weight');
      $tids = $query->execute();
      $terms = Term::loadMultiple($tids);

      $options = array(
        '' => 'Choose...'
      );
      foreach($terms as $term) {
        $options[$term->name->value] = $term->name->value;
      } */

      $form['name'] = array(
        '#type' => 'textfield',
        '#attributes' => array(
            'id' => 'name',
            'class' => ['form-control'],
            'placeholder' => ''
        ),
      );

      $form['email'] = array(
        '#type' => 'textfield',
        '#attributes' => array(
          'id' => 'email',
          'class' => ['form-control'],
          'placeholder' => ''
        ),
      );

      $form['location'] = array(
        '#type' => 'textfield',
        '#attributes' => array(
          'id' => 'location',
          'class' => ['form-control'],
          'placeholder' => ''
        ),
      );

      /*
      $form['location'] = array(
        '#type' => 'select',
        '#options' => $options,
        '#attributes' => array(
            'selected' => 'selected',
            'class' => ['form-control'],
            'id' => 'inputlocation',
        ),
      ); */

      $form['message'] = array(
        '#type' => 'textarea',
        '#maxlength' => '500',
        '#attributes' => array(
          'id' => 'name',
          'class' => ['form-control'],
          'placeholder' => '',
          'required' => 'required',
        ),
      );
      $form['fids'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class' => ['form-control', 'custFids']
        ),
      );

      $form['submit'] = array(
        '#type' => 'button',
        '#value' => 'Submit',
        '#attributes' => array(
            'class' => ['btn btn-green font-medium text-uppercase w-100 form-control']
        ),
        '#ajax' => array(
          'callback' => '::businessCallback',
          'event' => 'click',
          'progress' => array(
            'type' => 'throbber',
            'message' => 'Please wait',
          ),
        ),
      );

      $form['#theme'] = 'careerFrm';

      return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
      //$message = t('Your information has been successfully submitted.') ;
      //drupal_set_message($message);
    }


    public function businessCallback(array &$form, FormStateInterface $form_state) {
      $error    = false;
      $name_err = false;
      $mail_err = false;
      $msg_err  = false;
      $fid_err  = false;
      $loc_err  = false;

      $name = trim($form_state->getValue('name'));
      $mail = trim($form_state->getValue('email'));
      $locn = trim($form_state->getValue('location'));
      $mesg = trim($form_state->getValue('message'));
      $fids = trim($form_state->getValue('fids'));

      $ajax_response = new AjaxResponse();

      if($name == '') {
        $err_txt = 'Name is required';
        $name_err = true;
        $error = true;
      } else {
        if(!preg_match("/^([a-zA-Z.\']+\s?)*$/", $name)) {
          $err_txt = 'Invalid Name';
          $name_err = true;
          $error = true;
        }
      }
      if($name_err) {
        $css = ['display' => 'block'];
        $ajax_response->addCommand(new CssCommand('.career .invalid-feedback', $css));
        $ajax_response->addCommand(new HtmlCommand('.career .nameErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.career .nameErr', ''));
      }

      if($mail == '') {
        $err_txt = 'Email is required';
        $mail_err = true;
        $error = true;
      } else {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
          $err_txt = 'Invalid Email';
          $mail_err = true;
          $error = true;
        }
      }
      if($mail_err) {
        $css = ['display' => 'block'];
        $ajax_response->addCommand(new CssCommand('.career .invalid-feedback', $css));
        $ajax_response->addCommand(new HtmlCommand('.career .mailErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.career .mailErr', ''));
      }

      if($locn == '') {
        $err_txt = 'City is required';
        $loc_err = true;
        $error = true;
      } else {
        if(!preg_match("/^([a-zA-Z. ,\'()&]+\s?)*$/", $locn)) {
          $err_txt = 'Invalid City name';
          $loc_err = true;
          $error = true;
        }
      }
      if($loc_err) {
        $css = ['display' => 'block'];
        $ajax_response->addCommand(new CssCommand('.career .invalid-feedback', $css));
        $ajax_response->addCommand(new HtmlCommand('.career .locErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.career .locErr', ''));
      }

      if($fids == '') {
        $err_txt = 'Please upload resume';
        $fid_err = true;
        $error = true;
      }

      if($fids == '0') {
        $error = true;
      }

      if($fid_err) {
        $css = ['display' => 'block'];
        $ajax_response->addCommand(new CssCommand('.career .invalid-feedback', $css));
        $ajax_response->addCommand(new HtmlCommand('.career .fidErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.career .fidErr', ''));
      }

      if($mesg == '') {
        $err_txt = 'Please enter message';
        $msg_err = true;
        $error = true;
      } else {
        if(!preg_match("/^([a-zA-Z0-9._+,=\?\-\/\'()&$!@%#*]+\s?)*$/", $mesg)) {
          $err_txt = 'Invalid character in text';
          $msg_err = true;
          $error = true;
        }
      }
      if($msg_err) {
        $css = ['display' => 'block'];
        $ajax_response->addCommand(new CssCommand('.career .invalid-feedback', $css));
        $ajax_response->addCommand(new HtmlCommand('.career .msgErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.career .msgErr', ''));
      }

      if(!$error) {
        $database = \Drupal::database();
        $result = $database->insert('contact_us')
          ->fields([
            'name'      => $name,
            'type'      => 'Career',
            'email'     => $mail,
            'location'  => $locn,
            'message'   => $mesg,
            'fids'      => $fids,
            'created'   => REQUEST_TIME,
          ])->execute();

          $mail_body  = '<table  cellpadding="0" cellspacing="0"  style="background: #f3f3f3; padding: 20px; width: 700px; border: 0; text-align: left; font-family:Arial; font-size:14px; color:#000;">
                            <tr><td colspan="3" style="padding-bottom: 20px;"><b>Dear Admin,</b></td></tr>
                            <tr><td style="padding-top: 15px">Name</td><td style="padding-top: 15px">:</td><td style="padding-top: 15px">'.$name.'</td></tr>
                            <tr><td style="padding-top: 15px">Email</td><td style="padding-top: 15px">:</td><td style="padding-top: 15px">'.$mail.'</td></tr>
                            <tr><td style="padding-top: 15px">Location</td><td style="padding-top: 15px">:</td><td style="padding-top: 15px">'.$locn.'</td></tr>
                            <tr><td style="padding-top: 15px">Message</td><td style="padding-top: 15px">:</td><td style="padding-top: 15px">'.$mesg.'</td></tr>
                            <tr><td style="padding-top: 15px">Type</td><td style="padding-top: 15px">:</td><td style="padding-top: 15px">Career Enquiry</td></tr>
                            <tr>
                            <td colspan="3" style="font-family:Arial; font-size:12px; color:#000; text-decoration:underline; padding-top: 40px">
                              This email is an automated notification and does not require a reply.</td>
                            </tr>
                          </table>';
          $mail = new PHPMailer(TRUE);
          $mail->addReplyTo('noreply@prodigious.com');
          $mail->setFrom('noreply@prodigious.com', 'Prodigious');
          $mail->addAddress('mike.cole@publicisproduction.com', 'Mike Cole');
          $mail->addAddress('fabienne.queyrane@publicisproduction.com', "Fabienne Queyrane");
          $mail->addAddress('louisa.ferhat@publicis.com', "Louisa Ferhat");

          $mail->Subject = 'Prodigious Website Career Enquiry';
          $mail->Body = $mail_body;
          $mail->isSMTP();
          $mail->isHTML(TRUE);
          $mail->Host = 'smtpprxy01.eastus2.cloudapp.azure.com';
          $mail->Port = 65525;
          /* Enable SMTP debug output. */
          //$mail->SMTPDebug = 4;
          $uploads = explode(',', $fids);
          foreach($uploads as $fid) {
            $file = \Drupal\file\Entity\File::load($fid);
            $file = $file->getFileUri();
            $filepath = \Drupal::service('file_system')->realpath($file);
            $mail->addAttachment($filepath);
          }
          $mail->send();

          $thank_you = 'Thank you for the feedback. We\'ll get back to you soon';
          $ajax_response->addCommand(new InvokeCommand('.career #name', 'val',['']));
          $ajax_response->addCommand(new InvokeCommand('.career #email', 'val',['']));
          //$ajax_response->addCommand(new InvokeCommand('.business #inputlocation','val',['']));
          $ajax_response->addCommand(new InvokeCommand('.career #location','val',['']));
          $ajax_response->addCommand(new InvokeCommand('.career #message', 'val',['']));
          $ajax_response->addCommand(new InvokeCommand('.career #careerFile', 'attr',array('data-fid','')));
          $ajax_response->addCommand(new InvokeCommand('.career .custFids', 'val',['']));
          $ajax_response->addCommand(new HtmlCommand('.career .attachments ul', ''));
          $ajax_response->addCommand(new HtmlCommand('.career .feedback', $thank_you));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.career .feedback', ''));
      }

      return $ajax_response;
    }


  }
