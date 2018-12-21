var notificationToken = null;

document.addEventListener('deviceready', function() {
  FCMPlugin.getToken(
    function(token){
      notificationToken = token;

      if(loggedIn == true){
        var usuario = JSON.parse(localStorage.getItem('usuario'));

        $.ajax({
          url: localStorage.getItem('api_url'),
          dataType: "json",
          data: {
            login: usuario.e,
            password: localStorage.getItem('password'),
            method: 'atualizarToken',
            token: token,
            api: 1
          },
          success: function(r){
            return;
          },
          error: function(e1, e2, e3){
            console.log(e1, e2, e3);
          }
        });
      }
    },
    function(err){
      alert('Erro ao ativar Notificações Push: ' + err);
    }
  );

  FCMPlugin.onNotification(
    function(data){
      if(data.wasTapped){
        //Notification was received on device tray and tapped by the user.
        //alert( data.body );
      }else{
        //Notification was received in foreground. Maybe the user needs to be notified.
        alert( data.body );
      }

      //$("#notification").html("<b>"+data.title+"</b><br/>"+JSON.stringify(data))
    },
    function(msg){
      console.log('onNotification callback successfully registered: ' + msg);
    },
    function(err){
      //alert(err)
      console.log('Error registering onNotification callback: ' + err);
    }
  );

  /*
  	var push = PushNotification.init({
          android: {
              senderID: "582142197049"
          },
          ios: {
  			senderID: "582142197049",
  			gcmSandbox: "true",
              alert: 'true',
              badge: 'false',
              sound: 'false'
          }
      });
      PushNotification.hasPermission(function(data) {
      	console.log(data);
          if (data.isEnabled) {
              alert('push habilitado');
          }else{
              alert('push desabilitado');
          }
      });
      push.on('registration', function(data) {
          alert('REGISTROU');
          window.setTimeout(function(){
              alert(data.registrationId);
              $('body').html('<textarea>'+data.registrationId+'</textarea>');
              $.ajax({
                  url: 'http://requestb.in/1f2599z1',
                  data: {r:"oioi111"},
                  success: function(e){
                      alert('sucesso')
                  },
                  error: function(e1,e2,e3){
                      alert(e1+"\n"+e2+"\n"+e3);
                  },
                  complete: function(){
                      alert('completo');
                  }
              });
          },5000);
      });
      push.on('notification', function(data) {
          alert('notf');
          $('body').html('Recebido: '+data.additionalData);
      });
      push.on('error', function(e) {
      	console.log(e);
      	alert("ERRO "+e.message)
  	});

  */
});