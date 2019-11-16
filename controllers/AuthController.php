<?php

/**
 * Class AuthController
 *
 * @author William Odiomonafe
 * @url williamodiomonafe.github.io
 * @organisation Everyone
 * @contributors You & I
 */


class AuthController {

    /**
     * Destroys a session's cookie data
     * @return void
     */
  public function destroy() {
    setcookie(DOMAIN_NAME . '_uid', "", time() - 360, '/');
    unset($_COOKIE[DOMAIN_NAME . '_uid']);
    session_destroy();

    return back();
  }

}