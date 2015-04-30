<?php
  date_default_timezone_set("America/Sao_Paulo");
  $cookie_name = "nomes_lista";

  if (!isset($_COOKIE[$cookie_name])){
    header("location: index.php");
  }

  $cookie_set = $_COOKIE[$cookie_name];
  $cookies_array = explode(";", $cookie_set);
  $n_cookies = count($cookies_array);

  if (isset($_POST['num_select'])){
    $fileNumSend =  $_POST['num_fileTrans'];
    $numSend = $_POST['num_select'];
    header("location: listar.php?action=sortear&num_rep=".$numSend."&file=".$fileNumSend);
  }
  if (isset($_GET['action'])){
    $action_method = $_GET['action'];
    $list_file = $_GET['file'];

    if ($action_method == 'sortear'){
      $file_open = fopen('lists/'.$list_file, 'r');
      $lists_array = explode ("\n", fread($file_open, filesize('lists/'.$list_file)));

      if (isset($_GET['num_rep'])){
        $n_lists = $_GET['num_rep'];
        $sCount = true;
        for($f=0 ; $f < $n_lists ; $f++ ){
          sort($lists_array);
          if ($sCount == true) {
            $sort_result = $lists_array[$f];
            $sCount = false;
          } else {
            $sort_result .= ';'.$lists_array[$f];
          }
        }
        $list_sort_array = explode(';', $sort_result);
        fclose($file_open);
      } else {
        header('location: listar.php?action=sortearNum&file='.$list_file);
      }
    } else if ($action_method == 'sortearNum') {
      $numSelect = $_GET['file'];
    } else if ($action_method == 'download') {
      header('Content-disposition: attachment; filename=lists/'.$list_file);
      header('Content-type: text/plain');
    } else if ($action_method == 'edit') {

      header("location: listar.php?msg=sucessEdit");
    } else if ($action_method == 'remove') {
      $rCount = true;
      for($k=0 ; $k < $n_cookies ; $k++ ){
        if ($cookies_array[$k] !== $list_file){
          if ($rCount == true) {
            $cookie_massive = $cookies_array[$k];
            $rCount = false;
          } else {
            $cookie_massive .= ';'.$cookies_array[$k];
          }
        } else {
          unlink ('lists/'.$cookies_array[$k]);
        }
      }
      setcookie($cookie_name, $cookie_massive);
      header("location: listar.php?msg=sucessRemove");
    } else {
      header("location: listar.php?msg=error");
    }
  }

  if (isset($_GET['msg'])){
    if($_GET['msg'] == 'sucessRemove'){
      $sucessMsg = "Removido com sucesso!";
    } else if ($_GET['msg'] == 'sucessEdit'){
      $sucessMsg = "Editado com sucesso!";
    }else{
      $failMsg = "Ocorreu um problema.";
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
          <?php
          if (isset($numSelect)){
            ?>
                <div class="row">
                  <div class="input-field col l6">
                    <form class="col l6" action="#" method="post">
                      <input  id="num_select" name="num_select" type="text" class="validate" required/>
                      <label for="num_select">Quantidade para sortear números</label>
                      <input type="hidden" name="num_fileTrans" value="<?php echo $numSelect;?>" />
                      <button class="btn waves-effect waves-light" type="submit" name="action">Sortear
                       <i class="mdi-content-send right"></i>
                     </button>
                   </form>
                  </div>
                </div>
            <?php
          }
          ?>
          <?php
          if (isset($sucessMsg)){
            ?>
            <div class="row">
              <div class="col s12 m5 l4 offset-l4">
                <div class="card-panel teal center-align">
                  <span class="white-text"><?php echo $sucessMsg; ?></span>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
          <?php
          if (isset($list_sort_array)){
            ?>
            <div class="row">
              <div class="col s12 m5 l4 offset-l4">
                <div class="card-panel teal center-align">
                  <span class="white-text">
                    <?php
                    $list_sort_arrayCount = count($list_sort_array);
                    for($i=0 ; $i < $list_sort_arrayCount ; $i++ ){
                      echo $list_sort_array[$i];
                      }
                    ?>
                    </span>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
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
                        $time_create = explode(".", $cookies_array2array[2]);
                        echo '
                        <tr>
                          <td>'.$cookies_array2array[0].'</td>
                          <td>'.$cookies_array2array[1].'</td>
                          <td>'.$time_create[0].'</td>
                          <td>
                            <a class="tooltipped" data-position="bottom" data-delay="30" data-tooltip="Criar sorteio" href="?action=sortear&file='.$cookies_array[$i].'"" ><i class="small mdi-image-flash-on"></i></a>
                            <a class="tooltipped" data-position="bottom" data-delay="30" data-tooltip="Baixar lista" href="?action=download&file='.$cookies_array[$i].'""><i class="small mdi-action-get-app" ></i></a>
                            <a class="tooltipped" data-position="bottom" data-delay="30" data-tooltip="Editar lista" href="?action=edit&file='.$cookies_array[$i].'""><i class="small mdi-editor-mode-edit"></i></a>
                            <a class="tooltipped" data-position="bottom" data-delay="30" data-tooltip="Deletar lista" href="?action=remove&file='.$cookies_array[$i].'"><i class="small mdi-action-highlight-remove"></i></a>
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
