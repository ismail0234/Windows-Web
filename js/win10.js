
var botBensonWindowsWeb = {

	timer  : -1,
	audio  : 1.0,
	nowDrag: null,

	timeStart: function( )
	{

		if( this.timer != -1 )
			clearTimeout( this.timer );

		var date   = new Date();
		var second = ( 60 - date.getSeconds() ) * 1000;

		this.timer = setTimeout( function(){

			botBensonWindowsWeb.timeStart( );

		} , second );
		
		var hours   = date.getHours(); 
		var minutes = date.getMinutes(); 
		var day     = date.getDate(); 
		var month   = date.getMonth() + 1; 
		var year    = date.getFullYear(); 

		$(".hour").text( ( hours < 10 ? '0' + hours : hours ) + ":" + ( minutes < 10 ? '0' + minutes : minutes ) );
		$(".date").text( ( day < 10 ? '0' + day : day ) + "." + ( month < 10 ? '0' + month : month ) + "." +  year );

	},
	volumeStart: function( )
	{

		$("#speakerRange").change(function(){

			var _audio = Number( $(this).val() );

			botBensonWindowsWeb.audio = _audio / 100;
			$("#sound-modal .data-value").text( _audio + '%');

		});


	},
	dragAndDropStart: function()
	{

		$( ".icon-desktop" ).draggable({
			start: function( event , ui ){

				botBensonWindowsWeb.nowDrag = $(this);

			},
		  	stop: function( event, ui ) {

		  		if( botBensonWindowsWeb.nowDrag == null )
		  			return;

		  		var heightDesktopIcon = 90;
		  		var widthDesktopIcon  = 70;

				var top  = ui.position.top - ( ui.position.top % heightDesktopIcon ); 
				var left = ui.position.left - ( ui.position.left % widthDesktopIcon ); 
		  		
				if( ui.position.top % heightDesktopIcon >= heightDesktopIcon / 2  )
					top += heightDesktopIcon;

				if( ui.position.left % widthDesktopIcon >= widthDesktopIcon / 2  )
					left += widthDesktopIcon;

		  		botBensonWindowsWeb.nowDrag.css( { top : top + 'px' , left : left + 'px'} );
		  		botBensonWindowsWeb.nowDrag = null;

		  	}		  	
		});

	},
	changContextMenuStart: function()
	{

		$(document).bind("contextmenu", function (event) {
        
	        event.preventDefault();      

	        $( ".context-right-click-menu" ).removeClass('d-none').css({ "position" : "absolute" , "top" : event.pageY + "px" , "left" : event.pageX + "px" });

	    });

	}


};