<?php
require_once '../login_cadastro_usuario/seguranca_usuario.php';

if(isset($_SESSION['tokenUsuarioLogado'])) {
    if(!hash_equals($tokenSessao, $_SESSION['tokenUsuarioLogado'])) {
        header('Location: ../login_cadastro_usuario/logout_usuario.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seal search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /*inicio do css do footer*/
   
   
    .footer-bs {
    background-color: #3c3d41;
	padding: 60px 40px;
	color: rgba(255,255,255,1.00);
	margin-bottom: 20px;
	border-bottom-right-radius: 6px;
	border-top-left-radius: 0px;
	border-bottom-left-radius: 6px;
}
.footer-bs .footer-brand, .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { padding:10px 25px; }
.footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-color: transparent; }
.footer-bs .footer-brand h2 { margin:0px 0px 10px; }
.footer-bs .footer-brand p { font-size:12px; color:rgba(255,255,255,0.70); }

.footer-bs .footer-nav ul.pages { list-style:none; padding:0px; }
.footer-bs .footer-nav ul.pages li { padding:5px 0px;}
.footer-bs .footer-nav ul.pages a { color:rgba(255,255,255,1.00); font-weight:bold; text-transform:uppercase; }
.footer-bs .footer-nav ul.pages a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }
.footer-bs .footer-nav h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
	margin-bottom:10px;
}

.footer-bs .footer-nav ul.list { list-style:none; padding:0px; }
.footer-bs .footer-nav ul.list li { padding:5px 0px;}
.footer-bs .footer-nav ul.list a { color:rgba(255,255,255,0.80); }
.footer-bs .footer-nav ul.list a:hover { color:rgba(255,255,255,0.60); text-decoration:none; }

.footer-bs .footer-social ul { list-style:none; padding:0px; }
.footer-bs .footer-social h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
}
.footer-bs .footer-social li { padding:5px 4px;}
.footer-bs .footer-social a { color:rgba(255,255,255,1.00);}
.footer-bs .footer-social a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }

.footer-bs .footer-ns h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
	margin-bottom:10px;
}
.footer-bs .footer-ns p { font-size:12px; color:rgba(255,255,255,0.70); }

@media (min-width: 768px) {
	.footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-left:solid 1px rgba(255,255,255,0.10); }
}
/*fim do css do footer */
    
  </style>
</head>
<body>
    <div class="jumbotron" style="background-color: #F4771D">
        <div class="container text-center">
               <h1> <img src="seal1.png"> Seal Search </h1>      
          <p>Pesquisa rápida & Inequívoca</p>
        </div>
      </div>
      <nav class="navbar navbar-inverse" style="background-color:#191814">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
          <!-- <a class="navbar-brand" href="#">Logo</a> --> 
          <!-- inico do nav-->
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="Home.php">Home</a></li>
                <li><a href="Produtos.php">Produtos</a></li>
                <?php if(isset($_SESSION['tokenUsuarioLogado'])) : ?>
                    <li><a href="Perfil.php">Perfil</a></li>
                <?php else : ?>
                    <li><a href="Cadastro.php">Cadastro</a></li>
                <?php endif; ?>
              <div class="input-group" style="width:200px;font-size: 13px">
                  <input type="text" class="form-control" >
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                  </span>
                </div>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(empty($_SESSION['tokenUsuarioLogado'])) : ?>
                    <li><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Login</button></li> 
                <?php else : ?>
                    <li><a href="<?php echo '../login_cadastro_usuario/logout_usuario.php'; ?>"><button type="button" class="btn btn-warning" data-target="#exampleModalCenter">Logout</button></a></li>
                <?php endif; ?>          
              <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho</a></li>
            </ul>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Entre</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <!-- formulario de login-->
                      <form class="text-center border border-light p-5" action="../login_cadastro_usuario/login_usuario.php" method="post">
                          <h3 class="h4 mb-4" >Registre-se</h3>
                                  <!-- Email -->
              <label>
                    <?php if(isset($_SESSION['msgLoginFalha'])) : ?>
                            <span style="color: red">* Email e/ou senha incorretos</span>
                    <?php unset($_SESSION['msgLoginFalha']);
                            endif; ?>
                            <input type="email" id="defaultLoginFormEmail" name="email-login" class="form-control mb-4" placeholder="E-mail" style="width:450px;font-size: 13px" value="<?php if(isset($_COOKIE['email-login'])) { echo $_COOKIE['email-login']; }else { echo ''; } ?>">
                </label> <br>
                  <!-- Password -->
                  <label>   
                      <input type="password" id="defaultLoginFormPassword" name="senha-login" class="form-control mb-4" placeholder="Password" style="width:450px;font-size: 13px">
                </label> <br>
                          <div class="d-flex justify-content-around">
                              <div>
                                  <!-- Remember me -->
                                  <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                      <label class="custom-control-label" for="defaultLoginFormRemember">Lembrar-me</label> <br>
                                  </div>
                              </div>
                              <div>
                                  <!-- Forgot password -->
                                  <a href="">Esqueceu a sua senha?</a><br>
                              </div>
                          </div>
                          <!-- Sign in button -->
                          <input class="btn btn-warning" name="login" type="submit" value="Login"><br>
                          <!-- Register -->
                          <p>Ainda nÃ£o se cadastrou?
                          <a href = "cadastro.php">Cadastre-se</a>
                          </p><br>
                      </form>
          <!-- Fim do formulario de login -->
          </div>
          </div>
          </div>
          </nav>
          <!-- fim do nav-->
          <style>
          #back{
            background-color: #d9d9d9;
            border-radius: 15px;
          }
          #logo-foca{
            background-color: #e65c00;
            border-radius: 300px;
          }#tamanho{
          height: 180px;
          }
          </style>
          <!--Propagandas da kabum-->
