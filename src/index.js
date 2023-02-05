const express = require("express");
const cors = require("cors");
const bodyParser = require("body-parser");
const helmet = require("helmet");
const morgan = require("morgan");

//defining the express app
const app = express();

// defining an array to work as database
const ads = [{fruit : "Apple"}];

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
app.listen(443,() => console.log('Listening on port 443'));

