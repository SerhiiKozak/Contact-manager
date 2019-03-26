<?php

  class Log {

    public static function writeLog($name, $e) {
      $log = ROOT_PATH . '/var/log';
      file_put_contents($log, 'type:' . $name . ', message:' . $e->getMessage(),FILE_APPEND);
    }

  }
