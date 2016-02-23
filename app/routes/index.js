module.exports = function(app) {
    app.get('/', function(req, res){
        var login = '';
        var name = '';
        var userId = '';
        var userProvider  = '';
        var avatar = '';

        if(req.user){
            login = req.user.login;
            name = req.user.nome;
            userId = req.user._id;
            avatar = req.user.avatar;
            userProvider = req.user.provider;
        }
        res.render('index', {"userLogged": login, "avatarUrl": avatar, "userProvider": userProvider, "userName": name, "userId": userId});
    });
};
