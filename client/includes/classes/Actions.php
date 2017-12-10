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
    if($this->action === 'getText') $this->getText();
  }

  public function addToHeap() {
    $_p = $this->_p;
    if(!isset($_p['task']) || !$_p['task']) throw new \Heap\Error('Invalid task passed to Heap');

    $task = new \Heap\Task($_p['task']);
    heap()->node->addTask($task);
  }

  public function getText() {
    $_p = $this->_p;
    if(!isset($_p['Body']) || !$_p['Body']) throw new \Heap\Error('Invalid task passed to Heap');

    $task = new \Heap\Task($_p['Body']);
    heap()->node->addTask($task);

    header('Content-Type: text/plain');
    echo 'Task added to heap.';
    exit();
  }
}
