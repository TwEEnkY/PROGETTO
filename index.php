<?php 
  session_start();
  if($_SESSION['shoptrans_ok'] != true){
    header('Location: http://www.shoptrans.com.br/tabela/consultar/entrar.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <base href="http://www.shoptrans.com.br/tabela/consultar/" />
    <meta charset="utf-8">
    <title>Tabela Shoptrans | Avaliação de implementos rodoviários usados</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">        
    <meta name="description" content="Avaliação de implementos rodoviários usados"/>
    <meta http-equiv="content-language" content="pt-br"/>
    <meta name="language" content="pt-br"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <meta name="robots" content="index, follow"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700" rel="stylesheet">
    
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/estilo.css?3" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-select.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css"/>
    <link rel="stylesheet" href="css/icheck/line/grey.css">
    <script>
        const WEB = true;
    </script>
        
<!--  <script type="text/javascript" charset="utf-8" src="cordova.js"></script>-->
      <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>        
      <script type="text/javascript" src="js/bootstrap-select.min.js"></script>        
      <script type="text/javascript" src="js/defaults-pt_BR.min.js"></script>        
      <script type="text/javascript" src="js/bootstrap-slider.min.js"></script>  
      <script type="text/javascript" src="js/icheck.js"></script>
        
        <script>
        if(WEB){
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-21044498-47', 'shoptrans.com.br');
          ga('send', 'pageview');

        }


        </script>                     
  </head>
  <body>    
    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '795183304004049');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=795183304004049&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '795183304004049', {
em: 'insert_email_variable'
});
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=795183304004049&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
       <script>
          const DOMAIN = 'http://www.shoptrans.com.br/tabela/';
          const ANO_ATUAL = new Date().getFullYear();   
          var NECESSITA_FB = true;
 
          <?php if($_SESSION['shoptrans_ok'] == true){ ?>
            NECESSITA_FB = false;
          <?php } ?>
          

          var carregarUrl = {
            carregado: <?php echo !empty($_REQUEST['categoria'])? 'false' : 'true' ?>,
            isCopiado: <?php echo !empty($_REQUEST['categoria'])? 'true' : 'false' ?>,
            categoria: '<?php echo $_REQUEST['categoria'] ?>',
            linha: '<?php echo $_REQUEST['linha'] ?>',
            base: '<?php echo $_REQUEST['base'] ?>',
            numeroEixos: '<?php echo $_REQUEST['numero-eixos'] ?>',
            tipoSuspensao: '<?php echo $_REQUEST['tipo-suspensao'] ?>',
            distribuicaoEixos: '<?php echo $_REQUEST['distribuicao-eixos'] ?>',
            modelo: '<?php echo $_REQUEST['modelo'] ?>',
            tamanho: '<?php echo $_REQUEST['tamanho'] ?>',
            marca: '<?php echo $_REQUEST['marca'] ?>',
            caixaDeCarga: '<?php echo $_REQUEST['caixa_de_carga'] ?>',
            ano: '<?php echo $_REQUEST['ano'] ?>',
            uf: '<?php echo $_REQUEST['uf'] ?>',
            assoalho: '<?php echo $_REQUEST['assoalho'] ?>',
            estadoAssoalho: '<?php echo $_REQUEST['estado_assoalho'] ?>',
            estadoCaixaDeCarga: '<?php echo $_REQUEST['estado_caixa_de_carga'] ?>',
            estadoMecanica: '<?php echo $_REQUEST['estado_mecanica'] ?>',
            estadoSistemaEletrico: '<?php echo $_REQUEST['estado_sistema_eletrico'] ?>',
            estadoEstruturaChassi: '<?php echo $_REQUEST['estado_estrutura_chassi'] ?>',
            pintura: '<?php echo $_REQUEST['pintura'] ?>',
            estadoVeiculo: '<?php echo $_REQUEST['estado_veiculo'] ?>',
            comprimento: '<?php echo $_REQUEST['comprimento'] ?>'
          };

          $(document).ready(function(){
      		    if(carregarUrl.carregado == false){         
      		    	$("#formulario, .preencha").hide();
      		    	$("#btn-limpar").html("FAZER UMA NOVA AVALIAÇÃO").attr('href', DOMAIN+'consultar').removeClass('limpar');
      		      $("#resultado").css("margin", "20px auto 0 auto");
              }    

              if(!WEB){
                  $("#compartilhamento .imprimir").remove();
              }
          });
        
          function carregando(){
            $("#loading").show();              
          }   
          function carregado(){
            $("#loading").hide();              
          }   
           
          function obterRadio(name){          
              var radios = document.getElementsByName(name);
              var i = 0;
              while (i < radios.length) {
                  if (radios[i].checked) return radios[i].value;
                  i++;        
              }             
          } 
            
          function Resultado(){ 
              var modelo_marca = document.getElementById('s-marca').value;
              modelo_marca = modelo_marca.split(";");
              
              var form_categoria = $("#formulario").attr("data-categoria");
              var categoria = document.getElementById('s-categoria').value;
              var linha = document.getElementById('s-linha').value;
              var modelo = modelo_marca[0];
              var marca = modelo_marca[1]; 
              var ano = document.getElementById('s-ano').value;
              var uf = document.getElementById('s-uf').value;
              var estado_veiculo = obterRadio("estado_veiculo");  
              var base = null;
              var numero_eixos = null;
              var tipo_suspensao = null;
              var distribuicao_eixos = null;
              var tamanho = null;
              var pintura = null;
              var assoalho = null;
              var caixa_de_carga = null;   
              var estado_caixa_de_carga = null;
              var estado_assoalho = null;                
              var estado_mecanica = null;              
              var estado_sistema_eletrico = null;              
              var estado_estrutura_chassi = null;   
              var comprimento = null;


              
              if($("#container-base").attr("data-ativo") == 1){
                  var base = $("#s-base option:selected").text();
              }         
              
              if($("#container-numero-eixos").attr("data-ativo") == 1){
                  var numero_eixos = $("#s-numero-eixos option:selected").text();
              }          
              
              if($("#container-tipo-suspensao").attr("data-ativo") == 1){
                  var tipo_suspensao = $("#s-tipo-suspensao option:selected").text();
              }          
              
              if($("#container-distribuicao-eixos").attr("data-ativo") == 1){
                  var distribuicao_eixos = $("#s-distribuicao-eixos option:selected").text();
              }          
              
              if($("#container-tamanho").attr("data-ativo") == 1){
                  var tamanho = $("#s-tamanho option:selected").text();
              }                 
              
              if($("#s-assoalho").attr("data-ativo") == 1){
                  var assoalho = document.getElementById('s-assoalho').value;
                  var estado_assoalho = obterRadio("estado_assoalho");                            
              }
              
              if($("#s-caixa_de_carga").attr("data-ativo") == 1){
                  var caixa_de_carga = document.getElementById('s-caixa_de_carga').value;
                  var estado_caixa_de_carga = obterRadio("estado_caixa_de_carga");
              }
                        
              if($("#container-estado-pintura").attr("data-ativo") == 1){
                  var pintura = obterRadio("pintura");                            
              } 
                        
              if($("#container-estado-mecanica").attr("data-ativo") == 1){
                  var estado_mecanica = obterRadio("estado_mecanica");                            
              } 
                        
              if($("#container-estado-sistema-eletrico").attr("data-ativo") == 1){
                  var estado_sistema_eletrico = obterRadio("estado_sistema_eletrico");                            
              }    
                        
              if($("#container-estado-estrutura-chassi").attr("data-ativo") == 1){
                  var estado_estrutura_chassi = obterRadio("estado_estrutura_chassi");                            
              }    
              
              if($(".form-regua").attr("data-ativo") == 1){
                  var comprimento = document.getElementById('s-comprimento').value;
              }               
                          
              
              carregando();
              $.ajax({
                    url: DOMAIN + 'api',
                    method: "POST",
                    data:{
                        method: 'calcular',
                        form_categoria: form_categoria,
                        categoria: categoria,
                        linha: linha,
                        base: base,
                        numero_eixos: numero_eixos,
                        tipo_suspensao: tipo_suspensao,
                        distribuicao_eixos: distribuicao_eixos,
                        modelo: modelo,
                        tamanho: tamanho,
                        marca: marca,
                        ano: ano,
                        uf: uf,
                        assoalho: assoalho,
                        caixa_de_carga: caixa_de_carga,
                        comprimento: comprimento,
                        estado_geral: estado_veiculo,
                        estado_assoalho: estado_assoalho,
                        estado_caixa_de_carga: estado_caixa_de_carga,
                        estado_pintura: pintura,
                        estado_mecanica: estado_mecanica,
                        estado_sistema_eletrico: estado_sistema_eletrico,
                        estado_estrutura_chassi: estado_estrutura_chassi,
                        cache: Math.random() 
                        //v: '2.0.0'
                    },
                    dataType: "json",
                    success: function (data) {
                                                                
                        $("#resultado-categoria").html(data.categoria);
                        $("#resultado-linha").html(data.linha);
                        $("#resultado-modelo").html(data.modelo);
                        $("#resultado-marca").html(data.marca);  
                        if(data.ano == ANO_ATUAL){
                            var ano_text = data.ano+" Usado";                                 
                        }else{ 
                            var ano_text = data.ano; 
                        }                        
                        $("#resultado-ano").html(ano_text);                        
                        $("#resultado-uf").html(data.uf);
                        
                        if(data.assoalho != ''){
                            $("#resultado-assoalho").html(data.assoalho).parent().show();
                            if(data.estado_assoalho == 'Otimo'){ data.estado_assoalho = 'Ótimo'; }
                            $("#resultado-estado-assoalho").html(data.estado_assoalho).parent().show();                           
                        }else{
                            $("#resultado-assoalho").parent().hide();
                            $("#resultado-estado-assoalho").parent().hide();
                        }
                        
                        if(data.caixa_de_carga != ''){
                            $("#resultado-caixa-de-carga").html(data.caixa_de_carga).parent().show();
                            if(data.estado_caixa_de_carga == 'Otimo'){ data.estado_caixa_de_carga = 'Ótimo'; }
                            $("#resultado-estado-caixa-de-carga").html(data.estado_caixa_de_carga).parent().show();                             
                        }else{
                            $("#resultado-caixa-de-carga").parent().hide();
                            $("#resultado-estado-caixa-de-carga").parent().hide();
                        }                                           
                        
                        if(data.estado_mecanica != ''){
                            if(data.estado_mecanica == 'Otimo'){ data.estado_mecanica = 'Ótimo'; }
                            $("#resultado-estado-mecanica").html(data.estado_mecanica).parent().show();
                        }else{
                            $("#resultado-estado-mecanica").parent().hide();
                        }
                            
                        if(data.estado_sistema_eletrico != ''){
                            if(data.estado_sistema_eletrico == 'Otimo'){ data.estado_sistema_eletrico = 'Ótimo'; }
                            $("#resultado-estado-sistema-eletrico").html(data.estado_sistema_eletrico).parent().show();
                        }else{
                            $("#resultado-estado-sistema-eletrico").parent().hide();
                        } 
                            
                        if(data.estado_estrutura_chassi != ''){
                            if(data.estado_estrutura_chassi == 'Otimo'){ data.estado_estrutura_chassi = 'Ótimo'; }
                            $("#resultado-estado-estrutura-chassi").html(data.estado_estrutura_chassi).parent().show();
                        }else{
                            $("#resultado-estado-estrutura-chassi").parent().hide();
                        }
                            
                        if(data.estado_pintura != ''){
                            if(data.estado_pintura == 'Otimo'){ data.estado_pintura = 'Ótimo'; }
                            $("#resultado-estado-pintura").html(data.estado_pintura).parent().show();
                        }else{
                            $("#resultado-estado-pintura").parent().hide();
                        }       
                        
                        if(data.base != ''){
                            $("#resultado-base").html(data.base).parent().show();
                        }else{
                            $("#resultado-base").parent().hide();
                        }       
                        
                        if(data.numero_eixos != ''){
                            $("#resultado-numero-eixos").html(data.numero_eixos).parent().show();
                        }else{
                            $("#resultado-numero-eixos").parent().hide();
                        }       
                        
                        if(data.tipo_suspensao != ''){
                            $("#resultado-tipo-suspensao").html(data.tipo_suspensao).parent().show();
                        }else{
                            $("#resultado-tipo-suspensao").parent().hide();
                        }       
                        
                        if(data.distribuicao_eixos != ''){
                            $("#resultado-distribuicao-eixos").html(data.distribuicao_eixos).parent().show();
                        }else{
                            $("#resultado-distribuicao-eixos").parent().hide();
                        }     
                        
                        if(data.estado_geral == 'Otimo'){ data.estado_geral = 'Ótimo'; }
                        $("#resultado-estado-geral").html(data.estado_geral);                          
                        
                        if(data.form_categoria == 1){
                            $("#comprimento-resultado").show();
                            $("#tamanho-resultado").hide();
                            $(".obs").hide();
                            var unidade_de_medida = $("#s-comprimento").attr("data-unidade");                         
                            if(unidade_de_medida == 'm'){
                                $("#resultado-comprimento-nomenclatura").html("COMPRIMENTO");
                                $("#resultado-comprimento-valor").html(data.comprimento+" metros");
                            }else if(unidade_de_medida == 'l'){
                                $("#resultado-comprimento-nomenclatura").html("CAPACIDADE");
                                $("#resultado-comprimento-valor").html(data.comprimento*1000+" litros");
                            }else if(unidade_de_medida == 'm3'){
                                $("#resultado-comprimento-nomenclatura").html("CAPACIDADE");
                                $("#resultado-comprimento-valor").html(data.comprimento+" m³");
                            }
                        }else if(data.form_categoria == 2){
                            $(".obs").show();                            
                            $("#comprimento-resultado").hide();
                            if(data.tamanho != ''){
                                $("#tamanho-resultado").show();
                                $("#resultado-tamanho").html(data.tamanho);       
                            }else{
                                $("#tamanho-resultado").hide();
                            }
                        }
                        
                        $("#resultado-calculo").html("R$ "+data.valor);
                        $("#mask-overlay, #modal").hide();
                        $("#resultado").show();
                        if(carregarUrl.isCopiado == false){
                          var deslocamento = $("#resultado-calculo").offset().top;
                          $('html, body').animate({scrollTop:deslocamento-76}, 'slow');  
                        }
                         
                    },
                    complete: function(data){
                        carregado();
                    }
              });                           
          } 
           
          function hasClass( elem, klass ) {
              return (" " + elem.className + " " ).indexOf( " "+klass+" " ) > -1;
          }

          function salvarDados(response){
                window.localStorage.setItem('nome', response.name);
                
                //Não exibir resultado e não salvar e-mail ao carregar página
                if(hasClass(document.getElementById('pesquisar'), 'clicado')){
                    //exibir infos da pesquisa
                    Resultado();
                    //console.log(response.name, response.email);
                    $.ajax({
                        url: DOMAIN + 'api',
                        method: "POST",
                        data:{
                            method: 'salvarUserEmail',
                            id_fb: response.id,
                            nome: response.name,
                            email: response.email,
                            cache: Math.random()
                            //v: '2.0.0'
                        },
                        dataType: "json",
                        success: function (data) {
                        }
                        //,
                        //complete: function(){
                            //solicitação concluída
                        //}
                    });                        
                    
                }
          }
            
          //localStorage.removeItem("nome");
           
          // This is called with the results from from FB.getLoginStatus().
          function statusChangeCallback(response) {
            // The response object is returned with a status field that lets the
            // app know the current login status of the person.
            // Full docs on the response object can be found in the documentation
            // for FB.getLoginStatus().

            if (response.status === 'connected') {
                if(WEB){
                    FB.api('/me?fields=name,email', function(response) {
                        salvarDados(response);
                        
                    });     
                }else{
                    facebookConnectPlugin.api('me/?fields=name,email', ["public_profile"],
                        function(r){
                            salvarDados(r);
                        }, function(){
                            alert('Erro. Por favor, tente novamente');
                        }
                    );
                }

            } else {
                //console.log("Não conectado");    
            }
          }

          // This function is called when someone finishes with the Login
          // Button.  See the onlogin handler attached to it in the sample
          // code below.
            function checkLoginState(r) {
                if(WEB){
                    FB.getLoginStatus(function(response) {
                        statusChangeCallback(response);
                    });
                }else{
                    statusChangeCallback(r);
                }
                $.ajax({
                    url: DOMAIN + 'api',
                    method: "POST",
                    data:{
                        method: 'salvarMensuracaoLogin',
                        cache: Math.random()
                        //v: '2.0.0'
                    }
                }); 
            }

          if(WEB){
              window.fbAsyncInit = function() {
                  FB.init({
                    appId      : '1775120696135345',
                    cookie     : true,  // enable cookies to allow the server to access 
                                        // the session
                    xfbml      : true,  // parse social plugins on this page
                    version    : 'v2.8' // use graph api version 2.8
                  });

          // Now that we've initialized the JavaScript SDK, we call 
          // FB.getLoginStatus().  This function gets the state of the
          // person visiting this page and can return one of three states to
          // the callback you provide.  They can be:
          //
          // 1. Logged into your app ('connected')
          // 2. Logged into Facebook, but not your app ('not_authorized')
          // 3. Not logged into Facebook and can't tell if they are logged into
          //    your app or not.
          //
          // These three cases are handled in the callback function.

                  FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                  });

              };
          }

          // Load the SDK asynchronously
          (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));             
           
        jQuery(document).ready(function($) {                
          function validarRadio(name){          
              var radios = document.getElementsByName(name);
              var formValid = false;

              var i = 0;
              while (!formValid && i < radios.length) {
                  if (radios[i].checked) formValid = true;
                  i++;        
              }

              //if (!formValid) alert("Must check some option!");
              return formValid;              
          }    
                     
            Object.size = function(obj) {
                var size = 0, key;
                for (key in obj) {
                    if (obj.hasOwnProperty(key)) size++;
                }
                return size;
            };
           
            function getRandom(max) {
                return Math.floor(Math.random() * max + 1)
            }        


            function atualizarBanners(){                   
                $.ajax({
                    url: DOMAIN + 'api',
                    data:{
                        method: 'getBanners',
                        cache: Math.random()
                        //v: '2.0.0'
                    },
                    dataType: "json",
                    success: function (data){
                        banners_p = data.banners_p;
                        banners_m = data.banners_m;
                        banners_g = data.banners_g;
                        banners_template = data.banners_template;
                        var div_template = $(".template[data-template='" + banners_template + "']");

                        if(banners_template == 1){ //Formato 1x3
                            //1 Tamanho G
                            var random = getRandom(banners_g.length)-1;
                            $(div_template).find(".um-parceiro.col-xs-12").find(".logo-container[data-posicao='1']").html("<a href='"+banners_g[random]['url']+"' target='"+banners_g[random]['target']+"'><img src='"+DOMAIN+"imagens/"+banners_g[random]['arquivo']+"' alt='"+banners_g[random]['titulo']+"'></a>");
                            //3 Tamanho P
                            for(i=1; i<=3; i++){
                                if(banners_p.length <= 0){break;}
                                var random = getRandom(banners_p.length)-1;
                                $(div_template).find(".um-parceiro.col-xs-4").find(".logo-container[data-posicao='"+i+"']").html("<a href='"+banners_p[random]['url']+"' target='"+banners_p[random]['target']+"'><img src='"+DOMAIN+"imagens/"+banners_p[random]['arquivo']+"' alt='"+banners_p[random]['titulo']+"'>");                             
                                banners_p.splice(random,1);  
                            }                       
                        }else if(banners_template == 2){ //Formato 2x2
                            //4 Tamanho M
                            for(i=1; i<=4; i++){
                                if(banners_m.length <= 0){break;}                                
                                var random = getRandom(banners_m.length)-1;
                                $(div_template).find(".um-parceiro.col-xs-6").find(".logo-container[data-posicao='"+i+"']").html("<a href='"+banners_m[random]['url']+"' target='"+banners_m[random]['target']+"'><img src='"+DOMAIN+"imagens/"+banners_m[random]['arquivo']+"' alt='"+banners_m[random]['titulo']+"'>");                             
                                banners_m.splice(random,1);  
                            }                         
                        }else if(banners_template == 3){ //Formato 2x3
                            //2 Tamanho M
                            for(i=1; i<=2; i++){
                                if(banners_m.length <= 0){break;}                                
                                var random = getRandom(banners_m.length)-1;
                                $(div_template).find(".um-parceiro.col-xs-6").find(".logo-container[data-posicao='"+i+"']").html("<a href='"+banners_m[random]['url']+"' target='"+banners_m[random]['target']+"'><img src='"+DOMAIN+"imagens/"+banners_m[random]['arquivo']+"' alt='"+banners_m[random]['titulo']+"'>");                             
                                banners_m.splice(random,1);  
                            }     
                            //3 Tamanho P
                            for(i=1; i<=3; i++){
                                if(banners_p.length <= 0){break;}                                
                                var random = getRandom(banners_p.length)-1;
                                $(div_template).find(".um-parceiro.col-xs-4").find(".logo-container[data-posicao='"+i+"']").html("<a href='"+banners_p[random]['url']+"' target='"+banners_p[random]['target']+"'><img src='"+DOMAIN+"imagens/"+banners_p[random]['arquivo']+"' alt='"+banners_p[random]['titulo']+"'>");                             
                                banners_p.splice(random,1);  
                            } 
                        }else if(banners_template == 4){ //Formato 3x3
                            //6 Tamanho P
                            for(i=1; i<=6; i++){
                                if(banners_p.length <= 0){break;}                                
                                var random = getRandom(banners_p.length)-1;
                                $(div_template).find(".um-parceiro.col-xs-4").find(".logo-container[data-posicao='"+i+"']").html("<a href='"+banners_p[random]['url']+"' target='"+banners_p[random]['target']+"'><img src='"+DOMAIN+"imagens/"+banners_p[random]['arquivo']+"' alt='"+banners_p[random]['titulo']+"'>");                             
                                banners_p.splice(random,1);  
                            }                        
                        }else if(banners_template == 5){ //Formato 1x2
                            //1 Tamanho G
                            var random = getRandom(banners_g.length)-1;
                            $(div_template).find(".um-parceiro.col-xs-12").find(".logo-container[data-posicao='1']").html("<a href='"+banners_g[random]['url']+"' target='"+banners_g[random]['target']+"'><img src='"+DOMAIN+"imagens/"+banners_g[random]['arquivo']+"' alt='"+banners_g[random]['titulo']+"'></a>");
                            //2 Tamanho M
                            for(i=1; i<=2; i++){
                                if(banners_m.length <= 0){break;}                                
                                var random = getRandom(banners_m.length)-1;
                                $(div_template).find(".um-parceiro.col-xs-6").find(".logo-container[data-posicao='"+i+"']").html("<a href='"+banners_m[random]['url']+"' target='"+banners_m[random]['target']+"'><img src='"+DOMAIN+"imagens/"+banners_m[random]['arquivo']+"' alt='"+banners_m[random]['titulo']+"'>");                             
                                banners_m.splice(random,1);  
                            }                      
                        }  
                        $(".template").hide();    
                        $(div_template).show();
                    }
                    //,
                    //complete: function(){
                    //}
                });             
            };

            //Inicialização     
            $.ajax({
                url: DOMAIN + 'api',
                data:{
                    method: 'inicializacaoApp',
                    cache: Math.random()                     
                    //v: '2.0.0'
                },
                dataType: "json",
                success: function (data) {
                    categorias = data.categorias;
                    linhas = data.linhas;
                    modelos = data.modelos;
                    conceitos = data.conceitos;
                    $.each(categorias, function (i, item) {
                        $('#s-categoria').append($('<option>', { 
                            value: i,
                            text : item,
                            //class: 'ajax'
                        }));
                    });
                    $('#s-categoria').selectpicker('refresh');

                    $("#conceitoAssoalho .ruim").after(conceitos['Estado do Assoalho']['Ruim']);
                    $("#conceitoAssoalho .bom").after(conceitos['Estado do Assoalho']['Bom']);
                    $("#conceitoAssoalho .otimo").after(conceitos['Estado do Assoalho']['Ótimo']);

                    $("#conceitoCaixaDeCarga .ruim").after(conceitos['Estado da Caixa de Carga']['Ruim']);
                    $("#conceitoCaixaDeCarga .bom").after(conceitos['Estado da Caixa de Carga']['Bom']);
                    $("#conceitoCaixaDeCarga .otimo").after(conceitos['Estado da Caixa de Carga']['Ótimo']);                

                    $("#conceitoMecanica .ruim").after(conceitos['Estado da Mecanica']['Ruim']);
                    $("#conceitoMecanica .bom").after(conceitos['Estado da Mecanica']['Bom']);
                    $("#conceitoMecanica .otimo").after(conceitos['Estado da Mecanica']['Ótimo']);                 

                    $("#conceitoSistemaEletrico .ruim").after(conceitos['Estado do Sistema Eletrico']['Ruim']);
                    $("#conceitoSistemaEletrico .bom").after(conceitos['Estado do Sistema Eletrico']['Bom']);
                    $("#conceitoSistemaEletrico .otimo").after(conceitos['Estado do Sistema Eletrico']['Ótimo']);

                    $("#conceitoEstruturaChassi .ruim").after(conceitos['Estado da Estrutura do Chassi']['Ruim']);
                    $("#conceitoEstruturaChassi .bom").after(conceitos['Estado da Estrutura do Chassi']['Bom']);
                    $("#conceitoEstruturaChassi .otimo").after(conceitos['Estado da Estrutura do Chassi']['Ótimo']);                

                    $("#conceitoPintura .ruim").after(conceitos['Estado da Pintura']['Ruim']);
                    $("#conceitoPintura .bom").after(conceitos['Estado da Pintura']['Bom']);
                    $("#conceitoPintura .otimo").after(conceitos['Estado da Pintura']['Ótimo']); 

                    $("#conceitoGeral .ruim").after(conceitos['Estado Geral']['Ruim']);
                    $("#conceitoGeral .bom").after(conceitos['Estado Geral']['Bom']);
                    $("#conceitoGeral .otimo").after(conceitos['Estado Geral']['Ótimo']);       
                    //$("#s-comprimento").slider();  
                    atualizarBanners();


                    if(carregarUrl.carregado == false){
                      $("#s-categoria").val(carregarUrl.categoria).selectpicker('refresh').trigger('change');
                      $("#s-linha").val(carregarUrl.linha).selectpicker('refresh').trigger('change');
                      $("#s-uf").val(carregarUrl.uf).selectpicker('refresh').trigger('change');
                    }
                },
                complete: function(){                          
                    carregado();
                }
            });   

            var resetarCampo = function(campo){
                var btn = $('#s-'+campo).parent().find(".btn");
                $(btn).css({ backgroundColor: '#ffffff', border: 'none' });                     
                
                $('#s-'+campo+' option').remove();
                if(campo == 'assoalho'){
                    $('#s-'+campo).append('<option disabled selected value="">TIPO DE ASSOALHO</option>');                                
                }else if(campo == 'caixa_de_carga'){
                    $('#s-'+campo).append('<option disabled selected value="">TIPO DE CAIXA DE CARGA</option>'); 
                }else if(campo == 'numero-eixos'){
                    $('#s-'+campo).append('<option disabled selected value="">NÚMERO DE EIXOS</option>'); 
                }else if(campo == 'tipo-suspensao'){
                    $('#s-'+campo).append('<option disabled selected value="">TIPO DE SUSPENSÃO</option>'); 
                }else if(campo == 'distribuicao-eixos'){
                    $('#s-'+campo).append('<option disabled selected value="">DISTRIBUIÇÃO DOS EIXOS</option>'); 
                }else{
                    $('#s-'+campo).append('<option disabled selected value="">'+campo.toUpperCase()+'</option>');                
                }            
            }

            $("#s-categoria").change(function(){
                var idCategoria = $(this).find(":selected").val();
                $(".camposInteracao").show();
                $("#resultado").hide();

                resetarCampo('linha');
                resetarCampo('modelo');
                resetarCampo('tamanho');
                resetarCampo('marca');
                resetarCampo('ano');
                resetarCampo('assoalho');
                resetarCampo('caixa_de_carga');
                $('.radios input').iCheck('uncheck'); 

                var count = 0;
                $.each(linhas[idCategoria], function (i, item) {
                    $('#s-linha').append($('<option>', { 
                        value: item.id_linha,
                        text : item.linha,
                        //class: 'ajax'                    
                    }));
                    count++;
                });            
                if(count && linhas[idCategoria].length == 1){ 
                    $("#s-linha").prop("selectedIndex", 1).trigger("change"); 
                }

                $('#s-linha').selectpicker('refresh');  
                $('#s-modelo').selectpicker('refresh');  
                $('#s-tamanho').selectpicker('refresh');  
                $('#s-marca').selectpicker('refresh');  
                $('#s-ano').selectpicker('refresh'); 
                $('#s-assoalho').selectpicker('refresh'); 
                $('#s-caixa_de_carga').selectpicker('refresh'); 

                if(idCategoria == 5){                
                    $("#formulario").attr("data-categoria", 1); // Carrocerias 
                    $(".categoria02-campo").attr("data-ativo", 0).hide();                

                }else{                
                    $("#formulario").attr("data-categoria", 2); // Semireboques (Carretas), Reboques Simples (Julietas), Bitrem, Rodotrem, Superbitrem                
                    $(".categoria02-campo").attr("data-ativo", 1).show();   
                    $(".form-regua").hide().attr("data-ativo", 0);                                        
                    
                    resetarCampo('base');
                    resetarCampo('numero-eixos');
                    resetarCampo('tipo-suspensao');
                    resetarCampo('distribuicao-eixos');                    
                    resetarCampo('tamanho');    
                    $('#s-base').selectpicker('refresh');  
                    $('#s-numero-eixos').selectpicker('refresh');  
                    $('#s-tipo-suspensao').selectpicker('refresh');  
                    $('#s-distribuicao-eixos').selectpicker('refresh');  
                    $('#s-tamanho').selectpicker('refresh');  
                    
                    
                }
            });

            $("#s-linha").change(function(){
                var idCategoria = $("#s-categoria").find(":selected").val();
                var idLinha = $(this).find(":selected").val();
                $("#resultado").hide();
                resetarCampo('modelo');
                resetarCampo('tamanho');
                resetarCampo('marca');
                resetarCampo('ano');
                resetarCampo('assoalho');
                resetarCampo('caixa_de_carga'); 
                $('.radios input').iCheck('uncheck'); 
                
                if(idCategoria == 5){

                    var count = 0;
                    $.each(modelos[idLinha], function (i, item) {
                        $('#s-modelo').append($('<option>', { 
                            value: item.ids_modelo,
                            text : 'Modelo '+item.modelo,
                            //class: 'ajax'                    
                        }));
                        count++;
                    });  
                    if(count && modelos[idLinha].length == 1){ 
                        $("#s-modelo").prop("selectedIndex", 1).trigger("change");
                    }else
                    if(carregarUrl.carregado == false){
                        $('#s-modelo').val(carregarUrl.modelo).selectpicker('refresh').trigger("change");
                    }                                       
                    
                }else{
                    resetarCampo('base');
                    resetarCampo('numero-eixos');
                    resetarCampo('tipo-suspensao');
                    resetarCampo('distribuicao-eixos');
                    carregando();
                    $.ajax({
                        url: DOMAIN + 'api',
                        method: "POST",
                        data:{
                            method: 'getBases',
                            idLinha: idLinha,
                            cache: Math.random() 
                            //v: '2.0.0'
                        },
                        dataType: "json",
                        success: function (data) {
                            var bases = data.bases;
                            var count = 0;
                            $.each(bases, function (i, item) {
                                $('#s-base').append($('<option>', { 
                                    value: item.ids_modelo,
                                    text : "Base "+item.base,
                                    //class: 'ajax'                    
                                }));
                                count++;
                            });
                            $('#s-base').selectpicker('refresh');
                            if(count && bases.length == 1){ 
                                $("#s-base").prop("selectedIndex", 1).trigger("change");
                            }else
                            if(carregarUrl.carregado == false){
                                $('#s-base').val(carregarUrl.base).selectpicker('refresh').trigger("change");
                            }else{
                                carregado();    
                            }     

                        }
//                        ,
//                        complete: function(data){
//                            carregado();
//                        }
                    });                    
                    
                }
                $('#s-numero-eixos').selectpicker('refresh');
                $('#s-tipo-suspensao').selectpicker('refresh');
                $('#s-distribuicao-eixos').selectpicker('refresh');                
                $('#s-modelo').selectpicker('refresh');  
                $('#s-tamanho').selectpicker('refresh');  
                $('#s-marca').selectpicker('refresh');  
                $('#s-ano').selectpicker('refresh'); 
                $('#s-assoalho').selectpicker('refresh'); 
                $('#s-caixa_de_carga').selectpicker('refresh');             
            });

            $("#s-base").change(function(){
                var idsModelo = $(this).find(":selected").val();
                $("#resultado").hide();
                resetarCampo('numero-eixos');
                resetarCampo('tipo-suspensao');
                resetarCampo('distribuicao-eixos');                
                resetarCampo('modelo');
                resetarCampo('tamanho');
                resetarCampo('marca');
                resetarCampo('ano'); 
                resetarCampo('assoalho');
                resetarCampo('caixa_de_carga');
                $('.radios input').iCheck('uncheck');             
                carregando();
                    $.ajax({
                        url: DOMAIN + 'api',
                        method: "POST",
                        data:{
                            method: 'getNumeroEixos',
                            idsModelo: idsModelo,
                            cache: Math.random()
                            //v: '2.0.0'
                        },
                        dataType: "json",
                        success: function (data) {
                            var numeroEixos = data.numero_eixos;
                            var count = 0;
                            $.each(numeroEixos, function (i, item) {
                                $('#s-numero-eixos').append($('<option>', { 
                                    value: item,
                                    text : i,
                                    //class: 'ajax'                    
                                }));
                                count++;
                            });  
                            $('#s-numero-eixos').selectpicker('refresh');                            
                            if(count && Object.size(numeroEixos) == 1){ 
                                $("#s-numero-eixos").prop("selectedIndex", 1).trigger("change");
                            }else    
                            if(carregarUrl.carregado == false){
                                $('#s-numero-eixos').val(carregarUrl.numeroEixos).selectpicker('refresh').trigger("change");

                            }else{
                                carregado();                                
                            }                             

                        }
//                        ,
//                        complete: function(data){
//                            carregado();
//                        }
                    });                    
                    
                    $('#s-tipo-suspensao').selectpicker('refresh');
                    $('#s-distribuicao-eixos').selectpicker('refresh');                
                    $('#s-modelo').selectpicker('refresh');  
                    $('#s-tamanho').selectpicker('refresh');  
                    $('#s-marca').selectpicker('refresh');  
                    $('#s-ano').selectpicker('refresh'); 
                    $('#s-assoalho').selectpicker('refresh'); 
                    $('#s-caixa_de_carga').selectpicker('refresh'); 

            }); 

            $("#s-numero-eixos").change(function(){
                var idsModelo = $(this).find(":selected").val();
                $("#resultado").hide();
                resetarCampo('tipo-suspensao');
                resetarCampo('distribuicao-eixos');                
                resetarCampo('modelo');
                resetarCampo('tamanho');
                resetarCampo('marca');
                resetarCampo('ano'); 
                resetarCampo('assoalho');
                resetarCampo('caixa_de_carga');
                $('.radios input').iCheck('uncheck');             
                carregando();
                    $.ajax({
                        url: DOMAIN + 'api',
                        method: "POST",
                        data:{
                            method: 'getTiposSuspensao',
                            idsModelo: idsModelo,
                            cache: Math.random()
                            //v: '2.0.0'
                        },
                        dataType: "json",
                        success: function (data) {
                            var tiposSuspensao = data.tipos_suspensao;
                            var count = 0;
                            $.each(tiposSuspensao, function (i, item) {
                                $('#s-tipo-suspensao').append($('<option>', { 
                                    value: item,
                                    text : "Suspensão "+i,
                                    //class: 'ajax'                    
                                }));
                                count++;
                            });  
                            $('#s-tipo-suspensao').selectpicker('refresh');                            
                            if(count && Object.size(tiposSuspensao) == 1){ 
                                $("#s-tipo-suspensao").prop("selectedIndex", 1).trigger("change");
                            }else
                            if(carregarUrl.carregado == false){
                                $('#s-tipo-suspensao').val(carregarUrl.tipoSuspensao).selectpicker('refresh').trigger("change");
                            }else{
                                carregado();                                
                            }       

                        }
//                        ,
//                        complete: function(data){
//                            carregado();
//                        }
                    });                                        
                    $('#s-distribuicao-eixos').selectpicker('refresh');                
                    $('#s-modelo').selectpicker('refresh');  
                    $('#s-tamanho').selectpicker('refresh');  
                    $('#s-marca').selectpicker('refresh');  
                    $('#s-ano').selectpicker('refresh'); 
                    $('#s-assoalho').selectpicker('refresh'); 
                    $('#s-caixa_de_carga').selectpicker('refresh'); 

            });     
            
            $("#s-tipo-suspensao").change(function(){
                var idsModelo = $(this).find(":selected").val();
                $("#resultado").hide();
                resetarCampo('distribuicao-eixos');                
                resetarCampo('modelo');
                resetarCampo('tamanho');
                resetarCampo('marca');
                resetarCampo('ano'); 
                resetarCampo('assoalho');
                resetarCampo('caixa_de_carga');
                $('.radios input').iCheck('uncheck');             
                carregando();
                    $.ajax({
                        url: DOMAIN + 'api',
                        method: "POST",
                        data:{
                            method: 'getDistribuicaoEixos',
                            idsModelo: idsModelo,
                            cache: Math.random()
                            //v: '2.0.0'
                        },
                        dataType: "json",
                        success: function (data) {
                            var distribuicaoEixos = data.distribuicao_eixos;
                            var count = 0;
                            $.each(distribuicaoEixos, function (i, item) {
                                $('#s-distribuicao-eixos').append($('<option>', { 
                                    value: item,
                                    text : "Eixos "+i,
                                    //class: 'ajax'                    
                                }));
                                count++;
                            });  
                            $('#s-distribuicao-eixos').selectpicker('refresh');
                            if(count && Object.size(distribuicaoEixos) == 1){ 
                                $("#s-distribuicao-eixos").prop("selectedIndex", 1).trigger("change");
                            }else
                            if(carregarUrl.carregado == false){
                                $('#s-distribuicao-eixos').val(carregarUrl.distribuicaoEixos).selectpicker('refresh').trigger("change");
                            }else{
                                carregado();                                
                            }     
                                                  

                        }
//                        ,
//                        complete: function(data){
//                            carregado();
//                        }
                    });                                        
                    $('#s-modelo').selectpicker('refresh');  
                    $('#s-tamanho').selectpicker('refresh');  
                    $('#s-marca').selectpicker('refresh');  
                    $('#s-ano').selectpicker('refresh'); 
                    $('#s-assoalho').selectpicker('refresh'); 
                    $('#s-caixa_de_carga').selectpicker('refresh'); 

            });    
            
            
            $("#s-distribuicao-eixos").change(function(){
                var idLinha = $("#s-linha").find(":selected").val();
                var idsModelo = $(this).find(":selected").val();
                $("#resultado").hide();
                resetarCampo('modelo');
                resetarCampo('tamanho');
                resetarCampo('marca');
                resetarCampo('ano'); 
                resetarCampo('assoalho');
                resetarCampo('caixa_de_carga');
                $('.radios input').iCheck('uncheck');             
                carregando();
                    $.ajax({
                        url: DOMAIN + 'api',
                        method: "POST",
                        data:{
                            method: 'getModelos',
                            idLinha: idLinha,
                            idsModelo: idsModelo,
                            cache: Math.random()                            
                            //v: '2.0.0'
                        },
                        dataType: "json",
                        success: function (data) {
                            var modelos2 = data.modelos;
                            var count = 0;
                            $.each(modelos2, function (i, item) {
                                $('#s-modelo').append($('<option>', { 
                                    value: item.ids_modelo,
                                    text : 'Modelo '+item.modelo,
                                    //class: 'ajax'                    
                                }));
                                count++;
                            });  
                            $('#s-modelo').selectpicker('refresh');                            
                            if(count && Object.size(modelos2) == 1){ 
                                $("#s-modelo").prop("selectedIndex", 1).trigger("change");
                            }else
                            if(carregarUrl.carregado == false){
                                $('#s-modelo').val(carregarUrl.modelo).selectpicker('refresh').trigger("change");
                            }else{
                                carregado();                                
                            }                             

                        }
//                        ,
//                        complete: function(data){
//                            carregado();
//                        }
                    });                                        
                    $('#s-tamanho').selectpicker('refresh');  
                    $('#s-marca').selectpicker('refresh');  
                    $('#s-ano').selectpicker('refresh'); 
                    $('#s-assoalho').selectpicker('refresh'); 
                    $('#s-caixa_de_carga').selectpicker('refresh'); 
            });             
            
            $("#s-modelo").change(function(){
                var formCategoria = $("#formulario").attr("data-categoria");                
                var idsModelo = $(this).find(":selected").val();                
                $("#resultado").hide();
                resetarCampo('tamanho');
                resetarCampo('marca');
                resetarCampo('ano'); 
                resetarCampo('assoalho');
                resetarCampo('caixa_de_carga');
                $('.radios input').iCheck('uncheck');
                
                if(formCategoria == 1){
                    
                    carregando();
                    $.ajax({
                        url: DOMAIN + 'api',
                        method: "POST",
                        data:{
                            method: 'getMarcas',
                            idsModelo: idsModelo,
                            cache: Math.random()
                            //v: '2.0.0'
                        },
                        dataType: "json",
                        success: function (data) {
                            marcas = data.marcas;
                            
                            var count = 0;
                            $.each(marcas, function (i, item) {
                                $('#s-marca').append($('<option>', { 
                                    value: item.id_modelo+';'+item.id_marca,   
                                    text : item.marca,      
                                    //class: 'ajax'
                                }));   
                                count++;
                            });   
                            $('#s-marca').selectpicker('refresh'); 
                            $('#s-marca').attr("data-modeloatual", 0);
                            
                            if(count && Object.size(marcas) == 1){ 
                                $("#s-marca").prop("selectedIndex", 1).trigger("change"); 
                            }else
                            if(carregarUrl.carregado == false){
                                $('#s-marca').val(carregarUrl.marca).selectpicker('refresh').trigger("change");
                            }else{
                                carregado();                                
                            }                      

                        }
//                        ,
//                        complete: function(data){
//                            carregado();
//                        }
                    });
                    
                }else if(formCategoria == 2){
                  
                    $("#container-tamanho").hide().attr("data-ativo", "0"); 
                    carregando();
                    $.ajax({
                        url: DOMAIN + 'api',
                        method: "POST",
                        data:{
                            method: 'getTamanhos',
                            idsModelo: idsModelo,
                            cache: Math.random()                            
                            //v: '2.0.0'
                        },
                        dataType: "json",
                        success: function (data) {
                            tamanhos = data.tamanhos;
                            var count = 0;
                            $.each(tamanhos, function (i, item) {
                                $('#s-tamanho').append($('<option>', { 
                                    value: item,
                                    text : i,    
                                    //class: 'ajax'
                                }));   
                                if(i != 'Tamanho unico'){  
                                    $("#container-tamanho").show().attr("data-ativo", "1");
                                }
                                count++;
                            });   
                            $('#s-tamanho').selectpicker('refresh'); 
                            $('#s-marca').selectpicker('refresh');                              
                            if(count && Object.size(tamanhos) == 1){ 
                                $("#s-tamanho").prop("selectedIndex", 1).trigger("change"); 
                            }else    
                            if(carregarUrl.carregado == false){
                                  $('#s-tamanho').val(carregarUrl.tamanho).selectpicker('refresh').trigger("change");                          
                            }else{
                                carregado();                                                           
                            }  

                        }
//                        ,
//                        complete: function(data){
//                            $('#s-marca').selectpicker('refresh');  
//                            carregado();
//                        }
                    });                    
                    
                }
                $('#s-ano').selectpicker('refresh'); 
                $('#s-assoalho').selectpicker('refresh'); 
                $('#s-caixa_de_carga').selectpicker('refresh'); 
            });      
            
            $("#s-tamanho").change(function(){
                var idsModelo = $(this).find(":selected").val();                
                $("#resultado").hide();
                resetarCampo('marca');
                resetarCampo('ano'); 
                resetarCampo('assoalho');
                resetarCampo('caixa_de_carga');
                $('.radios input').iCheck('uncheck');                
                    
                carregando();
                $.ajax({
                    url: DOMAIN + 'api',
                    method: "POST",
                    data:{
                        method: 'getMarcas',
                        idsModelo: idsModelo,
                        cache: Math.random()                        
                        //v: '2.0.0'
                    },
                    dataType: "json",
                    success: function (data) {                        
                        marcas = data.marcas;
                        var count = 0;
                        $.each(marcas, function (i, item) {
                            $('#s-marca').append($('<option>', { 
                                value: item.id_modelo+';'+item.id_marca,   
                                text : item.marca,      
                                //class: 'ajax'
                            }));   
                            count++;
                        });   
                        $('#s-marca').selectpicker('refresh');   
                        $('#s-marca').attr("data-modeloatual", 0);
                        
                        if(count && Object.size(marcas) == 1){ 
                            $("#s-marca").prop("selectedIndex", 1).trigger("change"); 
                        }else    
                        if(carregarUrl.carregado == false){
                            $('#s-marca').val(carregarUrl.marca).selectpicker('refresh').trigger("change");
                        }else{
                            carregado();                            
                        }                      

                    }
//                    ,
//                    complete: function(data){
//                        carregado();
//                    }
                });

                $('#s-ano').selectpicker('refresh'); 
                $('#s-assoalho').selectpicker('refresh'); 
                $('#s-caixa_de_carga').selectpicker('refresh'); 
            });            
            
            $("#s-marca").change(function(){
                $("#resultado").hide();      
                var formCategoria = $("#formulario").attr("data-categoria");                                
                var idModelo = $(this).find(":selected").val();
                idModelo = idModelo.split(";");                 
                idModelo = idModelo[0];                 
                var ultimoModelo = $(this).attr('data-modeloatual');  
              
                
                if(idModelo != ultimoModelo){
                    resetarCampo('ano'); 
                    resetarCampo('assoalho');
                    resetarCampo('caixa_de_carga');
                    $('.radios input').iCheck('uncheck');             
                    carregando();
                    $.ajax({
                        url: DOMAIN + 'api',
                        method: "POST",
                        data:{
                            method: 'getModeloInfos',
                            idModelo: idModelo,
                            cache: Math.random()                        
                            //v: '2.0.0'
                        },
                        dataType: "json",
                        success: function (data) {
                            anos = data.anos;
                            assoalhos = data.assoalhos;
                            caixas_de_carga = data.caixas_de_carga;
                            unidade_de_medida = data.unidade_de_medida;
                            pintura = data.pintura;
                            mecanica = data.mecanica;
                            sistema_eletrico = data.sistema_eletrico;
                            estrutura_chassi = data.estrutura_chassi;

                            var count = 0;
                            $.each(anos, function (i, item) {
                                if(item == ANO_ATUAL){
                                    var item_text = item+" Usado";                                 
                                }else{ 
                                    var item_text = item; 
                                }
                                $('#s-ano').append($('<option>', { 
                                    value: item,  
                                    text : item_text,  
                                    //class: 'ajax '
                                }));
                                count++;
                            });  
                            if(count && anos.length == 1){ 
                                $("#s-ano").prop("selectedIndex", 1); 
                            }                      
                            $('#s-ano').selectpicker('refresh');
                            if(carregarUrl.carregado == false){
                                 $('#s-ano').val(carregarUrl.ano).selectpicker('refresh').trigger("change");
                            }                                            

                            if(assoalhos){
                                $("#container-assoalho").show();    
                                $("#s-assoalho").attr("data-ativo", 1);
                                $("#container-estado-assoalho").show();    
                                $("#container-estado-assoalho").attr("data-ativo", 1);
                                var count = 0;
                                $.each(assoalhos, function (i, item) {
                                    $('#s-assoalho').append($('<option>', { 
                                        value: item,
                                        text : item,
                                        //class: 'ajax'
                                    }));
                                    count++;
                                }); 
//                                if(count && assoalhos.length == 1){ 
//                                    $("#s-assoalho").prop("selectedIndex", 1); 
//                                }                          
                                $('#s-assoalho').selectpicker('refresh'); 
                                if(carregarUrl.carregado == false){
                                     $('#s-assoalho').val(carregarUrl.assoalho).selectpicker('refresh').trigger("change");
                                }                                 
                            }else{
                                $("#container-assoalho").hide();    
                                $("#s-assoalho").attr("data-ativo", 0);
                                $("#container-estado-assoalho").hide();    
                                $("#container-estado-assoalho").attr("data-ativo", 0);
                            } 
                            if(caixas_de_carga){
                                $("#container-caixa-de-carga").show();    
                                $("#s-caixa_de_carga").attr("data-ativo", 1);
                                var count = 0;
                                $.each(caixas_de_carga, function (i, item) {
                                    $('#s-caixa_de_carga').append($('<option>', { 
                                        value: item,
                                        text : item,
                                        //class: 'ajax'
                                    }));
                                    count++;
                                });  
//                                if(count && caixas_de_carga.length == 1){ 
//                                    $("#s-caixa_de_carga").prop("selectedIndex", 1); 
//                                }                           
                                $('#s-caixa_de_carga').selectpicker('refresh');

                                $("#container-estado-caixa-de-carga").show();    
                                $("#container-estado-caixa-de-carga").attr("data-ativo", 1);      
                                
                                if(carregarUrl.carregado == false){
                                     $('#s-caixa_de_carga').val(carregarUrl.caixaDeCarga).selectpicker('refresh').trigger("change");
                                } 

                            }else{
                                $("#container-caixa-de-carga").hide();    
                                $("#s-caixa_de_carga").attr("data-ativo", 0);

                                $("#container-estado-caixa-de-carga").hide();    
                                $("#container-estado-caixa-de-carga").attr("data-ativo", 0);                            
                            }  
                            if(pintura){
                                $("#container-estado-pintura").show().attr("data-ativo", 1);    
                            }else{
                                $("#container-estado-pintura .radios input").iCheck('uncheck'); 
                                $("#container-estado-pintura").hide().attr("data-ativo", 0);                           
                            }
                            if(mecanica){
                                $("#container-estado-mecanica").show().attr("data-ativo", 1);    
                            }else{
                                $("#container-estado-mecanica .radios input").iCheck('uncheck'); 
                                $("#container-estado-mecanica").hide().attr("data-ativo", 0);                           
                            }
                            if(sistema_eletrico){
                                $("#container-estado-sistema-eletrico").show().attr("data-ativo", 1);    
                            }else{
                                $("#container-estado-sistema-eletrico .radios input").iCheck('uncheck'); 
                                $("#container-estado-sistema-eletrico").hide().attr("data-ativo", 0);                           
                            }
                            if(estrutura_chassi){
                                $("#container-estado-estrutura-chassi").show().attr("data-ativo", 1);    
                            }else{
                                $("#container-estado-estrutura-chassi .radios input").iCheck('uncheck'); 
                                $("#container-estado-estrutura-chassi").hide().attr("data-ativo", 0);                           
                            }               

                            
                            if(formCategoria == 1){                            
                                $(".form-regua").show().attr("data-ativo", 1);  
                                var legenda = $(".legenda-comp").html();
                                if(legenda == "COMPRIMENTO"){
                                    $("#s-comprimento").slider('destroy');                            
                                }
                                if(unidade_de_medida == 'm'){
                                    $(".legenda-comp").html("COMPRIMENTO").css("margin", "12px 0 40px 0");
                                    $(".medidas-area").html("<input id='s-comprimento' name='comprimento' data-slider-id='ex1Slider' type='text'/>");
                                    $("#s-comprimento").slider({
                                        tooltip: 'always',
                                        min: 3,
                                        max: 15,
                                        step: 0.1,
                                        value: 5,  
                                        formatter: function(value) {
                                            return value + 'm';
                                        }            
                                    }).attr("data-unidade", "m"); 
                                }else if(unidade_de_medida == 'l'){
                                    $(".legenda-comp").html("CAPACIDADE").css("margin", "12px 0 8px 0");  
                                    $(".medidas-area").html("<select id='s-comprimento' name='comprimento' class='selectpicker'>");
                                    $("#s-comprimento").append('<option disabled selected value="">SELECIONE</option>')
                                    for(var i=3;i<=30;i+=1){
                                        $("#s-comprimento").append('<option value="'+i+'">'+i*1000+' litros</option>');
                                    }                             
                                    $("#s-comprimento").attr("data-unidade", "l");
                                    $('#s-comprimento').selectpicker('refresh');
                                }else if(unidade_de_medida == 'm3'){
                                    $(".legenda-comp").html("CAPACIDADE").css("margin", "12px 0 8px 0");     
                                    $(".medidas-area").html("<select id='s-comprimento' name='comprimento' class='selectpicker'>");
                                    $("#s-comprimento").append('<option disabled selected value="">SELECIONE</option>')                                    
                                    for(var i=2;i<=40;i+=1){
                                        $("#s-comprimento").append('<option value="'+i+'">'+i+' m³</option>');
                                    }                             
                                    $("#s-comprimento").attr("data-unidade", "m3");   
                                    $('#s-comprimento').selectpicker('refresh');                            
                                }
                            }else if(formCategoria == 2){
                                $(".form-regua").hide().attr("data-ativo", 0);    
                            }

                            if(carregarUrl.carregado == false){
	                            if(carregarUrl.estadoAssoalho){
	                            	$("input[name='estado_assoalho'][value=" + carregarUrl.estadoAssoalho + "]").attr('checked', 'checked');
	                            	$("input[name='estado_assoalho']").iCheck('update');
	                            } 
	                            if(carregarUrl.estadoCaixaDeCarga){
	                            	$("input[name='estado_caixa_de_carga'][value=" + carregarUrl.estadoCaixaDeCarga + "]").attr('checked', 'checked');
	                            	$("input[name='estado_caixa_de_carga']").iCheck('update');	                            
	                            } 
	                            if(carregarUrl.estadoMecanica){
	                            	$("input[name='estado_mecanica'][value=" + carregarUrl.estadoMecanica + "]").attr('checked', 'checked');
	                            	$("input[name='estado_mecanica']").iCheck('update');		                            
	                            } 
	                            if(carregarUrl.estadoSistemaEletrico){
	                            	$("input[name='estado_sistema_eletrico'][value=" + carregarUrl.estadoSistemaEletrico + "]").attr('checked', 'checked');
	                            	$("input[name='estado_sistema_eletrico']").iCheck('update');		                            
	                            } 
	                            if(carregarUrl.estadoEstruturaChassi){
	                            	$("input[name='estado_estrutura_chassi'][value=" + carregarUrl.estadoEstruturaChassi + "]").attr('checked', 'checked');
	                            	$("input[name='estado_estrutura_chassi']").iCheck('update');		                            
	                            } 
	                            if(carregarUrl.pintura){
	                            	$("input[name='pintura'][value=" + carregarUrl.pintura + "]").attr('checked', 'checked');
	                            	$("input[name='pintura']").iCheck('update');		                            
	                            } 
	                            if(carregarUrl.estadoVeiculo){
	                            	$("input[name='estado_veiculo'][value=" + carregarUrl.estadoVeiculo + "]").attr('checked', 'checked');
	                            	$("input[name='estado_veiculo']").iCheck('update');	                            
	                            } 
	                            if(carregarUrl.comprimento){
				                      $("#s-comprimento").val(carregarUrl.comprimento).selectpicker('refresh').trigger('change');
	                                  $("#s-comprimento").slider('setValue', carregarUrl.comprimento);
	                                  //$("#s-comprimento").slider('refresh'); 	
	                            } 
	                            $("#pesquisar").trigger("click");
	                            carregarUrl.carregado = true;
                            }                         	

                        }
                        ,
                        complete: function(data){
                            carregado();
                        }
                    });
                }else{
                    carregado();
                }
                $(this).attr("data-modeloatual", idModelo);
            });            

            $("#pesquisar").click(function( event ){
                event.preventDefault();
                $(this).addClass("clicado");
                $("#formulario .alert").hide();

                //validação dos campos AQUI, se validar executa o IF abaixo
                var validado = 1;
                var camposErro = "";
                if(document.getElementById('s-categoria').value == ""){
                    camposErro = camposErro+"Categoria<br/>";
                    validado=0;
                }             
                if(document.getElementById('s-linha').value == ""){
                    camposErro = camposErro+"Linha<br/>";
                    validado=0;
                }
                if($('#container-base').attr('data-ativo') == 1){
                    if(document.getElementById('s-base').value == ""){
                        camposErro = camposErro+"Base<br/>";
                        validado=0;
                    }
                }
                if($('#container-numero-eixos').attr('data-ativo') == 1){
                    if(document.getElementById('s-numero-eixos').value == ""){
                        camposErro = camposErro+"Número de Eixos<br/>";
                        validado=0;
                    }
                }
                if($('#container-tipo-suspensao').attr('data-ativo') == 1){
                    if(document.getElementById('s-tipo-suspensao').value == ""){
                        camposErro = camposErro+"Tipo de Suspensão<br/>";
                        validado=0;
                    }
                }
                if($('#container-distribuicao-eixos').attr('data-ativo') == 1){
                    if(document.getElementById('s-distribuicao-eixos').value == ""){
                        camposErro = camposErro+"Distribuição dos Eixos<br/>";
                        validado=0;
                    }
                }
                if(document.getElementById('s-modelo').value == ""){
                    camposErro = camposErro+"Modelo<br/>";
                    validado=0;
                } 
                if($('#container-tamanho').attr('data-ativo') == 1){
                    if(document.getElementById('s-tamanho').value == ""){
                        camposErro = camposErro+"Tamanho<br/>";
                        validado=0;
                    }
                }
                if(document.getElementById('s-marca').value == ""){
                    camposErro = camposErro+"Marca<br/>";
                    validado=0;
                } 
                if(document.getElementById('s-ano').value == ""){
                    camposErro = camposErro+"Ano<br/>";
                    validado=0;
                } 
                if(document.getElementById('s-uf').value == ""){
                    camposErro = camposErro+"Unidade da Federação<br/>";
                    validado=0;
                }
                if($('#s-assoalho').attr('data-ativo') == 1){
                    if(document.getElementById('s-assoalho').value == ""){
                        camposErro = camposErro+"Tipo de Assoalho<br/>";
                        validado=0;
                    }
                }
                if($('#s-caixa_de_carga').attr('data-ativo') == 1){    
                    if(document.getElementById('s-caixa_de_carga').value == ""){
                        camposErro = camposErro+"Tipo de Caixa de Carga<br/>";
                        validado=0;
                    }
                }            

                if($('#container-estado-assoalho').attr('data-ativo') == 1){    
                    if(!validarRadio("estado_assoalho")){
                        camposErro = camposErro+"Estado do Assoalho<br/>";
                        validado=0;                
                    }
                }
                if($('#container-estado-caixa-de-carga').attr('data-ativo') == 1){ 
                    if(!validarRadio("estado_caixa_de_carga")){
                        camposErro = camposErro+"Estado da Caixa de Carga<br/>";
                        validado=0;                
                    }
                }
                if($('#container-estado-mecanica').attr('data-ativo') == 1){ 
                    if(!validarRadio("estado_mecanica")){
                        camposErro = camposErro+"Estado da Mecânica<br/>";
                        validado=0;                
                    }             
                }
                if($('#container-estado-sistema-eletrico').attr('data-ativo') == 1){ 
                    if(!validarRadio("estado_sistema_eletrico")){
                        camposErro = camposErro+"Estado do Sistema Elétrico<br/>";
                        validado=0;                
                    }             
                }
                if($('#container-estado-estrutura-chassi').attr('data-ativo') == 1){ 
                    if(!validarRadio("estado_estrutura_chassi")){
                        camposErro = camposErro+"Estado da Estrutura do Chassi<br/>";
                        validado=0;                
                    }             
                }
                if($('#container-estado-pintura').attr('data-ativo') == 1){ 
                    if(!validarRadio("pintura")){
                        camposErro = camposErro+"Estado da Pintura<br/>";
                        validado=0;                
                    }             
                }
                if($('#container-estado-geral').attr('data-ativo') == 1){ 
                    if(!validarRadio("estado_veiculo")){
                        camposErro = camposErro+"Estado Geral<br/>";
                        validado=0;                
                    }            
                }

                if(validado){            
                    if(localStorage.getItem("nome") != null || NECESSITA_FB == false){
                        atualizarBanners();
                        Resultado();
                    }else{
                        if(WEB){
                            $("#mask-overlay, #modal").show();                    
                        }else{
                            facebookConnectPlugin.login(
                                ["public_profile"], 
                                function(r){
                                    checkLoginState(r);
                                },
                                function(){
                                    alert('Erro ao fazer login no Facebook. Por favor, tente novamente.');
                                }
                            )
                        }
                    }
                }else{
                    $("#formulario").prepend("<div class='alert alert-danger'><strong>Erro! Faltou selecionar o(s) seguinte(s) campo(s):</strong>"+camposErro+"</div>");  
                    var deslocamento = $("#formulario").offset().top;
                    $('html, body').animate({scrollTop:deslocamento}, 'slow');   
                }
            });   

            $('.radios input').each(function(){
                var self = $(this),
                  label = self.next(),
                  label_text = label.text();

                label.remove();
                self.iCheck({
                  checkboxClass: 'icheckbox_line-grey',
                  radioClass: 'iradio_line-grey',
                  insert: '<div class="icheck_line-icon"></div>' + label_text
                });
            });
            
            $("#enviarEmail").click(function(){
                $("#modal02 #form-sucesso, #modal02 #form-erro").hide();
                $("#modal02 #enviarPesquisa").show();                    
                $("#modal02 #enviarPesquisa input[name='destinatario']").val("");                    
                $("#modal02 #enviarPesquisa input[name='assunto']").val("");                    
                $("#mask-overlay, #modal02").show();                    
            });

            $("#copiarUrl").click(function(){
                $("#modal03 input[name='url']").val(DOMAIN+'consultar/?'+$("#formulario").serialize());                    
                $("#mask-overlay, #modal03").show();                    
            });     

            $("#urlClipboard").click(function(){
      			  var copyText = document.getElementById("urlGerada");
      			  copyText.select();
      			  document.execCommand("Copy");
             	 $("#modal03 #form-sucesso").show();
             	 $("#modal03 #aviso").hide();
            });                    

            $("#mask-overlay, #close-modal").click(function(){
                $("#mask-overlay, #modal").hide();    
            }); 
            
            $("#mask-overlay, #close-modal02").click(function(){
                $("#mask-overlay, #modal02").hide();    
            });   

            $("#mask-overlay, #close-modal03").click(function(){
                $("#mask-overlay, #modal03").hide();    
            });                         
           
            $("#formulario, .iCheck-helper").click(function(){
                $("#resultado").hide(); 
            });

            $(".limpar").click(function(){              
               carregando();    
               $("#resultado").hide();    
               $(".camposInteracao").hide(); 
               $("#resultado .tabela .tabela-col-right").html(""); 

               $('#s-categoria').val("");  
               resetarCampo('linha');
               resetarCampo('base');
               resetarCampo('numero-eixos');
               resetarCampo('tipo-suspensao');
               resetarCampo('distribuicao-eixos');                
               resetarCampo('modelo');
               resetarCampo('tamanho');
               resetarCampo('marca');
               resetarCampo('ano');
               resetarCampo('assoalho');
               resetarCampo('caixa_de_carga');                        

               $('#s-categoria').selectpicker('refresh');  
               $('#s-linha').selectpicker('refresh');  
               $('#s-base').selectpicker('refresh');  
               $('#s-numero-eixos').selectpicker('refresh');  
               $('#s-tipo-suspensao').selectpicker('refresh');  
               $('#s-distribuicao-eixos').selectpicker('refresh');  
               $('#s-tamanho').selectpicker('refresh');  
               $('#s-modelo').selectpicker('refresh');  
               $('#s-marca').selectpicker('refresh');  
               $('#s-ano').selectpicker('refresh'); 
               $('#s-assoalho').selectpicker('refresh'); 
               $('#s-caixa_de_carga').selectpicker('refresh');

               $('.radios input').iCheck('uncheck');              

               var deslocamento = $("body").offset().top;
               $('html, body').animate({scrollTop:deslocamento}, 'slow');               
               atualizarBanners(); 
               setTimeout(function(){
                   carregado();   
               },1000);    
            });
            
            $("#enviarPesquisa").submit(function(event){
                event.preventDefault();
                carregando();
                var remetente = $("#modal02 input[name='remetente']").val();
                var destinatario = $("#modal02 input[name='destinatario']").val();
                var assunto = $("#modal02 input[name='assunto']").val();
                var pesquisa = $("#resultado .tabela").html();
                var nome = localStorage.getItem("nome");

                $.ajax({
                    url: DOMAIN + 'api',
                    method: "POST",
                    //dataType: "json",
                    data:{
                        method: 'doEnvio',
                        nome: nome,
                        remetente: remetente,
                        destinatario: destinatario,
                        assunto: assunto,
                        pesquisa: pesquisa,
                        cache: Math.random()                                                
                    },
                    success: function (data){        
                        $("#modal02 #enviarPesquisa, #modal02 #form-erro").hide();
                        $("#modal02 #form-sucesso").show();                        
                    },
                    error: function (e1,e2,e3){
                        $("#modal02 #enviarPesquisa, #modal02 #form-sucesso").hide();
                        $("#modal02 #form-erro").show();                        
                    },
                    complete: function(){
                        carregado();
                    }                    
                });
            });        
            
            $(document).on('change', 'select.selectpicker', function(){
                var campo = $(this).parent().find(".btn");
                if($(this).val() == ""){
                    $(campo).css({ backgroundColor: '#ffffff', border: 'none' });                     
                }else{
                    $(campo).css({ backgroundColor: '#dbefd4', border: '1px solid #b2d299' });                     
                }                    
            });            
            
            
            var notMobile = window.matchMedia("only screen and (min-width: 992px)");
            if (notMobile.matches){                
                $(".info").mouseenter(function(){      
                    $(this).next().fadeIn(300);
                });        
                $(".conceito").mouseleave(function(){      
                    $(this).fadeOut(300);
                });
            }else{
                $(".info").click(function(){     
                    $("#mask-transparent").show();
                    $(this).next().fadeIn(300);
                });        
                $(".conceito .fechar, #mask-transparent").click(function(){      
                    $(".conceito, #mask-transparent").fadeOut(300);
                });            
            } 
        });      
        </script>        
     
        <div id="loading"></div>
        <div id="mask-overlay"></div>
        <div id="mask-transparent"></div>
        <div id="modal">
            <div id="close-modal"></div>
            <div class="content-modal">
                <span>Faça login com o Facebook:</span><br>
                <div class="fb-login-button" scope="public_profile,email" onlogin="checkLoginState();" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>          
                <br>Você só irá fazer login uma vez!                                                                   
            </div>
        </div>
        <div id="modal02">
            <div id="close-modal02"></div>
            <div class="content-modal02"> 
                <form id="enviarPesquisa">
                    <label for="remetente">De:</label>
                    <input type="email" name="remetente" placeholder="Seu e-mail" required>
                    <label for="destinatario">Para:</label>
                    <input type="email" name="destinatario" placeholder="E-mail do destinatário" required>
                    <label for="assunto">Assunto:</label>
                    <input type="text" name="assunto" placeholder="Assunto da mensagem"> 
                    <input type="submit" value="Enviar Avaliação por E-mail">    
                </form>
                <div id="form-sucesso">
                    <span>Pronto! </span>A avaliação foi enviada com sucesso.    
                </div> 
                <div id="form-erro">
                    Ocorreu um erro no envio da avaliação.<br>Por favor, tente novamente.
                </div>             
            </div>
        </div>     
        <div id="modal03">
            <div id="close-modal03"></div>
            <div class="content-modal03"> 
              <div id="aviso">
                  <span>Copie a URL abaixo para compartilhar o resultado da avaliação!</span>    
              </div>              	
              <div id="form-sucesso">
                  <span><b>Pronto!</b><br>URL copiada para sua área de transferência.</span>    
              </div>               
              <input type="text" name="url" id="urlGerada" value="http://www.google.com.br" readonly=""> 
              <button id="urlClipboard">COPIAR URL</button>
            </div>
        </div>            
        <header id="header">
            <img src="css/images/logo.png" class="hidden-xs limpar" alt="Shoptrans avaliação de implementos rodoviários usados">
            <img src="css/images/logo-mob.png" class="visible-xs-inline limpar" alt="Shoptrans avaliação de implementos rodoviários usados">
