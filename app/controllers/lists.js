var sanitize = require('mongo-sanitize');

module.exports = function(app){
    var Lists = app.models.lists;

    var controller = {};

    controller.showListByUser = function (req, res) {
        Lists.find({'ownerId' : req.user._id}).exec()
            .then(
                function (lists) {
                    res.json(lists);
                },
                function (erro) {
                    console.error(erro)
                    res.status(500).json(erro);
                }
            );
        // Mostra todas as listas
    };

    controller.showList = function (req, res) {
     var _id = req.params.id;
     Lists.findById(_id).exec()
         .then(
             function (lists) {
                 if (!lists) throw new Error('Lista não encontrada.');
                 res.json(lists);
             },
             function (erro) {
                 console.log(erro);
                 res.status(404).json(erro);
             }
         );
        // Mostra uma lista específica
 };

    controller.removeList = function(req, res){
        var _id = sanitize(req.params.id);

        Lists.remove({"_id" : _id}).exec()
        .then(
            function(){
                res.status(204).end();
            },
            function(erro){
                return console.error(erro);
            }
        );

        // Remover uma Lista
    };
    controller.saveList = function (req, res) {
        var _id = req.body._id;

        var dados = {
            "name": req.body.name,
            "content": req.body.content,
            "ownerId": req.user._id
        };

        if (_id) {
            Lists.findByIdAndUpdate(_id, dados).exec()
                .then(
                    function (lists) {
                        res.json(lists);
                    },
                    function (erro) {
                        console.error(erro)
                        res.status(500).json(erro);
                    }
                );
        } else {
            Lists.create(dados)
                .then(
                    function (lists) {
                        res.status(201).json(lists);
                    },
                    function (erro) {
                        console.log(erro);
                        res.status(500).json(erro);
                    }
                );
        }
        //Edita uma lista, e se não tiver uma, cria.
    };
    return controller;
};
