<?php 
ob_start();
//session_start(); 
//include "control/session.php";
$cat="10" ?>

<link href="style.css" rel="stylesheet" type="text/css">
<?php

/**
 * This file is used in conjunction with the 'LinkedIn' class, demonstrating 
 * the basic functionality and usage of the library.
 * 
 * COPYRIGHT:
 *   
 * Copyright (C) 2011, fiftyMission Inc.
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a 
 * copy of this software and associated documentation files (the "Software"), 
 * to deal in the Software without restriction, including without limitation 
 * the rights to use, copy, modify, merge, publish, distribute, sublicense, 
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in 
 * all copies or substantial portions of the Software.  
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS 
 * IN THE SOFTWARE.  
 *
 * SOURCE CODE LOCATION:
 * 
 * http://code.google.com/p/simple-linkedinphp/
 *    
 * REQUIREMENTS:
 * 
 * 1. You must have cURL installed on the server and available to PHP.
 * 2. You must be running PHP 5+.  
 *  
 * QUICK START:
 * 
 * There are two files needed to enable LinkedIn API functionality from PHP; the
 * stand-alone OAuth library, and the Simple-LinkedIn library.  The latest 
 * version of the stand-alone OAuth library can be found on Google Code:
 * 
 * http://code.google.com/p/oauth/
 * 
 * The latest versions of the Simple-LinkedIn library and this demonstation 
 * script can be found here:
 * 
 * http://code.google.com/p/simple-linkedinphp/
 *   
 * Install these two files on your server in a location that is accessible to 
 * this demo script.  Make sure to change the file permissions such that your 
 * web server can read the files.
 * 
 * Next, make sure the path to the LinkedIn class below is correct.
 * 
 * Finally, read and follow the 'Quick Start' guidelines located in the comments
 * of the Simple-LinkedIn library file.   
 *
 * @version   3.0.2 - 25/04/2011
 * @author    Paul Mennega <paul@fiftymission.net>
 * @copyright Copyright 2011, fiftyMission Inc. 
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License 
 */

