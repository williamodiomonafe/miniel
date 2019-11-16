<?php

function view($page, $value = null) {
  if($value) {
    foreach($value AS $key => $val) {
      $$key = $val;
    }
  }

  (object) $value;

  $page = str_replace('.', '/', $page);

  include_once dirname(__DIR__) . "/views/" . $page . ".view.php";
}


function set_message($name, $content) {
  setcookie($name, $content, time() + 60);
}


function get_message($name) {
  if(isset($_COOKIE[$name])) {
    $value = $_COOKIE[$name];

    // UNSET THE COOKIE
    setcookie($name, '', time() - 360);
    return $value;
  }
}


function redirect($location) {
    header("Location:" . $location);
}

function back() {
  if(isset($_SERVER['HTTP_REFERER'])) {
    header("Location:" . $_SERVER['HTTP_REFERER']);
  } else {
    header("Location: /");
  }
}

function home() {
  header("Location:" . APP_URL);
}

function dd($value) {
  die(var_dump($value));
  exit;
}

function check($val) {
  return $val;
}

function now_date() {
  return date('Y-m-d h:i:s');
}

function format_date_time($date_time) {
  return date('jS M, \'y - h:ia', $date_time);
}

function sanitize_input($value) {
  if (stristr($value, '<script>')) {
    return false;
  } else {
    $value = htmlspecialchars(strip_tags($value));
  }

  return $value;
}

function route() {
  return $_SERVER['REQUEST_URI'];
}


function mail_template($content) {
  return $content;
}

function send_elasticemail($from, $fromName, $subject, $email, $body) {
	$url = 'https://api.elasticemail.com/v2/email/send';

	try{
		$post = array('from' => $from,
		'fromName' => $fromName,
		'apikey' => MAIL_API_KEY,
		'subject' => $subject,
		'to' => $email,
		'bodyHtml' => $body,
		'bodyText' => $body,
		'isTransactional' => true);
		
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $post,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_SSL_VERIFYPEER => false
		));
		
		$result=curl_exec ($ch);
		curl_close ($ch);
	}
	catch(Exception $ex){
		echo $ex->getMessage();
	}
}

function set_flash($name, $value) {
  setcookie($name, $value, time() + 600, '/');
}

function get_flash($name) {
  if(isset($_COOKIE[$name])) {
    echo $_COOKIE[$name];

    set_flash($name, '');
  }
}

function check_flash($name) {
  return isset($_COOKIE[$name]) ? true : false;
}