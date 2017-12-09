# Da Heap Client-Facing Section

This section is client-facing, meaning that it'll run via Apache on port `80` (or `8080` if you're a special snowflake).

The Node.js portion of the application is not accessible from anywhere but `127.0.0.1`, and essentially assumes that there's no need
to verify the data that comes in to it. This PHP portion has all of the validation rules and will only send data to Node.js in the way
that it requires.
