<?php

class Query {
    function createquery($con) {
    $con=$con;
    $result =$con->fetchAll(\PDO::FETCH_ASSOC);

    return $result;
  }

}
