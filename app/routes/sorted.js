module.exports = function(app) {

  var controller = app.controllers.sorted;

  app.post('/sort', controller.createSort);
  app.post('/sort/:id', controller.showSort);
};
