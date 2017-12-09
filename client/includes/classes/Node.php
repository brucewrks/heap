<?php

namespace Heap;

/**
 * Class for sending formatted data to the Node.js environment.
 */
class Node {

  private $host;
  private $port;

  /**
   * Class constructor.
   * This class should only ever get instantiated via the `\Heap\Heap()` constructor within `index.php`
   *
   * @param String $host The hostname/IP for the Node.js environment (usually `127.0.0.1`)
   * @param Int    $port The port to connect to the Node.js environment over
   */
  public function __construct($host, $port) {
    $this->host = (string)$host;
    $this->port = (int)$port;
  }

  /**
   * Retrieves all tasks from the Node.js environment via the `getTasks` action
   */
  public function getTasks() {
    $url = 'http://' . $this->host . ':' . $this->port . '/?action=getTasks';
    $json = @file_get_contents($url);
    if(!$json) throw new Error('Failed to retrieve tasks from Node.js');

    return json_decode($json, TRUE); // We assume we're getting properly-formatted JSON here. Not usually wise, but...
  }
}
