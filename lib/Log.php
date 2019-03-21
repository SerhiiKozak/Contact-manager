<?php

  class Log
  {
    function writeLog($name, $e) {
      $name=$name;
      $log='../var/log';
      file_put_contents($log,'type:'. $name.
                              ', message:'. $e->getMessage(),FILE_APPEND);
    }

  }
