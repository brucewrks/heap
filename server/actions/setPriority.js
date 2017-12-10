module.exports = (tasks, req) => {
  var postData = req.postVars;
  var config   = require(__dirname + '/../../config.json');

  if(!postData || !postData.task || !postData.priority) return { success: false };

  if(tasks.priority.length === config.maxTasks) {
    var heapTask = tasks.priority[config.maxTasks - 1];
    tasks.priority.splice((config.maxTasks - 1), 1);
    tasks.heap.splice(0, 0, heapTask);
  }

  tasks.priority.splice(postdata.priority, 0, tasks.heap[task]);
  tasks.heap.splice(task, 1);

  return { success: true };
};
