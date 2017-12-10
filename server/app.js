/**
 * The main application for server-side processing in Node.js
 */

process.stdin.resume(); // Require that the process not close instantly

const config      = require(__dirname + '/../config.json');
const http        = require('http');
const exitHandler = require(__dirname + '/utils/exitHandler.js');
const url         = require('url');
const qs          = require('querystring');

let tasks = require(__dirname + '/tasks.json');

console.log(`Booting up project '${config.project}'.`);
console.log(`There are currently ${tasks.heap.length} tasks in the heap.`);

const actions = {
  getTasks    : require(__dirname + '/actions/getTasks.js'),
  addTask     : require(__dirname + '/actions/addTask.js'),
  setPriority : require(__dirname + '/actions/setPriority.js')
};

const apiServer = http.createServer((req, res) => {
  const handleRequest = () => {
    let get = url.parse(req.url, true).query;
    let action = actions.getTasks;

    if(get.action === 'addTask') action = actions.addTask;
    if(get.action === 'setPriority') action = actions.setPriority;

    let response = action(tasks, req);

    res.statusCode = response.success ? 200 : 500;
    res.setHeader('Content-Type', 'application/json');
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.end(JSON.stringify(response) + '\n');
  };

  if(req.method === 'POST') {
    let postData = '';
    req.on('data', function (data) {
      postData += data;
      if(postData.length > 1e12) req.connection.destroy();
    });
    req.on('end', function () {
      req.postVars = qs.parse(postData);
      handleRequest();
    });
  } else handleRequest();
});

apiServer.listen(config.port, config.domain, () => {
  console.log(`API server running at http://${config.domain}:${config.port}/`);
});

/* === Exit Handling -- For data storage === */
process.on('exit', exitHandler.bind(null, tasks, null));
process.on('SIGINT', exitHandler.bind(null, tasks, null));
process.on('SIGUSR1', exitHandler.bind(null, tasks, null));
process.on('SIGUSR2', exitHandler.bind(null, tasks, null));
// process.on('uncaughtException', (err) => { exitHandler.bind(null, tasks, err) });
