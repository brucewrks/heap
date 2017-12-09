/**
 * The main application for server-side processing in Node.js
 */

process.stdin.resume(); // Require that the process not close instantly

const config = require('../config.json');
const http   = require('http');
const exitHandler = require('./utils/exitHandler.js');

let tasks = require('./tasks.json');

console.log(`Booting up project '${config.project}'.`);
console.log(`There are currently ${tasks.heap.length} tasks in the heap.`);

const actions = {
  getTasks: require('./actions/getTasks.js')
};

const apiServer = http.createServer((req, res) => {
  let response = actions.getTasks(tasks);

  res.statusCode = response.success ? 200 : 500;
  res.setHeader('Content-Type', 'application/json');
  res.end(JSON.stringify(response) + '\n');
});

apiServer.listen(config.port, config.domain, () => {
  console.log(`API server running at http://${config.domain}:${config.port}/`);
});

/* === Exit Handling -- For data storage === */
process.on('exit', exitHandler.bind(null, tasks));
process.on('SIGINT', exitHandler.bind(null, tasks));
process.on('SIGUSR1', exitHandler.bind(null, tasks));
process.on('SIGUSR2', exitHandler.bind(null, tasks));
process.on('uncaughtException', exitHandler.bind(null, tasks));
