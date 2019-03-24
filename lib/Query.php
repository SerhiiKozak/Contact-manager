<?php

class Query {
  
    protected function createquery($con) {
    $result = $con->fetchAll(\PDO::FETCH_ASSOC);

    return $result;
  }

}
