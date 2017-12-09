<?php

namespace Heap;

function load_heap() {
  header('Content-Type: text/html');
  require_once(heap()->dir . '/templates/home.php');
}