<!--            <span class="marca">TABELA</span>-->
            <h1>AVALIAÇÃO DE IMPLEMENTOS<br class="visible-xs-block"> RODOVIÁRIOS USADOS</h1>
        </header>        
        <div id="body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <p class="preencha">Preencha os campos abaixo com as <br class="visible-xs-inline">informações do implemento rodoviário:</p>
                        <form action="" id="formulario" data-categoria="">
                            <select name="categoria" id="s-categoria" class="selectpicker">
                                <option disabled selected value="">CATEGORIA</option>    
                            </select>
                            
                            <select name="linha" id="s-linha" class="selectpicker">
                                <option disabled selected value="">LINHA</option>    
                            </select>                             
                            
                            <div id="container-base" class="categoria02-campo" data-ativo="0">
                                <select name="base" id="s-base" class="selectpicker">
                                    <option disabled selected value="">BASE</option>    
                                </select>
                            </div>
                            
                            <div id="container-numero-eixos" class="categoria02-campo" data-ativo="0">
                                <select name="numero-eixos" id="s-numero-eixos" class="selectpicker">
                                    <option disabled selected value="">NÚMERO DE EIXOS</option>    
                                </select>
                            </div> 
                            
                            <div id="container-tipo-suspensao" class="categoria02-campo" data-ativo="0">
                                <select name="tipo-suspensao" id="s-tipo-suspensao" class="selectpicker">
                                    <option disabled selected value="">TIPO DE SUSPENSÃO</option>    
                                </select>
                            </div> 
                            
                            <div id="container-distribuicao-eixos" class="categoria02-campo" data-ativo="0">
                                <select name="distribuicao-eixos" id="s-distribuicao-eixos" class="selectpicker">
                                    <option disabled selected value="">DISTRIBUIÇÃO DOS EIXOS</option>    
                                </select>
                            </div>                                                                                  
                            
                            <select name="modelo" id="s-modelo" class="selectpicker">
                                <option disabled selected value="">MODELO</option>   
                            </select>
                            
                            <div id="container-tamanho" class="categoria02-campo" data-ativo="0">
                                <select name="tamanho" id="s-tamanho" class="selectpicker">
                                    <option disabled selected value="">TAMANHO / CAPACIDADE</option>    
                                </select>
                            </div>
                                                                                    
                            <select name="marca" id="s-marca" class="selectpicker" data-modeloatual="0">
                                <option disabled selected value="">MARCA</option>    
                            </select>                             
                            
                            <div class="camposInteracao">
                                <div id="container-caixa-de-carga">
                                    <select name="caixa_de_carga" id="s-caixa_de_carga" class="selectpicker" data-ativo="1">
                                        <option disabled selected value="">TIPO DE CAIXA DE CARGA</option>                                
                                    </select>                                      
                                </div>                              
                            </div>                            
                            
                            <select name="ano" id="s-ano" class="selectpicker">
                                <option disabled selected value="">ANO</option>                                
                            </select>                                        
                            
                            <div class="camposInteracao">
                                <select name="uf" id="s-uf" class="selectpicker">
                                    <option disabled selected value="">UNIDADE DA FEDERAÇÃO</option>
                                    <option value="50">Zona Franca</option>                                     
                                    <option value="23">Acre</option>
                                    <option value="24">Alagoas</option>
                                    <option value="25">Amapá</option>
                                    <option value="26">Amazonas</option>
                                    <option value="27">Bahia</option>
                                    <option value="28">Ceará</option>
                                    <option value="29">Distrito Federal</option>
                                    <option value="30">Espírito Santo</option>
                                    <option value="31">Goiás</option>
                                    <option value="32">Maranhão</option>
                                    <option value="33">Mato Grosso</option>
                                    <option value="34">Mato Grosso do Sul</option>
                                    <option value="35">Minas Gerais</option>
                                    <option value="36">Pará</option>
                                    <option value="37">Paraíba</option>
                                    <option value="38">Paraná</option>
                                    <option value="39">Pernambuco</option>
                                    <option value="40">Piauí</option>
                                    <option value="41">Rio de Janeiro</option>
                                    <option value="42">Rio Grande do Norte</option>
                                    <option value="43">Rio Grande do Sul</option>
                                    <option value="44">Rondônia</option>
                                    <option value="45">Roraima</option>
                                    <option value="46">Santa Catarina</option>
                                    <option value="47">São Paulo</option>
                                    <option value="48">Sergipe</option>
                                    <option value="49">Tocantins</option> 
                                </select>  
                                
                                <div id="container-assoalho">    
                                    <select name="assoalho" id="s-assoalho" class="selectpicker" data-ativo="1">
                                        <option disabled selected value="">TIPO DE ASSOALHO</option>                                
                                    </select>                    
                                </div>                                                                                                         
                                
                                <div id="container-estado-assoalho" data-ativo="1">                                                                                                                                                  
                                    <span class="legenda">ESTADO DO ASSOALHO <img src="css/images/info.png" alt="O que é estado do assoalho?" class="info" id="infoAssoalho">
                                        <div class="conceito" id="conceitoAssoalho">                                        
                                            <div class="area-texto">                
                                                <span class="fechar">X</span>                            
                                                <p class="oque">O QUE É CONSIDERADO</p>
                                                <p class="conc ruim">RUIM:</p>
                                                <p class="conc bom">BOM:</p>
                                                <p class="conc otimo">ÓTIMO:</p>                                        
                                            </div>
                                        </div>
                                    </span>
                                    <div class="radios">
                                        <input type="radio" name="estado_assoalho" value="ruim"> 
                                        <label>Ruim</label>
                                        <input type="radio" name="estado_assoalho" value="bom"> 
                                        <label>Bom</label>
                                        <input type="radio" name="estado_assoalho" value="otimo"> 
                                        <label>Ótimo</label>                                   
                                    </div> 
                                </div>
                      
                                <div id="container-estado-caixa-de-carga" data-ativo="1">
                                    <span class="legenda">ESTADO DA CAIXA DE CARGA <img src="css/images/info.png" alt="O que é estado da caixa de carga?" class="info" id="infoCaixa">
                                        <div class="conceito" id="conceitoCaixaDeCarga">                                        
                                            <div class="area-texto">                
                                                <span class="fechar">X</span>                            
                                                <p class="oque">O QUE É CONSIDERADO</p>
                                                <p class="conc ruim">RUIM:</p>
                                                <p class="conc bom">BOM:</p>
                                                <p class="conc otimo">ÓTIMO:</p>                                        
                                            </div>
                                        </div>                                
                                    </span>
                                    <div class="radios">
                                        <input type="radio" name="estado_caixa_de_carga" value="ruim"> 
                                        <label>Ruim</label>
                                        <input type="radio" name="estado_caixa_de_carga" value="bom"> 
                                        <label>Bom</label>
                                        <input type="radio" name="estado_caixa_de_carga" value="otimo"> 
                                        <label>Ótimo</label>                                   
                                    </div>
                                </div>  

                                <div id="container-estado-mecanica" class="categoria02-campo" data-ativo="0">
                                    <span class="legenda">ESTADO DA MECÂNICA <img src="css/images/info.png" alt="O que é estado da mecânica?" class="info" id="infoMecanica">
                                        <div class="conceito" id="conceitoMecanica">                                        
                                            <div class="area-texto">                
                                                <span class="fechar">X</span>                            
                                                <p class="oque">O QUE É CONSIDERADO</p>
                                                <p class="conc ruim">RUIM:</p>
                                                <p class="conc bom">BOM:</p>
                                                <p class="conc otimo">ÓTIMO:</p>                                        
                                            </div>
                                        </div>                                
                                    </span>
                                    <div class="radios">
                                        <input type="radio" name="estado_mecanica" value="ruim"> 
                                        <label>Ruim</label>
                                        <input type="radio" name="estado_mecanica" value="bom"> 
                                        <label>Bom</label>
                                        <input type="radio" name="estado_mecanica" value="otimo"> 
                                        <label>Ótimo</label>                                  
                                    </div>
                                </div>  
                                
                                <div id="container-estado-sistema-eletrico" class="categoria02-campo" data-ativo="0">
                                    <span class="legenda">ESTADO DO SISTEMA ELÉTRICO <img src="css/images/info.png" alt="O que é estado do sistema elétrico?" class="info" id="infoSistemaEletrico">
                                        <div class="conceito" id="conceitoSistemaEletrico">                                        
                                            <div class="area-texto">                
                                                <span class="fechar">X</span>                            
                                                <p class="oque">O QUE É CONSIDERADO</p>
                                                <p class="conc ruim">RUIM:</p>
                                                <p class="conc bom">BOM:</p>
                                                <p class="conc otimo">ÓTIMO:</p>                                        
                                            </div>
                                        </div>                                
                                    </span>
                                    <div class="radios">
                                        <input type="radio" name="estado_sistema_eletrico" value="ruim"> 
                                        <label>Ruim</label>
                                        <input type="radio" name="estado_sistema_eletrico" value="bom"> 
                                        <label>Bom</label>
                                        <input type="radio" name="estado_sistema_eletrico" value="otimo"> 
                                        <label>Ótimo</label>                                  
                                    </div>
                                </div>   
                                                                                               
                                <div id="container-estado-estrutura-chassi" class="categoria02-campo" data-ativo="0">
                                    <span class="legenda">ESTADO DA ESTRUTURA DO CHASSI <img src="css/images/info.png" alt="O que é estado da estrutura do chassi?" class="info" id="infoEstruturaChassi">
                                        <div class="conceito" id="conceitoEstruturaChassi">                                        
                                            <div class="area-texto">                
                                                <span class="fechar">X</span>                            
                                                <p class="oque">O QUE É CONSIDERADO</p>
                                                <p class="conc ruim">RUIM:</p>
                                                <p class="conc bom">BOM:</p>
                                                <p class="conc otimo">ÓTIMO:</p>                                        
                                            </div>
                                        </div>                                
                                    </span>
                                    <div class="radios">
                                        <input type="radio" name="estado_estrutura_chassi" value="ruim"> 
                                        <label>Ruim</label>
                                        <input type="radio" name="estado_estrutura_chassi" value="bom"> 
                                        <label>Bom</label>
                                        <input type="radio" name="estado_estrutura_chassi" value="otimo"> 
                                        <label>Ótimo</label>                                  
                                    </div>
                                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                                                                                                
                                <div id="container-estado-pintura" data-ativo="1">
                                    <span class="legenda">ESTADO DA PINTURA <img src="css/images/info.png" alt="O que é estado da pintura?" class="info" id="infoPintura">
                                        <div class="conceito" id="conceitoPintura">                                        
                                            <div class="area-texto">                
                                                <span class="fechar">X</span>                            
                                                <p class="oque">O QUE É CONSIDERADO</p>
                                                <p class="conc ruim">RUIM:</p>
                                                <p class="conc bom">BOM:</p>
                                                <p class="conc otimo">ÓTIMO:</p>                                        
                                            </div>
                                        </div>                                
                                    </span>
                                    <div class="radios">
                                        <input type="radio" name="pintura" value="ruim"> 
                                        <label>Ruim</label>
                                        <input type="radio" name="pintura" value="bom"> 
                                        <label>Bom</label>
                                        <input type="radio" name="pintura" value="otimo"> 
                                        <label>Ótimo</label>                                  
                                    </div>
                                </div>                                                                                                                                                                                                                                                      
                                
                                <div id="container-estado-geral" data-ativo="1">                                                                                                                                                                                                                                                                                                                              
                                    <span class="legenda">ESTADO GERAL <img src="css/images/info.png" alt="O que é estado geral?" class="info" id="infoGeral">
                                        <div class="conceito" id="conceitoGeral">                                        
                                            <div class="area-texto">                
                                                <span class="fechar">X</span>                            
                                                <p class="oque">O QUE É CONSIDERADO</p>
                                                <p class="conc ruim">RUIM:</p>
                                                <p class="conc bom">BOM:</p>
                                                <p class="conc otimo">ÓTIMO:</p>                                        
                                            </div>
                                        </div>                                
                                    </span>
                                    <div class="radios">
                                        <input type="radio" name="estado_veiculo" value="ruim"> 
                                        <label>Ruim</label>
                                        <input type="radio" name="estado_veiculo" value="bom"> 
                                        <label>Bom</label>
                                        <input type="radio" name="estado_veiculo" value="otimo"> 
                                        <label>Ótimo</label>                                    
                                    </div>
                                </div>
                                
                                <div class="form-regua" data-ativo="0">
                                    <span class="legenda legenda-comp"></span>
                                    <br>
                                    <div class="medidas-area">                                        
                                    </div>                                                        
                                    <br>
                                </div>   
                                
                            </div>
