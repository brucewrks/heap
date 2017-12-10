let dumped = false;
const fs = require('fs');

module.exports = (tasks, stack) => {
  if(dumped) return;
  else dumped = true;

  console.log('\nProcess end detected.');
  console.log(`Dumping heap of ${tasks.heap.length} into tasks.json`);

  tasks = JSON.stringify(tasks);
  fs.writeFile(__dirname + '/../tasks.json', tasks, 'utf8', (err) => {
    if(err) {
      console.log('Failed to save tasks to tasks.json: ' + err);
      console.log('Tasks dump below:\n\n');
      console.log(heap);
    } else {
      console.log('Tasks successfully saved to tasks.json');
    }

    if(stack) console.error(stack);
    process.exit();
  });
};
