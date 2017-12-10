<?php $tasks = \Heap\heap()->node->getTasks(); ?>
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
          <h1>Task Heap</h1>
        </div>
      </div>

      <div class="priority-shit columns medium-8">
        <h2>Priority Tasks</h2>
        <?php foreach($tasks->priority as $i => $t): ?>
          <div>
            <h4><?php echo $t->name; ?></h4>
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
            <h4><?php echo $t->name; ?></h4>
            <a href="/?action=addToPriority&index=<?php echo $i; ?>" class="button success"><i class="fa fa-star"></i> Make Priority</a>
            <a href="/?action=removeFromHeap&index=<?php echo $i; ?>" class="button alert"><i class="fa fa-times"></i> Delete</a>
          </div>
        <?php endforeach; ?>
        <div class="clearfix"></div>
      </div>

      <div class="columns">
        <div class="add-item">
          <h3>Add Item to Heap</h3>

          <hr />

          <form method="post" action="/?action=addToHeap">
            <textarea name="task" rows="5"></textarea>
            <button type="submit" class="button primary">Add to Heap</button>
          </form>
        </div>
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
    .da-heap > div:not(.clearfix),
    .add-item {
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
