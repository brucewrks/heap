<?php $tasks = \Heap\heap()->node->getTasks(); ?>

<?php
$tasks->priority[] = new stdClass();
$tasks->priority[0]->name = 'hello';

// $add = \Heap\heap()->node->addTask(array('name' => 'hello'));
// if(!$add) throw new \Heap\Error('fuck');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Da Heapie Geepies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    <div class="row" id="content">

      <div class="columns" style="margin-top: 1em;">
        <div class="callout primary">
          <h1>
            Task Heap
            <a href="/?addTask=1" class="button success" style="font-size: 0.9rem; margin-top: 0.25em; margin-bottom: 0.25em;">
              <i class="fa fa-plus"></i> Add New
            </a>
          </h1>
        </div>
      </div>

      <div class="priority-shit columns medium-8">
        <h2>Priority Tasks</h2>
        <?php foreach($tasks->priority as $i => $t): ?>
          <div>
            <h3><?php echo $t->name; ?></h3>
            <a href="/?action=moveUp&index=<?php echo $i; ?>" class="button success"><i class="fa fa-arrow-up"></i> Move Up</a>
            <a href="/?action=moveDown&index=<?php echo $i; ?>" class="button primary"><i class="fa fa-arrow-down"></i> Move Down</a>
            <a href="/?action=removeFromPriority&index=<?php echo $i; ?>" class="button alert"><i class="fa fa-times"></i> Remove</a>
          </div>
        <?php endforeach; ?>
        <div class="clearfix"></div>
      </div>

      <div class="da-heap columns medium-4">
        <h2>Da Heap</h2>
        <?php foreach($tasks->heap as $i => $t): ?>
          <div>
            <h3><?php echo $t->name; ?></h3>
            <a href="/?action=addToPriority&index=<?php echo $i; ?>" class="button success"><i class="fa fa-star"></i> Make Priority</a>
            <a href="/?action=removeFromHeap&index=<?php echo $i; ?>" class="button alert"><i class="fa fa-times"></i> Delete</a>
          </div>
        <?php endforeach; ?>
        <div class="clearfix"></div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>

    <script type="application/javascript">
      (function() {
        $.getJSON('http://127.0.0.1:1337/?action=getTasks', function(res) {
          // alert(res);
        });
      })();
    </script>

    <style>
    body {
      background: #EFEFEF;
    }

    .priority-shit > div:not(.clearfix),
    .da-heap > div:not(.clearfix) {
      padding: 1em;
      border: 2px solid #DDD;
      background: #FFF;
      margin-bottom: 1em;
    }

    .button.success {
      color: #FFF;
    }
    </style>
  </body>
</html>
