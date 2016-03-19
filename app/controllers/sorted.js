module.exports = function (app) {
    var Sorted = app.models.sorted;
    var controller = {};

     //Cria um sorteio
    controller.createSort = function (req, res) {
        var data = {
            "listName": req.body.listName,
            "contentSorted": req.body.content,
            "contentForSort": req.body.contentForSort,
            "ownerId": req.user._id
        };

        Sorted.create(data)
            .then(
                function (dataC) {
                    res.status(201).json(dataC);
                },
                function (erro) {
                    console.log(erro);
                    res.status(500).json(erro);
                }
            );
    }

    //Mostra os dados de um sorteio
    controller.showSort = function (req, res) {
      var sortApplied = false;
      if (_id != null){
        var _id = req.params.id;
        var data = listSort(_id);

        var sortApplied = true;

        res.render('sort', {
          "sortApplied": sortApplied,
          "listName": data.listName,
          "contentSorted": data.contentSorted,
          "contentForSort": data.contentForSort,
          "ownerId": data.ownerId,
          "dateSorted": data.dateSorted
        });
      } else {
        res.render('sort', {
          "sortApplied": sortApplied
        });
      }


    };

    function listSort(id){
      Lists.findById(id).exec()
          .then(
              function (dataC) {
                  if (!dataC) throw new Error('Sorteio não encontrada.');
                  return dataC;
              },
              function (erro) {
                  console.log(erro);
                  res.status(404).json(erro);
              }
          );
    }

    return controller;
};
