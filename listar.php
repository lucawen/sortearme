<?php
  date_default_timezone_set("America/Sao_Paulo");
  $cookie_name = 'nomes_lista';

  $cookie_set = $_COOKIE[$cookie_name];
  $cookies_array = explode(";", $cookie_set);
  $n_cookies = count($cookies_array);

  //$msgOk = true;


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
    <?php
      if (isset($_POST['lista-text'])){
        if ($msgOk == true){
          ?>
          <script> Materialize.toast('<span>Lista criada com</span><a class=&quot;btn-flat green-text&quot; href=&quot;#!&quot;>SUCESSO<a>', 5000) </script>
        <?php
        } else {
          ?>
          <script> Materialize.toast('<span>Houve um</span><a class=&quot;btn-flat red-text&quot; href=&quot;#!&quot;>PROBLEMA<a>', 5000) </script>
        <?php
        }
      }
    ?>
    <main>
        <div class="container">
          <h5 class="center-align divBTon2">Minhas Listas</h5>
          <div class="center-align divBBon">
            <div class="row">
              <div class="col l10 offset-l1">
                <table class="hoverable responsive-table centered">
                  <thead>
                    <tr>
                        <th data-field="name">Nome</th>
                        <th data-field="creation-date">Data de criação</th>
                        <th data-field="options">Hora de criação</th>
                        <th data-field="options">Opções</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      for($i=0 ; $i < $n_cookies ; $i++ ){
                        $cookies_array2array = explode("_", $cookies_array[$i]);
                        echo '
                        <tr>
                          <td>'.$cookies_array2array[0].'</td>
                          <td>'.$cookies_array2array[1].'</td>
                          <td>'.$cookies_array2array[2].'</td>
                            <a href="sorteio.php"><i class="small mdi-image-flash-on tooltipped" data-position="bottom" data-delay="50" data-tooltip="Criar sorteio"></i></a>
                            <a href="baixar.php"><i class="small mdi-action-get-app tooltipped" data-position="bottom" data-delay="50" data-tooltip="Baixar lista"></i></a>
                            <a href="editar.php"><i class="small mdi-editor-mode-edit tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar lista"></i></a>
                            <a href="remover.php"><i class="small mdi-action-highlight-remove tooltipped" data-position="bottom" data-delay="50" data-tooltip="Remover lista"></i></a>
                          </td>
                        </tr>
                        ';
                        }
                    ?>
                  </tbody>
                </table>
              </div>
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
