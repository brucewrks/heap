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

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $json = curl_exec($ch);

    if(!$json) throw new Error('Failed to retrieve tasks from Node.js');

    return json_decode($json)->response; // We assume we're getting properly-formatted JSON here. Not usually wise, but...
  }

  /**
   * Add a task to the Heap
   */
  public function addTask($task) {
    $url = 'http://' . $this->host . ':' . $this->port . '/?action=addTask';
    $postvars = array('task' => json_encode($task));

    $json = $this->sendPostRequest($url, $postvars);
    return $json ? json_decode($json)->success : FALSE;
  }

  /**
   * Sends a POST request via cURL.
   *
   * @param String $url  The URL to send POST data to
   * @param Array  $args The POST data to send.
   *
   * @return Boolean|String The response from the request, or FALSE on error.
   */
  private function sendPostRequest($url, $args) {
    $query = http_build_query($args);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    return $response;
  }
}
