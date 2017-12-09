<?php

namespace Heap;

class Heap {

  // For base directory reference throughout the project.
  public $dir, $file;

  // Reference for Server-side Node.js processing
  public $rest_url;

  public function __construct() {
    $this->file = __FILE__;
    $this->dir = dirname(__FILE__);

    spl_autoload_register(array($this, 'autoload'));

    require_once(dirname(__FILE__) . '/includes/process.php');
  }

  /**
   * Class autoloader for the project Namespace.
   */
  public function autoload($class) {
    if(strpos($class, __NAMESPACE__) !== 0) return; // We only need to autoload classes in our namespace

    $d   = DIRECTORY_SEPARATOR;
    $dir = $this->dir . $d . 'includes' . $d . 'classes' . $d;

    $class_file = $dir . str_replace(array(__NAMESPACE__ . '\\', '\\', '_'), array('', $d, '-'), $class) . '.php';
    if(is_file($class_file)) require_once($class_file);
  }
}

$GLOBALS[__NAMESPACE__] = new Heap();

function heap() {
  return $GLOBALS[__NAMESPACE__];
}

\Heap\load_heap();
