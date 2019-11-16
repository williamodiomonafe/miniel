<?php

/**
 * Class Model
 *
 * @author William Odiomonafe
 * @url williamodiomonafe.github.io
 * @organisation Everyone
 * @contributors You & I
 */

class Model extends DB
{
    /**
     * Contains all database query types
     * @param $table
     * @return DB
     */
  public static function sel_table($table) {
    return self::table($table);
  }

}