module.exports = (tasks, req) => {
  var postVars = req.postVars;

  if(!postVars || !req.postVars.task) return { success: false };

  var task = JSON.parse(postVars.task);

  tasks.heap.push(task);
  return { success: true };
};
