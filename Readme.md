Generate new WordPress salts
https://api.wordpress.org/secret-key/1.1/salt/

# Initial Setup

Create a .env and copy the contents of the .env.example

Run `composer install`

Run `npm install`

Run `npm run build:dev`

Run `sudo docker-compose build`

Run `sudo docker-compose up`

# Theme development

Styling, scripts, theme specific images are all developed within the /src folder and compiled with webpack.

Place any .css files within the /src/css folder and use require in index.js for example within index.js
`require('./css/example.css')`
