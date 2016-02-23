var passport = require('passport');
var GitHubStrategy = require('passport-github').Strategy;
var FacebookStrategy = require('passport-facebook').Strategy;
var GoogleStrategy = require('passport-google-oauth20').Strategy;
var TwitterStrategy = require('passport-twitter').Strategy;
var findOrCreate = require('mongoose-findorcreate');
var mongoose = require('mongoose');

var config = {
    facebook: {
        clientId: '1532026023756419',
        secret: '0edc96780224d1974798d983c1fda727',
        callback: 'http://hungry-baboon-7352.vagrantshare.com/auth/facebook/callback'
    },
    google: {
        clientId: '278190941683-ngr1h3g8v6eeqceh99195ssqeh7gj5sh.apps.googleusercontent.com',
        secret: 'uWPuiZHBwrER2hgllnKsosfC',
        callback: 'http://hungry-baboon-7352.vagrantshare.com/auth/google/callback'
    },
    twitter: {
        clientId: '3ac8zmmXIKhC4Fb1NxUSF5Tfx',
        secret: 'nrNfJ2dE0Km8nSjRcPSlWyrN4VcMAobHxrON31YcvoKAcPGLq2',
        callback: 'http://hungry-baboon-7352.vagrantshare.com/auth/twitter/callback'
    },
    github: {
        clientId: '610270a6cde7bb789b9b',
        secret: 'e207f0d1931e415e7a7f8ae16a626ccd756e2793',
        callback: 'http://crawling-vicuna-8915.vagrantshare.com/auth/github/callback'
    }
}

module.exports = function() {

	var User = mongoose.model('User');

	passport.use(new GitHubStrategy({
	    clientID: config.github.clientId,
	    clientSecret: config.github.secret,
	    callbackURL: config.github.callback
	}, function (accessToken, refreshToken, profile, done) {

	    User.findOrCreate(
            { idProvider: profile.id},
            {
	            nome: profile.displayName,
	            avatar: profile._json.avatar_url,
	            provider: profile.provider,
	            login: profile.username
	        },
	        function (erro, usuario) {
	            if (erro) {
	                return done(erro);
	            }
	            return done(null, usuario);
	        }
	    );
	}));

	passport.use(new FacebookStrategy({
	    clientID: config.facebook.clientId,
	    clientSecret: config.facebook.secret,
	    callbackURL: config.facebook.callback,
        profileFields: ['id', 'displayName', 'emails', 'picture']
	}, function (accessToken, refreshToken, profile, done) {

	    User.findOrCreate(
            { idProvider: profile.id },
            {
	            nome: profile.displayName,
	            avatar: 'https://graph.facebook.com/'+profile.id+'/picture?width=150&height=150',
	            provider: profile.provider
	        },
	        function (erro, usuario) {
	            if (erro) {
	                return done(erro);
	            }
	            return done(null, usuario);
	        }
	    );
	}));



    passport.use(new GoogleStrategy({
        clientID: config.google.clientId,
	    clientSecret: config.google.secret,
	    callbackURL: config.google.callback
    }, function (accessToken, refreshToken, profile, done) {
        console.log('profile', profile)
        User.findOrCreate(
            { idProvider: profile.id },
            {
                nome: profile.displayName,
                avatar: profile.photos ? profile.photos[0].value.replace('?sz=50', '?sz=150') : 'assets/img/default-avatar.jpg',
                provider: profile.provider,
                login: profile.username
            },
            function (erro, usuario) {
                if (erro) {
                    return done(erro);
                }
                return done(null, usuario);
            }
        );
    }));

    passport.use(new TwitterStrategy({
        consumerKey: config.twitter.clientId,
        consumerSecret: config.twitter.secret,
        callbackURL: config.twitter.callback
    }, function (accessToken, refreshToken, profile, done) {
        User.findOrCreate(
            { idProvider: profile.id },
            {
                nome: profile.displayName,
                avatar: profile.photos ? profile.photos[0].value.replace('_normal', '') : 'assets/img/default-avatar.jpg' ,
                provider: profile.provider,
                login: profile.username
            },
            function (erro, usuario) {
                if (erro) {
                    return done(erro);
                }
                return done(null, usuario);
            }
        );
    }));



	passport.serializeUser(function(usuario, done) {
	  done(null, usuario._id);
	});

	passport.deserializeUser(function(id, done) {
	  User.findById(id).exec()
	  .then(function(usuario) {
	  	done(null, usuario);
	  });
	});
};
