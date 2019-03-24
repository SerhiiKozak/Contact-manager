<?php

  class Log {

    private function writeLog($name, $e) {
      $log = '../var/log';
      file_put_contents($log, 'type:' . $name . ', message:' . $e->getMessage(),FILE_APPEND);
    }

  }
