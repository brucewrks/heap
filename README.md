# Da Task Heap

This project is a personal-use task management app with relative priority.

## Important Project Points

- Tasks should go into the "heap", which can later be sorted
- Only a limited number of Tasks can be mapped at any given time, and these tasks are rated in a relative priority scale
- Tasks must have ability to be `worked`, `researched` and `finished`
- Above task management must generate a daily/weekly log of tasks finished

## Configuration

Configuration is done via the `config.json` file in the root of the project, and is leveraged by both the PHP and Node.js
portions of the project. PHP needs to know what port and domain the Node environment is running, and there are a couple
of customization configuration options.

## How it works

I'm a PHP developer by trade, but I love Node.js for being an always-on platform for accepting connections and returning
API data. As such, this project requires two separate processes to run, one PHP for client-facing interaction, and one
Node.js for data management and storage. READMEs are available in the directories for these two portions.

I use `pm2` for keeping Node running in an always-on mode, and the Node server platform is totally cool with being shut down
and rerun any time you want, even though it does "store" all of the data for the tasks.
