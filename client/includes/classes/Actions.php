<?php

namespace Heap;

class Actions {

  public $_p;
  public $action;

  public function __construct() {
    if(isset($_GET['action'])) $this->action = trim($_GET['action']);

    $this->_p = array();
    foreach($_POST as $_i => $_v) $this->_p[$_i] = trim(stripslashes($_v));

    if($this->action === 'addToHeap') $this->addToHeap();
  }

  public function addToHeap() {
    $_p = $this->_p;
    if(!isset($_p['task']) || !$_p['task']) throw new \Heap\Error('Invalid task passed to Heap');

    $task = new \Heap\Task($_p['task']);
    heap()->node->addTask($task);
  }
}
