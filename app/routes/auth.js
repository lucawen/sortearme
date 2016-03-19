var passport = require('passport');

module.exports = function(app) {

	app.get('/auth/github', passport.authenticate('github'));
	app.get('/auth/facebook', passport.authenticate('facebook'));
	app.get('/auth/twitter', passport.authenticate('twitter'));
	app.get('/auth/google', passport.authenticate('google', {scope: ['profile']}));
	app.get('/auth/logout', function(req, res){
        req.logOut();
        res.redirect('/');
    });
	app.get('/auth/github/callback',
			passport.authenticate('github', {
		successRedirect: '/'
	}));

    app.get('/auth/twitter/callback',
			passport.authenticate('twitter', {
		successRedirect: '/'
	}));

    app.get('/auth/facebook/callback',
			passport.authenticate('facebook', {
		successRedirect: '/'
	}));


    app.get('/auth/google/callback',
			passport.authenticate('google', {
		successRedirect: '/'
	}));

}
