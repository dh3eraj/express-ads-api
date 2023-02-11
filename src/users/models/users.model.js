const mongoose = require("mongoose");
const userSchema = new mongoose.Schema({name : String
});
const Users = mongoose.model('Users', userSchema);
userSchema.methods.createUser = function createUser(data)
{
	const user = new Users();
	this.name = data["name"];
	return user.save();
}
exports.Users;