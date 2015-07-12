/**
 * IDEIAS PARA NOVAS VERSÕES
 * Escolher estado e cidade
 * Login para todas as prefs do pais (procurar base de dados no site do governo)
 * Botão para adicionar feedback e bugs
 *  
 **/

$(document).ready(function() {
	
	/* FANCY BOX */
	$(".fancybox").fancybox({ 
	    minWidth: 400,
	    afterShow: function () {
	    	FB.XFBML.parse();
	        $.fancybox.update();
	    }
	});
	
	/* CRIA MAPA */
	var markersArray = [];
    var mapCenter = new google.maps.LatLng(-25.441184, -49.266452);
    var styles = [
		{
	    	stylers: [
	      		{ hue: "#ff0000" },
	      		{ saturation: 0 }
	    	]
	  	},{
	    	featureType: "road.arterial",
	    	elementType: "geometry",
	    	stylers: [
	      		{ lightness: 100 },
	      		{ visibility: "simplified" }
	    	]
	  	},{
	    	featureType: "road",
	    	elementType: "labels",
	    	stylers: [
	      		{ visibility: "on" }
	    	]
	  	},{
      		featureType: "poi",
      		elementType: "labels",
      		stylers: [
        		{ "visibility": "off" }
      		]
	  	}
	];
	
    var myOptions = {
        zoom: 13,
        minZoom: 13,
        center: mapCenter,
        panControl: true,
        zoomControl: true,
        scaleControl: true, 
        draggable:true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: styles,
  		streetViewControl: false
    };
    
    var map = new google.maps.Map(document.getElementById("google_maps"), myOptions);
	
	/* BUSCA MARCADORES SALVOS */
	$.ajax({
		url: 'markers/buscar',
		beforeSend: function() {},
		complete: function() {},
		success: function(data) {
			$(data).find("marker").each(function () {
				
                  var point = new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
                  var Icon = 'http://operacaotapaburacos.com.br/img/alerta_status_'+$(this).attr('status')+'.png';
				  var Criado = $(this).attr('created');
				  var Atualizado = $(this).attr('modified');
					
                  create_marker(point, false, false, false,false, false, Icon, false,  Criado, Atualizado);
                  
            });
		},
        error:function (xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
	});
    

    /* CLICK NO MAPA COM BOTÃO DIREITO */
    google.maps.event.addListener(map, 'rightclick', function(event) {
    	map.panTo(event.latLng);
        var EditForm = '<form action="" method="POST" name="SaveMarker" id="SaveMarker">'+
            '<label for="pEmail"><input type="text" name="pEmail" class="save-email" placeholder="seu@email.com.br" maxlength="250" /></label>'+
            '</form>'+
            '<button name="save-marker" class="save-marker">Enviar Alerta</button>';
        create_marker(event.latLng, 'Alerta de buraco!', EditForm, true, true, true, "http://operacaotapaburacos.com.br/img/alerta2.png", true);
    });      
    
	/* DEFINE LIMITE DE ROLAGEM DO MAPA */
	var allowedBounds = new google.maps.LatLngBounds(
	     new google.maps.LatLng(-25.520060, -49.377002),
	     new google.maps.LatLng(-25.362100, -49.180622) 
	);
	
	var lastValidCenter = map.getCenter();
	
	google.maps.event.addListener(map, 'center_changed', function() {
	    if (allowedBounds.contains(map.getCenter())) {
	        lastValidCenter = map.getCenter();
	        return; 
	    }
	    map.panTo(lastValidCenter);
	});
    	
	
	/* CRIAR MARKER */
	function create_marker(MapPos, MapTitle, MapDesc,  InfoOpenDefault, DragAble, Removable, iconPath, janela, criado, modificado) {                 
	    
	    var marker = new google.maps.Marker({
	        position: MapPos,
	        map: map,
	        draggable:DragAble,
	        animation: google.maps.Animation.DROP,
	        icon: iconPath
	    });
	    
	    var infowindow = new google.maps.InfoWindow();
	    markersArray.push(marker);
	    
	    if(janela){
	    	
		    var contentString = $('<div class="marker-info-win">'+
		    '<div class="marker-inner-win"><span class="info-content">'+
		    '<h2 class="marker-heading">'+MapTitle+'</h2>'+
		    MapDesc+ 
		    '</span><button name="remove-marker" class="remove-marker" title="Remove Marker">Cancelar Alerta</button>'+
		    '</div></div>');    
		
		    infowindow.setContent(contentString[0]);
		
		    var removeBtn   = contentString.find('button.remove-marker')[0];
		    var saveBtn     = contentString.find('button.save-marker')[0];
		
		    google.maps.event.addDomListener(removeBtn, "click", function(event) {
		        remove_marker(marker);
		    });
		    
		    if(typeof saveBtn !== 'undefined'){
		    	
		        google.maps.event.addDomListener(saveBtn, "click", function(event) {
		        	
		        	var pEmail = contentString.find('input.save-email')[0].value;
		            var mReplace = contentString.find('span.info-content');
		            
		            if(IsEmail(pEmail)){
		                save_marker(marker, pEmail, mReplace);
		            }else{
		            	$('input.save-email').css('border-color', 'red');
		            }
		        });
		    }
		        
		    google.maps.event.addListener(marker, 'click', function() {	
	        	infowindow.open(map,marker);
		    });
		      
		    if(InfoOpenDefault){
		      	infowindow.open(map,marker);
		    }
		    
	    }else{
	    	if(criado == modificado){
	    		var contentString = $('<div class="marker-info-win">'+
				    '<div class="marker-inner-win"><span class="info-content">'+
				    '<h2 class="marker-heading">Status do Alerta</h2></span>'+
				    '<p>Criado em: <b>'+criado+'</b></p>'+
				    '</div></div>');
			
	    	}else{
		    	var contentString = $('<div class="marker-info-win">'+
				    '<div class="marker-inner-win"><span class="info-content">'+
				    '<h2 class="marker-heading">Status do Alerta</h2></span>'+
				    '<p>Criado em: <b>'+criado+'</b></p>'+
				    '<p>Atualizado em: <b>'+modificado+'</b></p>'+
				    '</div></div>');	
	    	}
	    	 
		    var infowindow2 = new google.maps.InfoWindow();
		    infowindow2.setContent(contentString[0]);
		        
		    google.maps.event.addListener(marker, 'click', function() {
	        	infowindow2.open(map,marker);
		    });
	    }
	}
	
	
	/* REMOVER MARKER */
	function remove_marker(Marker)	{
		
	    if(Marker.getDraggable()) {
	        Marker.setMap(null);
	    } else {
	        var mLatLang = Marker.getPosition().toUrlValue();
	        var myData = {del : 'true', latlang : mLatLang};
	    }
	}
	
	/* SALVAR MARKER */
	function save_marker(Marker, pEmail, replaceWin)	{
	    var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
	    var myData = {latlang : mLatLang, email : pEmail }; //post variables     
	    
		$.ajax({
			url: 'markers/salvar',
			type: 'post',
	        data: myData,
			beforeSend: function() {},
			complete: function() {},
			success: function(data) {
	            replaceWin.html('<span class="sucesso">'+data+'</span>');
	            $('.remove-marker').hide();
	            Marker.setDraggable(false);
	            Marker.setIcon('http://operacaotapaburacos.com.br/img/alerta_status_0.png'); //replace icon
			},
	        error:function (xhr, ajaxOptions, thrownError){
	            alert(thrownError);
	        }
		});
	    
	}
	
	/* FILTRO BURACOS */
	$('#filtro').change(function(){
        var selecionado = $(this).find('option:selected'); 
		clearOverlays();
		
	    var myData = {status : selecionado.val()};

		/* BUSCA MARCADORES SALVOS */
		$.ajax({
			url: 'markers/buscar',
			type: 'post',
	        data: myData,
			beforeSend: function() {},
			complete: function() {},
			success: function(data) {
				$(data).find("marker").each(function () {
	                  var point = new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
	                  var Icon = 'http://operacaotapaburacos.com.br/img/alerta_status_'+$(this).attr('status')+'.png';
					  var Criado = $(this).attr('created');
					  var Atualizado = $(this).attr('modified');
						
	                  create_marker(point, false, false, false,false, false, Icon, false,  Criado, Atualizado);
	            });
			},
	        error:function (xhr, ajaxOptions, thrownError){
	            alert(thrownError);
	        }
		});
		
	});
	
	/* MENU MOBILE */
	$('#botao-mobile').click(function(){
		$('.menu ul').toggle();
	});
	
	$(window).on('resize', function(){
	    var win = $(this);
	    if (win.width() >= 769) {
	    	$('.menu ul').show();  
		}
	});
	
	function clearOverlays() {
		if (markersArray) {
	 		for (i in markersArray) {
	    		markersArray[i].setMap(null);
	    	}
	  	}
	}
	
	function IsEmail(email){
		if(email != ""){
			var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		    if(filtro.test(email)){
		   		return true;
		    } else {
		    	return false;
		    }
	    }else{
	  		return false;
		}
	}
	
});

