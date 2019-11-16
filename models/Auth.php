<?php

/**
 * Class Auth
 *
 * @author William Odiomonafe
 * @url williamodiomonafe.github.io
 * @organisation Everyone
 * @contributors You & I
 */

class Auth extends Link {

    /**
     * Checks user authenticatoin
     * @return bool
     */
  public static function check_authentication() {
    if(isset($_SESSION[DOMAIN_NAME . '_uid'])) {
      if(route() == '/login') {
        redirect_to_page('/'); // GO HOME
      } else {
        return true;
      }
    }
  }

    /**
     * Get's authenticated user's data
     * @return mixed
     */
  public static function user() {
    if(Auth::check_authentication()) {
      // GET USER DETAILS
      $user = User::getUser($_SESSION[DOMAIN_NAME . '_uid']);
      return $user::$details;
    }
  }
}