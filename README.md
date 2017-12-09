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