<!--
                            <select name="teste" id="s-teste" class="selectpicker">
                                <option disabled selected value="">COMPRIMENTO</option>    
                            </select>                                                               
-->
                            
                            <input type="submit" id="pesquisar" value="Pesquisar preço médio de mercado">
                        </form>
                        <section id="resultado">
                            <div class="tabela">
                                <div class="tabela-row">
                                    <div class="tabela-col-left">CATEGORIA</div>
                                    <div class="tabela-col-right" id="resultado-categoria"></div>
                                </div>
                                <div class="tabela-row">
                                    <div class="tabela-col-left">LINHA</div>
                                    <div class="tabela-col-right" id="resultado-linha"></div>
                                </div>
                                <div class="tabela-row categoria02-resultado">
                                    <div class="tabela-col-left">BASE</div>
                                    <div class="tabela-col-right" id="resultado-base"></div>
                                </div>  
                                <div class="tabela-row categoria02-resultado">
                                    <div class="tabela-col-left">NÚMERO DE EIXOS</div>
                                    <div class="tabela-col-right" id="resultado-numero-eixos"></div>
                                </div>    
                                <div class="tabela-row categoria02-resultado">
                                    <div class="tabela-col-left">TIPO DE SUSPENSÃO</div>
                                    <div class="tabela-col-right" id="resultado-tipo-suspensao"></div>
                                </div>   
                                <div class="tabela-row categoria02-resultado">
                                    <div class="tabela-col-left">DISTRIBUIÇÃO DOS EIXOS</div>
                                    <div class="tabela-col-right" id="resultado-distribuicao-eixos"></div>
                                </div>                              
                                <div class="tabela-row">
                                    <div class="tabela-col-left">MODELO</div>
                                    <div class="tabela-col-right" id="resultado-modelo"></div>
                                </div>               
                                <div class="tabela-row categoria02-resultado" id="tamanho-resultado">
                                    <div class="tabela-col-left">TAMANHO / CAPACIDADE</div>
                                    <div class="tabela-col-right" id="resultado-tamanho"></div>
                                </div>                                                  
                                <div class="tabela-row">
                                    <div class="tabela-col-left">MARCA</div>
                                    <div class="tabela-col-right" id="resultado-marca"></div>
                                </div>
                                <div class="tabela-row">
                                    <div class="tabela-col-left">ANO</div>
                                    <div class="tabela-col-right" id="resultado-ano"></div>
                                </div>
                                <div class="tabela-row">
                                    <div class="tabela-col-left">UF</div>
                                    <div class="tabela-col-right" id="resultado-uf"></div>
                                </div>
                                <div class="tabela-row">
                                    <div class="tabela-col-left">TIPO ASSOALHO</div>
                                    <div class="tabela-col-right" id="resultado-assoalho"></div>
                                </div>
                                <div class="tabela-row">
                                    <div class="tabela-col-left">ESTADO ASSOALHO</div>
                                    <div class="tabela-col-right" id="resultado-estado-assoalho"></div>
                                </div>
                                <div class="tabela-row">
                                    <div class="tabela-col-left">TIPO CAIXA DE CARGA</div>
                                    <div class="tabela-col-right" id="resultado-caixa-de-carga"></div>
                                </div>
                                <div class="tabela-row">
                                    <div class="tabela-col-left">ESTADO CAIXA DE CARGA</div>
                                    <div class="tabela-col-right" id="resultado-estado-caixa-de-carga"></div>
                                </div>
                                <div class="tabela-row categoria02-resultado">
                                    <div class="tabela-col-left">ESTADO DA MECÂNICA</div>
                                    <div class="tabela-col-right" id="resultado-estado-mecanica"></div>
                                </div>
                                <div class="tabela-row categoria02-resultado">
                                    <div class="tabela-col-left">ESTADO DO SISTEMA ELÉTRICO</div>
                                    <div class="tabela-col-right" id="resultado-estado-sistema-eletrico"></div>
                                </div>
                                <div class="tabela-row categoria02-resultado">
                                    <div class="tabela-col-left">ESTADO DA ESTRUTURA DO CHASSI</div>
                                    <div class="tabela-col-right" id="resultado-estado-estrutura-chassi"></div>
                                </div>
                                <div class="tabela-row">
                                    <div class="tabela-col-left">ESTADO PINTURA</div>
                                    <div class="tabela-col-right" id="resultado-estado-pintura"></div>
                                </div>
                                <div class="tabela-row">
                                    <div class="tabela-col-left">ESTADO GERAL</div>
                                    <div class="tabela-col-right" id="resultado-estado-geral"></div>
                                </div>
                                <div class="tabela-row" id="comprimento-resultado">
                                    <div class="tabela-col-left" id="resultado-comprimento-nomenclatura">COMPRIMENTO</div>
                                    <div class="tabela-col-right" id="resultado-comprimento-valor"></div>
                                </div>                                  
                                <div class="tabela-row">
                                    <div class="tabela-col-left preco">PREÇO MÉDIO</div>
                                    <div class="tabela-col-right preco" id="resultado-calculo"></div>
                                </div>                           
                            </div>    
                            <div class="obs">
                                <span>OBS: Preço sem pneus</span>
                            </div>                                                       
                            <div class="pull-right" id="compartilhamento">
                                <a href="javascript:void(0)" class="enviar" id="enviarEmail">
                                    <img src="css/images/mail.png" alt="Enviar por E-mail">                         
                                    <span>ENVIAR POR E-MAIL</span>
                                </a>                            
                                <a href="javascript:window.print()" class="imprimir">
                                    <img src="css/images/print.png" alt="Imprimir">
                                    <span>IMPRIMIR</span>
                                </a>                               
                           		<a href="javascript:void(0)" class="copiar-url" id="copiarUrl">
                                    <img src="css/images/web-link.png" alt="Copiar URL">                         
                                    <span>COPIAR URL</span>
                                </a>    
                            </div> 
                            <div class="clear-both"></div>                            
                            <a href="javascript:void(0)" class="limpar" id="btn-limpar">LIMPAR E FAZER NOVA PESQUISA</a>   
                        </section>
                        <section id="parceiros">
                            <div class="container-fluid">
                                <div class="row template" data-template="1">
                                    <div class="col-xs-12 parceiro-titulo">
                                        <p>PARCEIROS SHOPTRANS</p>                                    
                                    </div>
                                    <div class="col-xs-12 um-parceiro">
                                        <div class="parceiro-box">
                                            <div class="logo-container" data-posicao="1">                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="1">                                                
                                           </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="2">                                                
                                           </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="3">                                                
                                           </div>                                        
                                        </div>
                                    </div>                                                                                                                                                                                         
                                </div>                               
                                <div class="row template" data-template="2">
                                    <div class="col-xs-12 parceiro-titulo">
                                        <p>PARCEIROS SHOPTRANS</p>                                    
                                    </div>
                                    <div class="col-xs-6 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="1">                                                
                                           </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-6 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="2">                                                
                                           </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-6 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="3">                                                
                                           </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-6 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="4">                                                
                                           </div>                                        
                                        </div>
                                    </div>                                                                                                                                                                                         
                                </div> 
                                <div class="row template" data-template="3">
                                    <div class="col-xs-12 parceiro-titulo">
                                        <p>PARCEIROS SHOPTRANS</p>                                    
                                    </div>
                                    <div class="col-xs-6 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="1">                                                
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-6 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="2">                                                
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="1">                                                
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="2">                                                
                                            </div>                                        
                                        </div>
                                    </div> 
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="3">                                                
                                            </div>                                        
                                        </div>
                                    </div>                                                                                                                                                                                        
                                </div> 
                                <div class="row template" data-template="4">
                                    <div class="col-xs-12 parceiro-titulo">
                                        <p>PARCEIROS SHOPTRANS</p>                                    
                                    </div>
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="1">                                                
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="2">                                                
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="3">                                                
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="4">                                                
                                            </div>                                        
                                        </div>
                                    </div> 
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="5">                                                
                                            </div>                                        
                                        </div>
                                    </div> 
                                    <div class="col-xs-4 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="6">                                                
                                            </div>                                        
                                        </div>
                                    </div>                                                                                                                                                                                         
                                </div> 
                                <div class="row template" data-template="5">
                                    <div class="col-xs-12 parceiro-titulo">
                                        <p>PARCEIROS SHOPTRANS</p>                                    
                                    </div>
                                    <div class="col-xs-12 um-parceiro">
                                        <div class="parceiro-box">
                                            <div class="logo-container" data-posicao="1">                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="1">                                                
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-6 um-parceiro">
                                        <div class="parceiro-box">
                                           <div class="logo-container" data-posicao="2">                                                
                                            </div>                                        
                                        </div>
                                    </div>                                                                                                                                                                                        
                                </div>   
                            </div>                              
                        </section>
                    </div>
                </div>
            </div>
        </div>
  </body> 
</html>