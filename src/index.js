const express = require("express");
const cors = require("cors");
const bodyParser = require("body-parser");
const helmet = require("helmet");
const morgan = require("morgan");
console.log("hello there");

//defining the express app
const app = express();

// defining an array to work as database
const ads = [{title : "Hello world!"}];

//using helmet to enhance your API's Security
app.use(helmet());

//using body-parse to convert JSON bodies into JSON object
app.use(bodyParser.json());

//Enabling cors for request
app.use(cors());

//usnig morgan to log http requests
app.use(morgan('combined'));

//defining an endpoint to return all results
app.get("/", (req,res) => res.send(ads));

//starting the server
app.listen(3001,() => console.log('Listening on port 3001'));

