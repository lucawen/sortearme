<?php
$cookie_name = 'nomes_lista';
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
    }(document, 'script', 'facebook-jssdk'));

    $(".button-collapse").sideNav();
    </script>

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
                <li><a href="listar.php">Minhas Listas</a></li>
                <?php
              }
              ?>
            </ul>
            <ul id="nav-mobile" class="hide-on-med-and-down">
              <div class="navTop"><li class="left"><a href="contato.php">Contato</a></li></div>
              <?php
              if (isset($_COOKIE[$cookie_name])) {
                ?>
                <li class="right"><a href="listar.php">Minhas Listas</a></li>
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
      <div class="parallax-container">
        <div class="white-text center-align">
          <h4>Uma forma inteligente de randomizar</h4>
          <a class="waves-effect waves-light btn-large" href="criar.php"><i class="mdi-av-playlist-add right"></i>CRIAR LISTA</a>
        </div>
        <div class="parallax">
          <img src="img/bg1.jpg">
        </div>
      </div>

        <div class="container">
          <h5 class="center-align divBTon">Suas necessidades são nossas necessidades</h5>
          <div class="center-align divBBon">
            <div class="row">
              <div class="col l4 m4 s12">
                <i class="large mdi-image-filter-drama"></i>
                <h5>Salvo em Cloud</h5>
                <p>Todas as listas são salvas em nossos servidores e você pode baixar-las a qualquer momento.</p>
              </div>
              <div class="col l4 m4 s12">
                <i class="large mdi-editor-wrap-text"></i>
                <h5>Fácil Gerenciamento</h5>
                <p>Você pode editar e sortear quantas vezes quiser a mesma lista de forma prática e sem complicações.</p>
              </div>
              <div class="col l4 m4 s12">
                <i class="large mdi-action-https"></i>
                <h5>Segurança</h5>
                <p>Seu acesso ao site é totalmente seguro, sem necessidade de informações de bancárias, email ou senhas.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="parallax-container2">
          <div class="container">
            <h4 class="center-align white-text text-darken-3">Equipe</h4>
            <div class="row divEquipe">
              <div class="col s12 m6 l4">
                <div class="card-panel grey lighten-5 z-depth-1">
                  <div class="row valign-wrapper">
                    <div class="col s4 m4 l4">
                      <img src="img/p-photos/luca.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s8 m8 l8">
                      <span class="black-text">
                        <h5>Luca Lacerda</h5>
                        <h6>WebDesigner / Programmer</h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l4">
                <div class="card-panel grey lighten-5 z-depth-1">
                  <div class="row valign-wrapper">
                    <div class="col s4 m4 l4">
                      <img src="img/p-photos/pedro.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s8 m8 l8">
                      <span class="black-text">
                        <h5>Pedro Oliveira</h5>
                        <h6>WebDesigner / Programmer</h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l4">
                <div class="card-panel grey lighten-5 z-depth-1">
                  <div class="row valign-wrapper">
                    <div class="col s4 m4 l4">
                      <img src="img/p-photos/nathalia.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s8 m8 l8">
                      <span class="black-text">
                        <h5>Nathália Caroline</h5>
                        <h6>WebDesigner / Counselor</h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l4">
                <div class="card-panel grey lighten-5 z-depth-1">
                  <div class="row valign-wrapper">
                    <div class="col s4 m4 l4">
                      <img src="img/p-photos/matheus.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s8 m8 l8">
                      <span class="black-text">
                        <h5>Matheus Fonseca</h5>
                        <h6>WebDesigner / Counselor</h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l4">
                <div class="card-panel grey lighten-5 z-depth-1">
                  <div class="row valign-wrapper">
                    <div class="col s4 m4 l4">
                      <img src="img/p-photos/pamela.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s8 m8 l8">
                      <span class="black-text">
                        <h5>Pâmela Caldeira</h5>
                        <h6>Research / Counselor</h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m6 l4">
                <div class="card-panel grey lighten-5 z-depth-1">
                  <div class="row valign-wrapper">
                    <div class="col s4 m4 l4">
                      <img src="img/p-photos/augusto.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s8 m8 l8">
                      <span class="black-text">
                        <h5>Matheus Augusto</h5>
                        <h6>Research / Counselor</h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="parallax">
            <img src="img/bg2.jpg">
          </div>
        </div>
    </main>
    <footer class="page-footer #1565c0 blue darken-3">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Sobre</h5>
            <p class="grey-text text-lighten-4">Somos uma organização totalmente sem fins lucrativos. Este projeto pode ser encontrado no GitHub e baixado gratuitamente, se atribuido os créditos.</p>
            <p><div class="fb-like" data-href="https://www.facebook.com/sortearme" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div><p>
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
                <li><a class="grey-text text-lighten-3" href="listar.php">Minhas Listas</a></li>
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
