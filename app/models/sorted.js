var mongoose = require('mongoose');
module.exports = function () {
    var schema = mongoose.Schema({
        listName: {
            type: String,
            required: true
        },
        contentSorted: {
            type: String,
            required: true
        },
        contentForSort: {
            type: String,
            required: true
        },
        ownerId: {
            type: String,
            required: true
        },
        dateSorted: {
            type: Date,
            default: Date.now
        }
    });
    return mongoose.model('Sorted', schema);
};
