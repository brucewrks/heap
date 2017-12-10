<!DOCTYPE html>
<html>
  <head>
    <title>Da Heapie Geepies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" />
  </head>
  <body>

    <div class="row" id="content">
      <div class="columns">
        <h1>Da Heap</h1>

        <?php
        $tasks = \Heap\heap()->node->getTasks();
        foreach($tasks->heap as $t) echo $t->name;

        // $add = \Heap\heap()->node->addTask(array('name' => 'hello'));
        // if(!$add) throw new \Heap\Error('fuck');
        ?>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>

    <script type="application/javascript">
      (function() {
        $.getJSON('127.0.0.1:1337/?action=getTasks', function(err, res) {
          alert(res);
        });
      })();
    </script>
  </body>
</html>
