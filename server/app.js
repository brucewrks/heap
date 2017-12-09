/**
 * The main application for server-side processing in Node.js
 */

const config = require('../config.json');
const http   = require('http');

console.log(`Booting up project '${config.project}'.`);

const server = http.createServer((req, res) => {

  const actions = {
    getTasks: require('./actions/getTasks.js')
  };

  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');

  var response = actions.getTasks();

  res.end(response + '\n');
});

server.listen(config.port, config.domain, () => {
  console.log(`Server running at http://${config.domain}:${config.port}/`);
});
