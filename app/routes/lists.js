function verifyAuth (req, res, next) {
    if (req.isAuthenticated()) {
        return next();
    } else {
        res.status('401').json('Não autorizado');
    }
}
module.exports = function (app) {


    var controller = app.controllers.lists;

    app.route('/lists')
        .get(verifyAuth, controller.showListByUser)
        .post(verifyAuth, controller.saveList);

    app.route('/lists/:id')
        .get(verifyAuth, controller.showList)
        .delete(verifyAuth, controller.removeList);
};
