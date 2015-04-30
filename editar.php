<?php
  date_default_timezone_set("America/Sao_Paulo");

  $cookie_name = "nomes_lista";
  if (!isset($_COOKIE[$cookie_name])){
    header("location: index.php");
  }

  if (!isset($_GET['file']) || !isset($_POST['lista-text'])){
    header("location: index.php");
  }

  if (isset($_GET['file'])){
    $file_edit =  $_GET['file'];
    $fileEditing = file_get_contents('lists/'.$file_edit);

  }
  if (isset($_POST['lista-text'])){
    $text_edit =  $_POST['lista-text'];
    $file_text =  $_POST['file_Edit'];
    $opFile = fopen('lists/'.$file_text, 'r+');
    fwrite($opFile, $text_edit);
    fclose($opFile);
    header("location: listar.php?msg=sucessEdit");
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Sortear.me | Sorteie qualquer coisa</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=1395621250699834";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <header>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper #0d47a1 blue darken-4">
            <a href="index.php" class="brand-logo"><span class="logoStyle text-accent-3">SORTEAR</span><span class="logoStyleExt">.ME</span></a>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            <ul id="slide-out" class="side-nav">
              <li><a href="contato.php">Contato</a></li>
              <li><a href="criar.php">Nova Lista</a></li>
              <?php
              if (isset($_COOKIE[$cookie_name])) {
                ?>
                <li><a href="#">Minhas Listas</a></li>
                <?php
              }
              ?>
            </ul>
            <ul id="nav-mobile" class="hide-on-med-and-down">
              <div class="navTop"><li class="left"><a href="contato.php">Contato</a></li></div>
              <?php
              if (isset($_COOKIE[$cookie_name])) {
                ?>
                <li class="right active"><a href="#">Minhas Listas</a></li>
                <?php
              }
              ?>
              <li class="right"><a href="criar.php">Nova Lista</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <main>
        <div class="container">
          <h5 class="center-align divBTon2">Editar lista</h5>
          <div class="center-align divBBon">
            <div class="row">
              <form class="col s12" action="#" method="post">
                <div class="row">
                  <div class="input-field col l6 offset-l3" >
                    <i class="mdi-editor-mode-edit prefix "></i>
                    <input type="hidden" name="file_Edit" value="<?php echo $file_edit;?>" />
                    <textarea id="icon_prefix2" class="materialize-textarea" name="lista-text" required><?php echo htmlentities($fileEditing);?></textarea>
                    <label for="icon_prefix2">Conteúdo da lista</label>
                  </div>
                  <button class="btn waves-effect waves-light" type="submit" name="action">Editar
                    <i class="mdi-content-send right"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </main>
    <footer class="page-footer #1565c0 blue darken-3">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Sobre</h5>
            <p class="grey-text text-lighten-4">Somos uma organização totalmente sem fins lucrativos. Este projeto pode ser encontrado no GitHub e baixado gratuitamente, se atribuido os créditos.</p>
            <p><div class="fb-like" data-href="https://www.facebook.com/sortearme" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div><p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="index.php">Início</a></li>
              <li><a class="grey-text text-lighten-3" href="contato.php">Contato</a></li>
              <li><a class="grey-text text-lighten-3" href="criar.php">Nova Lista</a></li>
              <?php
              if (isset($_COOKIE[$cookie_name])) {
                ?>
                <li><a class="grey-text text-lighten-3" href="#">Minhas Listas</a></li>
                <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
        <div class="footer-copyright">
          <div class="container">
          © 2015 Copyright todos os direitos reservados. Sob licença MIT, de modificação e distruição permitidos.
          <a class="grey-text text-lighten-4 right" href="http://wakecloud.net">wakecloud.net</a>
        </div>
      </div>
    </footer>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <div id="fb-root"></div>
    <script>
      $(document).ready(function(){
      $('.parallax').parallax();
    });

    $(".button-collapse").sideNav();
    </script>
  </body>
</html>
