var mongoose = require('mongoose');
var findOrCreate = require('mongoose-findorcreate');

module.exports = function () {

    var schema = mongoose.Schema({
        login: {
            type: String,
            required: false,
        },
        nome: {
            type: String,
            required: true
        },
        avatar: {
            type: String,
            required: true
        },
        provider: {
            type: String,
            required: true
        },
        idProvider: {
            type: String,
            required: true,
            index: {
                unique: true
            }
        },
        registerDate: {
            type: Date,
            default: Date.now
        }
    });

    schema.plugin(findOrCreate);
    return mongoose.model('User', schema);
};
