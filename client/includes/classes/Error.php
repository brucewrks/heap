<?php

namespace Heap;

class Error extends \Exception {

  /**
   * Class constructor for the project Error/Exception handling functionality.
   */
  public function __construct($info) {
    parent::__construct($info);
  }
}
