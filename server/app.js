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

  let response = actions.getTasks();

  res.statusCode = response.success ? 200 : 500;
  res.setHeader('Content-Type', 'application/json');
  res.end(JSON.stringify(response) + '\n');
});

server.listen(config.port, config.domain, () => {
  console.log(`Server running at http://${config.domain}:${config.port}/`);
});
