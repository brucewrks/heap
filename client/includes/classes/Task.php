<?php

namespace Heap;

class Task {

  public $name;
  public $comments = array();

  /**
   * Class constructor.
   *
   * @param String $name     The name/description for this Task
   * @param Array  $comments Comments on this task. Array of String values.
   */
  public function __construct($name, $comments = array()) {
    $this->name = $name;
    $this->comments = $comments;
  }

  public function addComment($comment) {
    $this->comments[] = (string)$comment;
  }
}
