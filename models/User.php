<?php

/**
 * Class User
 *
 * @author William Odiomonafe
 * @url williamodiomonafe.github.io
 * @organisation Everyone
 * @contributors You & I
 */
class User extends Model {

  public static $details;

  protected static $table = "users";

    /**
     * @param null $user_id
     * @return User
     */
  public static function getUser($user_id = NULL) {
    $user = new self;
    if($user_id) {
      $details = User::table(self::$table)->find(['id' => $user_id]);
    } else {
      $details = User::table(self::$table)->find(['id' => $_SESSION[DOMAIN_NAME . '_uid']]);
    }
    
    $user::$details = $details;

    return $user;
  }
}