try {
  // include the LinkedIn class
  require_once('linkedin_3.0.2.class.php');
  
  // start the session
 //session_start();
  
  // display constants
  $API_CONFIG = array(
    'appKey'       => 'N5VtJIvCv3Xgmt4CDd_RsETBEhOW-r_SX28isGftnb7SbIjaOTbcLvsdL9b4PJRM',
	  'appSecret'    => 'fE7fm17D7WPFx8Cd7qlbfWWha2ZPDjWtziR9-eJIxgxfUn_NEZ0UsjYCRRO2skJy',
	  'callbackUrl'  => NULL 
  );
  define('CONNECTION_COUNT', 20);
  define('UPDATE_COUNT', 10);

  // set index
  $_REQUEST[LINKEDIN::_GET_TYPE] = (isset($_REQUEST[LINKEDIN::_GET_TYPE])) ? $_REQUEST[LINKEDIN::_GET_TYPE] : '';
  switch($_REQUEST[LINKEDIN::_GET_TYPE]) {
    case 'comment':
      $OBJ_linkedin = new LinkedIn($API_CONFIG);
      $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
      if(!empty($_POST['nkey'])) {
        $response = $OBJ_linkedin->comment($_POST['nkey'], $_POST['scomment']);
        if($response['success'] === TRUE) {
          // comment posted
          header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
          // problem with comment
          echo "Error commenting on update:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
        }
      } else {
        echo "You must supply a network update key to comment on an update.";
      }
      break;
    case 'initiate':
      // user initiated LinkedIn connection, create the LinkedIn object
      
      // check for the correct http protocol (i.e. is this script being served via http or https)
      if(!empty($_SERVER['HTTPS'])) {
        $protocol = 'https';
      } else {
        $protocol = 'http';
      }
      
      // set the callback url
      $API_CONFIG['callbackUrl'] = $protocol . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . '?' . LINKEDIN::_GET_TYPE . '=initiate&' . LINKEDIN::_GET_RESPONSE . '=1';
      $OBJ_linkedin = new LinkedIn($API_CONFIG);
      
      // check for response from LinkedIn
      $_GET[LINKEDIN::_GET_RESPONSE] = (isset($_GET[LINKEDIN::_GET_RESPONSE])) ? $_GET[LINKEDIN::_GET_RESPONSE] : '';
      if(!$_GET[LINKEDIN::_GET_RESPONSE]) {
        // LinkedIn hasn't sent us a response, the user is initiating the connection
        
        // send a request for a LinkedIn access token
        $response = $OBJ_linkedin->retrieveTokenRequest();
        if($response['success'] == 1) {
          // split up the response and stick the LinkedIn portion in the user session
          $_SESSION['oauth']['linkedin']['request'] = $response['linkedin'];
          //echo "hellllllllllllllllllllllllllllllllllllllllllllllllllllo";
          // redirect the user to the LinkedIn authentication/authorisation page to initiate validation.
          header('Location: ' . LINKEDIN::_URL_AUTH . $_SESSION['oauth']['linkedin']['request']['oauth_token']);
        } else {
          // bad token request
          echo "Request token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
        }
      } else {
        // LinkedIn has sent a response, user has granted permission, take the temp access token, the user's secret and the verifier to request the user's real secret key
        $response = $OBJ_linkedin->retrieveTokenAccess($_GET['oauth_token'], $_SESSION['oauth']['linkedin']['request']['oauth_token_secret'], $_GET['oauth_verifier']);
        if($response['success'] === TRUE) {
          // the request went through without an error, gather user's 'access' tokens
          $_SESSION['oauth']['linkedin']['access'] = $response['linkedin'];
          
          // set the user as authorized for future quick reference
          $_SESSION['oauth']['linkedin']['authorized'] = TRUE;
            
          // redirect the user back to the demo page
          header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
          // bad token access
          echo "Access token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
        }
      }
      break;
    case 'invite':
      // invitation messaging
      $OBJ_linkedin = new LinkedIn($API_CONFIG);
      $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
      if(!empty($_POST['invite_to_id'])) {
        // send invite via LinkedIn ID
        $response = $OBJ_linkedin->invite('id', $_POST['invite_to_id'], $_POST['invite_subject'], $_POST['invite_body']);
        if($response['success'] === TRUE) {
          // message has been sent
          header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
          // an error occured
          echo "Error sending invite:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
        }
      } elseif(!empty($_POST['invite_to_email'])) {
        // send invite via email
        $recipient = array('email' => $_POST['invite_to_email'], 'first-name' => $_POST['invite_to_firstname'], 'last-name' => $_POST['invite_to_lastname']);
        $response = $OBJ_linkedin->invite('email', $recipient, $_POST['invite_subject'], $_POST['invite_body']);
        if($response['success'] === TRUE) {
          // message has been sent
          header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
          // an error occured
          echo "Error sending invite:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
        }
      } else {
        // no email or id supplied
        echo "You must supply an email address or LinkedIn ID to send out the invitation to connect.";
      }
      break;
    case 'like':
      $OBJ_linkedin = new LinkedIn($API_CONFIG);
      $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
      if(!empty($_GET['nKey'])) {
        $response = $OBJ_linkedin->like($_GET['nKey']);
        if($response['success'] === TRUE) {
          // update 'liked'
          header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
          // problem with 'like'
          echo "Error 'liking' update:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
        }
      } else {
        echo "You must supply a network update key to 'like' an update.";
      }
      break;
    case 'message':
      // connection messaging
      if(!empty($_POST['connections'])) {
        $OBJ_linkedin = new LinkedIn($API_CONFIG);
        $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
        
        if(!empty($_POST['message_copy'])) {
          $copy = TRUE;
        } else {
          $copy = FALSE;
        }
        $response = $OBJ_linkedin->message($_POST['connections'], $_POST['message_subject'], $_POST['message_body'], $copy);
        if($response['success'] === TRUE) {
          // message has been sent
          header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
          // an error occured
          echo "Error sending message:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
        }
      } else {
        echo "You must select at least one recipient.";
      }
      break;
    case 'reshare':
      // process a status update action
      $OBJ_linkedin = new LinkedIn($API_CONFIG);
      $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
      
      // prepare content for sharing
      $content = array();
      if(!empty($_POST['scomment'])) {
        $content['comment'] = $_POST['scomment'];
      }
      if(!empty($_POST['sid'])) {
        $content['id'] = $_POST['sid'];
      }
      if(!empty($_POST['sprivate'])) {
        $private = TRUE;
      } else {
        $private = FALSE;
      }
      
      // re-share content
      $response = $OBJ_linkedin->share('reshare', $content, $private);
      if($response['success'] === TRUE) {
        // status has been updated
        header('Location: ' . $_SERVER['PHP_SELF']);
      } else {
        // an error occured
        echo "Error re-sharing content:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
      }
      break;
    case 'revoke':
      $OBJ_linkedin = new LinkedIn($API_CONFIG);
      $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
      $response = $OBJ_linkedin->revoke();
      if($response['success'] === TRUE) {
        // revocation successful, clear session
        session_unset();
        $_SESSION = array();
        if(session_destroy()) {
          // session destroyed
          header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
          // session not destroyed
          echo "Error clearing user's session";
        }
      } else {
        // revocation failed
        echo "Error revoking user's token:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
      }
      break;
    case 'share':
      // process a status update action
      $OBJ_linkedin = new LinkedIn($API_CONFIG);
      $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
      
      // prepare content for sharing
      $content = array();
      if(!empty($_POST['scomment'])) {
        $content['comment'] = $_POST['scomment'];
      }
      if(!empty($_POST['stitle'])) {
        $content['title'] = $_POST['stitle'];
      }
      if(!empty($_POST['surl'])) {
        $content['submitted-url'] = $_POST['surl'];
      }
      if(!empty($_POST['simgurl'])) {
        $content['submitted-image-url'] = $_POST['simgurl'];
      }
      if(!empty($_POST['sdescription'])) {
        $content['description'] = $_POST['sdescription'];
      }
      if(!empty($_POST['sprivate'])) {
        $private = TRUE;
      } else {
        $private = FALSE;
      }
      
      // share content
      $response = $OBJ_linkedin->share('new', $content, $private);
      if($response['success'] === TRUE) {
        // status has been updated
        header('Location: ' . $_SERVER['PHP_SELF']);
      } else {
        // an error occured
        echo "Error sharing content:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
      }
      break;
    case 'unlike':
      $OBJ_linkedin = new LinkedIn($API_CONFIG);
      $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
      if(!empty($_GET['nKey'])) {
        $response = $OBJ_linkedin->unlike($_GET['nKey']);
        if($response['success'] === TRUE) {
          // update 'unliked'
          header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
          // problem with 'unlike'
          echo "Error 'unliking' update:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
        }
      } else {
        echo "You must supply a network update key to 'unlike' an update.";
      }
      break;
    case 'updateNetwork':
      // process a network update action
      $OBJ_linkedin = new LinkedIn($API_CONFIG);
      $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
      $response = $OBJ_linkedin->updateNetwork($_POST['updateNetwork']);
      if($response['success'] === TRUE) {
        // status has been updated
        header('Location: ' . $_SERVER['PHP_SELF']);
      } else {
        // an error occured
        echo "Error posting network update:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
      }
      break;
    default:
      // nothing being passed back, display demo page
      
      // check PHP version
      if(version_compare(PHP_VERSION, '5.0.0', '<')) {
        throw new Exception('You must be running version 5.x or greater of PHP to use this library.'); 
      } 
      
      // check for cURL
      if(extension_loaded('curl')) {
        $curl_version = curl_version();
        $curl_version = $curl_version['version'];
      } else {
        throw new Exception('You must load the cURL extension to use this library.'); 
      }
      ?>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
        <head>
          <title>Linkedin Profile Data</title>
          <meta name="author" content="Paul Mennega <paul@fiftymission.net>" />
          <meta name="copyright" content="Copyright 2010, fiftyMission Inc." />
          <meta name="license" content="http://www.opensource.org/licenses/mit-license.php" />
          <meta name="description" content="A demonstration page for the Simple-LinkedIn PHP class." />
          <meta name="keywords" content="simple-linkedin,php,linkedin,api,class,library" />
          <meta name="medium" content="mult" />
          <meta name="viewport" content="width=device-width" />
          <meta http-equiv="Content-Language" content="en" />
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <style>
            body {font-family: Courier, monospace; font-size: 0.8em;}
            pre {font-family: Courier, monospace; font-size: 0.8em;}
          </style>
        </head>
        <body>
          
          
          
          
          <table border="0" align="center" cellpadding="0" cellspacing="0" class="table_main">
  <tr>
    <td height="0" colspan="3" align="left" valign="top">
<?php include "header.php"; ?>
	</td>
  </tr>


  <tr>
    <td colspan="2" align="left" valign="top"> 
<?php include "../header2.php"; ?>
    </td>
    <td width="12" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td width="543" height="323" valign="top">
          
          
          
          
          <!--<h1 align="center"><a href="<?php echo $_SERVER['PHP_SELF'];?>">Seecs Alumni Portal </a></h1>-->

          
          <?php
          $_SESSION['oauth']['linkedin']['authorized'] = (isset($_SESSION['oauth']['linkedin']['authorized'])) ? $_SESSION['oauth']['linkedin']['authorized'] : FALSE;
          if($_SESSION['oauth']['linkedin']['authorized'] === TRUE) {
            ?>

            <?php
          } else {
            ?>

            <?php
          }
          ?>
          
          <h2 id="manage" class="b_heading">Manage LinkedIn Authorization:</h2>
          <?php
          if($_SESSION['oauth']['linkedin']['authorized'] === TRUE) {
            // user is already connected
            $OBJ_linkedin = new LinkedIn($API_CONFIG);
            $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
            ?>
            <form id="linkedin_revoke_form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
              <input type="hidden" name="<?php echo LINKEDIN::_GET_TYPE;?>" id="<?php echo LINKEDIN::_GET_TYPE;?>" value="revoke" />
              <input type="submit" value="Revoke Authorization" />
            </form>
            <hr />
          
          
          
          
          
          
          
          
          
          
                        
            <h2 id="profile" align="center" class="b_heading">Your Profile:</h2>
            
            <?php
            $response = $OBJ_linkedin->profile('~:(first-name,last-name,date-of-birth,location,main-address,industry,headline,positions,educations,phone-numbers,im-accounts,twitter-accounts)');
  			if($response['success'] === TRUE) {
              $response['linkedin'] = new SimpleXMLElement($response['linkedin']);
              //echo "<pre>" . print_r($response['linkedin'], TRUE) . "</pre>";
	
		
			

              $user['firstname'] = (string) $response['linkedin']->{'first-name'};
			  $user['lastname'] = (string) $response['linkedin']->{'last-name'};
			  $user['day'] = (string) $response['linkedin']->{'date-of-birth'}->day;
			  $user['month'] = (string) $response['linkedin']->{'date-of-birth'}->month;
			  $user['year'] = (string) $response['linkedin']->{'date-of-birth'}->year;
			  $user['location'] = (string) $response['linkedin']->location->name;
			  $user['address'] = (string) $response['linkedin']->{'main-address'};
			  $user['phone'] = (string) $response['linkedin']->{'phone-numbers'}->{'phone-number'}->{'phone-number'};
			  $user['cmpnyname1'] = (string) $response['linkedin']->positions->position[0]->company->name;
			  $user['jbtitle1'] = (string) $response['linkedin']->positions->position[0]->title;
			  $user['jbind1'] = (string) $response['linkedin']->positions->position[0]->company->industry;
			  $user['jbsummary1'] = (string) $response['linkedin']->positions->position[0]->summary;
			  $user['jbSyear1'] = (string) $response['linkedin']->positions->position[0]->{'start-date'}->year;
			  $user['jbSmon1'] = (string) $response['linkedin']->positions->position[0]->{'start-date'}->month;
			  $user['skype'] = (string) $response['linkedin']->{'im-accounts'}->{'im-account'}->{'im-account-name'};			
			  $user['twitter'] = (string) $response['linkedin']->{'twitter-accounts'}->{'twitter-account'}->{'provider-account-name'};
			  

			  
			  echo '<form action="personal_info.php" method="post" >';
			  
			  echo '<table align="CENTER" border="1" class="b_text">';
			  echo '<tr><td class="b_text"><input type="checkbox" name="li_nme" value="'.$user['firstname']." ".$user['lastname'].'" checked></td><td>Name</td><td >'.$user['firstname']." ".$user['lastname'].'</td></tr>';
			  echo '<tr><td class="b_text"><input type="checkbox" name="li_dob" value="'.$user['day']."-".$user['month']."-".$user['year'].'" checked></td><td>Date of Birth</td><td >'.$user['day']."-".$user['month']."-".$user['year'].'</td></tr>';
			  echo '<tr><td class="b_text"><input type="checkbox" name="li_addrs" value="'.$user['address'].'" checked></td><td>Address</td><td >'.$user['address'].'</td></tr>';
			  echo '<tr><td class="b_text"><input type="checkbox" name="li_phone" value="'.$user['phone'].'" checked></td><td>Phone</td><td >'.$user['phone'].'</td></tr>';
			  echo '<tr><td class="b_text"><input type="checkbox" name="li_loc" value="'.$user['location'].'" checked></td><td>Country</td><td >'.$user['location'].'</td></tr>';
			  echo '<tr><td class="b_text"><input type="checkbox" name="li_skype" value="'.$user['skype'].'" checked></td><td>Skype</td><td >'.$user['skype'].'</td></tr>';
			  echo '<tr><td class="b_text"><input type="checkbox" name="li_twitter" value="'.$user['twitter'].'" checked></td><td>Twittter</td><td >'.$user['twitter'].'</td></tr>';

			  echo '</table>';
			  
				echo '<h2  align="center" class="b_heading">Current Job Detail</h2>';

				echo '<table align="CENTER" border="1" class="b_text">';
				echo '<tr><td class="b_text"><input type="checkbox" name="li_jCompany" value="'.$user['cmpnyname1'].'" checked></td><td>Company Name</td><td >'.$user['cmpnyname1'].'</td></tr>';
				echo '<tr><td class="b_text"><input type="checkbox" name="li_jTitle" value="'.$user['jbtitle1'].'" checked></td><td>Job Title</td><td >'.$user['jbtitle1'].'</td></tr>';
				echo '<tr><td class="b_text"><input type="checkbox" name="li_jIndustry" value="'.$user['jbind1'].'" checked></td><td>Job Industry</td><td >'.$user['jbind1'].'</td></tr>';
				echo '<tr><td class="b_text"><input type="checkbox" name="li_jSummary" value="'.$user['jbsummary1'].'" checked></td><td>Job Summary</td><td >'.$user['jbsummary1'].'</td></tr>';
				echo '<tr><td class="b_text"><input type="checkbox" name="li_jSdate" value="'.$user['jbSyear1']."-".$user['jbSmon1'].'" checked></td><td>Start Date</td><td >'.$user['jbSyear1']."-".$user['jbSmon1'].'</td></tr>';
				echo '</table>';
				
			  echo '<input type="submit" value="Submit"/>';
			  echo '</form>';


			  //echo $user['jbSmon1'];

            } else {
              // profile retrieval failed
              echo "Error retrieving profile information:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response) . "</pre>";
            } 
            ?>  
            <hr />
            
            
            
            
            
            
            		 </td>
      </tr>
    </table>    
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link"><?php include "footer.php" ?>
	</span></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link"><?php include "../footerlinks.php"; ?>
	</span></td>
  </tr>
</table>
            
            
            
            
            
            
          
          
          
          
          
          
          
            
            
            
            
            
            
            
            
            
            
            
            
            
 
            <?php
          } else {
            // user isn't connected
            ?>
            <form id="linkedin_connect_form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
              <input type="hidden" name="<?php echo LINKEDIN::_GET_TYPE;?>" id="<?php echo LINKEDIN::_GET_TYPE;?>" value="initiate" />
              <input type="submit" value="Connect to LinkedIn" />
            </form>
            <?php
          }
          ?>
        </body>
      </html>
      <?php
      break;
  }
} catch(Exception $e) {
  // exception raised by library call
  echo $e->getMessage();
} catch(LinkedInException $e) {
  // exception raised by library call
  echo $e->getMessage();
}

?>