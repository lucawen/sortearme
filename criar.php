<?php
  date_default_timezone_set("America/Sao_Paulo");
  $cookie_name = 'nomes_lista';

  if (isset($_POST['lista-text'])) {
    $lista_nome = $_POST['lista-nome'];
    $lista_texto = $_POST['lista-text'];

    $file_name = $lista_nome;
    $file_name .= '_'.date('d-m-Y');
    $file_name .= '_'.date('H:i:s');
    $file_name .= '.txt';

    $file_Create = fopen('lists/'.$file_name, 'w');

    fwrite($file_Create, $lista_texto);
    fclose($file_Create);

    if (!isset($_COOKIE[$cookie_name])) {
      setcookie($cookie_name, $file_name, time()+31556926);
    } else {
      $cookie_add = $_COOKIE[$cookie_name].';'.$file_name;
      setcookie($cookie_name, $cookie_add, time()+31556926);
    }
    header("location: criar.php?msg=sucess");
  }

  if (isset($_GET['msg'])){
    if($_GET['msg'] == 'sucess'){
      $sucessMsg = "CS";
    }
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
              <li class="active"><a href="#">Nova Lista</a></li>
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
              <li class="right active"><a href="#">Nova Lista</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <main>
        <div class="container">
          <?php
          if ($sucessMsg){
            ?>
            <div class="row">
              <div class="col s12 m5 l4 offset-l4">
                <div class="card-panel teal center-align">
                  <span class="white-text">Lista criada com sucesso!</span>
                </div>
              </div>
            </div>
            <?php
            }
          ?>
          <h5 class="center-align divBTon2">Criar nova lista</h5>
          <div class="center-align divBBon">
            <div class="row">
              <form class="col s12" action="#" method="post">
                <div class="row">
                  <div class="input-field col l4 offset-l1" >
                    <input placeholder="Lista-nomes" id="list_name" type="text" class="validate" name="lista-nome" required />
                    <label for="list_name">Nome da lista</label>
                  </div>
                  <div class="input-field col l6" >
                    <i class="mdi-editor-mode-edit prefix "></i>
                    <textarea id="icon_prefix2" class="materialize-textarea" name="lista-text" required></textarea>
                    <label for="icon_prefix2">Conteúdo da lista</label>
                  </div>
                  <div class="row">
                    <div class="input-field col l4 offset-l1">
                      <h6>Opções</h6>
                      <p>
                        <input type="checkbox" class="filled-in" id="filled-in-box" disabled="disabled" name="lista-arquivo"/>
                        <label for="filled-in-box">Lista por arquivo</label>
                      </p>
                      <p>
                        <input type="checkbox" class="filled-in" id="filled-in-box" disabled="disabled" name="lista-start-sorteio"/>
                        <label for="filled-in-box">Começar sorteio</label>
                      </p>
                      <div class="buttonSubDiv">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Criar
                          <i class="mdi-content-send right"></i>
                        </button>
                      </div>
                    </div>
                  </div>
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
            <p><div class="ImgSocial"><a href="https://www.facebook.com/sortearme"><img class="responsive-img" height="42" width="42" src="img/facebook-icon.png" alt="Facebook"/></a><a href="https://github.com/lucawen/sortearme"><img src="img/github-icon.png" class="responsive-img" height="42" width="42" alt="Github"/></a></div></p>
            <p><div class="fb-like" data-href="https://www.facebook.com/sortearme" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div><p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="index.php">Início</a></li>
              <li><a class="grey-text text-lighten-3" href="contato.php">Contato</a></li>
              <li><a class="grey-text text-lighten-3" href="#">Nova Lista</a></li>
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
    </script>
  </body>
</html>