<div class="container" id ="back">    
  <div class="row"><br>
 <?php
 //EXPRESSÃO REGULAR PARA PEGAR TODAS IMAGENS
$url = file_get_contents('https://www.kabum.com.br/hardware/placa-de-video-vga');
$regex_pegar_imagens = '/<img(\s)src(.*)border="0" height="90" width="90"><\/a>/';
$matches = array();
preg_match_all($regex_pegar_imagens,$url,$matches);

//EXPRESSÃO REGULAR PARA PEGAR A LOGO DA EMPRESA
$regex_logo = '/<img(.*)height="104"\s[a-z]+(.){4}\s\/>/';
$matches_logo = array();
preg_match($regex_logo,$url,$matches_logo);

//EXPRESSÃO REGULAR PARA EDITAR PARTE DA TAG HTML DA LOGO
$regex_editar_logo = '/"288"(.)+"104"/';
$exibir_logo = preg_replace($regex_editar_logo,'"100" height="30"',$matches_logo[0]);

//EXPRESSÃO PARA PEGAR A DESCRIÇÃO DO PRODUTO
$regex_desc = '/<span class="H-titulo"><a(.+)<\/span>/';
$matches_desc = array();
$exibir_desc= preg_match_all($regex_desc,$url,$matches_desc);

for($i=0; $i<29; $i++){
  $exibir[$i] = $matches[0][$i];
  $exibir_des[$i]= $matches_desc[0][$i];
  
  //CONTAINERS DAS PROPAGANDAS
    $containerPropaganda = '  <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">'.$exibir_logo.'</div>
            <div class="panel-body" id="tamanho">'.$exibir[$i]."<br>$exibir_des[$i]".'</div>
            <div class="panel-footer"><button class="btn btn-warning">clique para comprar</button></div>
        </div>
        <hr>
      </div>
    ';
    echo utf8_encode($containerPropaganda);
}
?>
</div>
 </div><br><br>
 <!--FIM propagandas da kabum-->


<!--Propagandas da pichau-->
 <div class="container" id ="back">    
  <div class="row"><br>
<?php
$url = file_get_contents("https://www.pichau.com.br/hardware/placa-de-video?product_list_limit=32");
$regex ='/<img class="product-image-photo"\n(\s)+s(.)+\s+(.)+(\D)+(.)+\s+alt="[a-zA-z0-9\s,-]+"\/>/';
$matches = array();
preg_match_all($regex,$url,$matches);


$logo_pichau = '/<img.+pichau.png"\n\s+alt=""\n\s+(.*)\/>/';
$array_logo = array();
preg_match($logo_pichau,$url,$array_logo);

$editar_logo = '/width="281"(.*)\/>/';
$logo = preg_replace($editar_logo,' width="100"             height="30"        />',$array_logo[0]);

$regex2 = '/<a class="product-item-link"(\s+.*\s+.+">\s+.*)<\/a>/';
$matches2 = array();
$exibir_desc = preg_match_all($regex2, $url,$matches2);




$regex = '/width="500"(\s)+height="500"/';
for($i = 0; $i<29; $i++){
    $var1[$i] = preg_replace($regex,' width="90"
    height="90"',$matches[0][$i])."<br>";
    $exibir_des[$i] = $matches2[0][$i];

   // echo $var1."<br>";
    //echo $matches2[0][$i];

    //CONTAINERS DAS PROPAGANDAS
    $containerPropaganda = '  <div class="col-sm-4">
    <div class="panel panel-primary">
        <div class="panel-heading">'.$logo.'</div>
        <div class="panel-body" id="tamanho">'."$var1[$i]"."<br>$exibir_des[$i]".'</div>
        <div class="panel-footer"><button class="btn btn-warning">clique para comprar</button></div>
    </div>
    <hr>
  </div>
';
echo utf8_encode($containerPropaganda);

}

?>
</div>
 </div><br><br>
 <!--FIM propagandas da pichau-->
<!-- inicio do footer-->
<footer class="footer-bs" style="background-color:#191814">
    <div class="row">
        <div class="col-md-3 footer-brand animated fadeInLeft">
            <img src="seal.png" width="250" class="img-circle" height="250">
            <p style="color: #E0851D">Seal search Ã© um site de busca rÃ¡pida e com a melhor precisÃ£o em preÃ§o para o seu bolso.</p>
            <p style="color: #E0851D">Â© 2019 Equipe foca, All rights reserved</p>
        </div>
        <div class="col-md-4 footer-nav animated fadeInUp">
            <div class="col-md-6">
                <ul class="list">
                    <li><a href="#" style="color: #E0851D">Sobre nÃ³s</a></li>
                    <li><a href="#" style="color: #E0851D">Contatos</a></li>
                    <li><a href="#" style="color: #E0851D">Termos & condiÃ§Ãµes</a></li>
                    <li><a href="#" style="color: #E0851D">Politica de privacidade</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2 footer-social animated fadeInDown">
            <h4 style="color: #E0851D">Siga-nos</h4>
            <ul>
                <li><a href="#" style="color: #E0851D">Facebook</a></li>
                <li><a href="#" style="color: #E0851D">Twitter</a></li>
                <li><a href="#" style="color: #E0851D">Instagram</a></li>
              
            </ul>
        </div>
        <div class="col-md-3 footer-ns animated fadeInRight">
            <h4 style="color: #E0851D">Newsletter</h4>
            <p style="color: #E0851D">DÃª o seu feedback</p>
            <p>
                <div class="input-group">
                  <input type="text" class="form-control" >
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                  </span>
                </div><!-- /input-group -->
             </p>
        </div>
    </div>
</footer>
<!-- fim do footer-->
</body>
</html>



