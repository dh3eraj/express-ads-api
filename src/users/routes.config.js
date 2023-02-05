const UsersController = require("./controllers/users.controllers");
const express = require("express");
const cors = require("cors");
const bodyParser = require("body-parser");
const helmet = require("helmet");
const morgan = require("morgan");
const mongoose = require("mongoose");
const path = require("path");
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
const staticPath = path.join(__dirname,"../public")
app.use(express.static(staticPath));
//defining an endpoint to return all results
app.get("/", (req,res) => res.send(ads));
app.get('/users', (req,res) =>res.send([
	{name : "Dheeraj"}
           ]));
exports.app;
app.listen(443,() => console.log('Listening on port 443',staticPath));