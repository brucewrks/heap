# Da Heap Server Processing

The Node.js portion of this application doubles as the internal processing API, and the data storage functionality.

All tasks are currently being stored in an in-memory JavaScript Object, which gets dumped each time the process ends into
`tasks.json`. On process restart, `tasks.json` gets reread and we pick up where we left off.

It's not the greatest thing ever, but it's fast and as long as we're only talking enough tasks for one person, it works just fine.
