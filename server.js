var app = require('./config/express')();
require('./config/passport')();
require('./config/database.js')('mongodb://localhost/sortearme');

app.listen(app.get('port'), function () {
  console.log('Running on port '+ app.get('port'));
});
