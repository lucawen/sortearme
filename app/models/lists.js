var mongoose = require('mongoose');
module.exports = function () {
    var schema = mongoose.Schema({
        name: {
            type: String,
            required: true
        },
        content: {
            type: String,
            required: true
        },
        ownerId: {
            type: String,
            required: true
        }
    });
    return mongoose.model('Lists', schema);
};
