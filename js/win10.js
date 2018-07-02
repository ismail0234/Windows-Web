
var botBensonWindowsWeb = {

	timer    : -1,
	audio    : 1.0,
	nowDrag  : null,
	draggable: false,
	entityAutoIncreament: 0,
	entity   : { 
		"settings":
		{

			"height" : 90,
			"width"  : 70

		},

		"chrome" : 
		{
			"name"  : "Chrome",
			"image" : "images/desktop/chrome.png"
		},
		"folder-empty" :
		{
			"name"  : "Folder",
			"image" : "images/desktop/folder-empty.png"
		},
		"computer" :
		{
			"name"  : "My Computer",
			"image" : "images/desktop/my-computer.png"
		},
		"text-document" :
		{
			"name"  : "Text Document",
			"image" : "images/desktop/text-document.png"
		},		
		"trash-empty" : 
		{
			"name"  : "Trash",
			"image" : "images/desktop/trash-empty.png"
		},
		"visual-code":
		{
			"name"  : "Visual Code",
			"image" : "images/desktop/visual-code.png"
		},	
	},

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
	dragAndDropChange: function( type )
	{

		botBensonWindowsWeb.draggable = type == true ? true : false;

	},
	changContextMenuStart: function()
	{

		$(document).bind("contextmenu", function (event) {
        
	        event.preventDefault();      

	        $( ".context-right-click-menu" ).removeClass('d-none').css({ "position" : "absolute" , "top" : event.pageY + "px" , "left" : event.pageX + "px" });

	    });

	    $( ".context-right-click-menu .context-row" ).click(function(){

	    	botBensonWindowsWeb.runContextEvent( $(this).attr('data-type') , $(this).attr('data-popup') , $( ".context-right-click-menu" ).position() );
	    	$( ".context-right-click-menu" ).addClass( 'd-none' );
	    });

	},


	/********************* TOOLS ****************************/
	/**
	 * Create Entity Desktop
	 * @param  {string} [entity]     [Const Entity Name]
	 * @param  {object} [coordinate] [Entity Desktop Coordinate]
	 * @param  {String} [entityName] [Entiy Name ( optional )]
	 * @return {bool}
	 */
	createEntity: function( entity , coordinate , entityName = '' )
	{

		if( typeof botBensonWindowsWeb.entity[ entity ] == "undefined" || entity == "settings" )
		{
			alert("Object could not be created");
			return true;
		}
		
		var coor   = botBensonWindowsWeb.entityCoordinate( coordinate.top , coordinate.left );
		var entity = botBensonWindowsWeb.entity[ entity ];
		var name   = entityName == "" ? entity.name : entityName;
		var height = botBensonWindowsWeb.entity.settings.height;
		var width  = botBensonWindowsWeb.entity.settings.width;


		var html = '<div class="icon-desktop" style="height:' + height + 'px;width:' + width + 'px; top:' + coor.top + 'px;left:' + coor.left + 'px" data-id="'+botBensonWindowsWeb.entityAutoIncreament+'"><a href="#">';
		html += '<img src="' + entity.image +'">';
		html += '<span>' + name +'</span></a></div>';

		$(".icons-dekstop").append( html );

		if( !botBensonWindowsWeb.draggable )
		{
			botBensonWindowsWeb.entityAutoIncreament++;
			return false;
		}

		$( ".icon-desktop[data-id='"+botBensonWindowsWeb.entityAutoIncreament+"']" ).draggable({
			start: function( event , ui ){

				botBensonWindowsWeb.nowDrag = $(this);

			},
		  	stop: function( event, ui ) {

		  		if( botBensonWindowsWeb.nowDrag == null )
		  			return;

		  		var coor = botBensonWindowsWeb.entityCoordinate( ui.position.top , ui.position.left );

		  		botBensonWindowsWeb.nowDrag.css( { top : coor.top + 'px' , left : coor.left + 'px'} );
		  		botBensonWindowsWeb.nowDrag = null;

		  	}		  	
		});
		
		botBensonWindowsWeb.entityAutoIncreament++;
		return false;
	},
	/**
	 * Entity Coordinate
	 * @param  {int} [entTop] [Entity Top value]
	 * @param  {int} [entLeft] [Entity Left value]
	 * @return {object}      
	 */
	entityCoordinate: function( entTop , entLeft )
	{

  		var heightDesktopIcon = botBensonWindowsWeb.entity.settings.height;
  		var widthDesktopIcon  = botBensonWindowsWeb.entity.settings.width;

		var top  = entTop - ( entTop % heightDesktopIcon ); 
		var left = entLeft - ( entLeft % widthDesktopIcon ); 
  		
		if( entTop % heightDesktopIcon >= heightDesktopIcon / 2  )
			top += heightDesktopIcon;

		if( entLeft % widthDesktopIcon >= widthDesktopIcon / 2  )
			left += widthDesktopIcon;

		return {
			top : top ,
			left: left,
		};

	},
	/**
	 * createPopup
	 * @param  {string} entName [Popup Ent Name]
	 * @return {void}
	 */
	createPopup: function( entName )
	{


	},
	/**
	 * runContextEvent
	 * @param  {string} [dataType]   [Event Type]
	 * @param  {Object} [coordinate] [Event Type Coordinate ( optional )]
	 * @return {void}
	 */
	runContextEvent: function( dataType , dataPopup , coordinate = {} )
	{

		if( dataType != "undefined" )
		{

			switch( dataType )
			{
				case "refresh" : {

					window.location.reload();

				}
				break;
				case "create-folder-empty" : {

					botBensonWindowsWeb.createEntity( "folder-empty" , coordinate  );

				}
				break;
				case "create-computer" : {

					botBensonWindowsWeb.createEntity( "computer" , coordinate  );

				}
				break;
				case "create-text-document" : {

					botBensonWindowsWeb.createEntity( "text-document" , coordinate  );

				}
				break;
				case "create-visual-code" : {

					botBensonWindowsWeb.createEntity( "visual-code" , coordinate  );

				}
				break;
				case "create-chrome" : {

					botBensonWindowsWeb.createEntity( "chrome" , coordinate  );

				}
				break;
			}

		}

		if( dataPopup != "undefined" )
		{

			switch( dataPopup )
			{

				case "system-information" : {

					botBensonWindowsWeb.createPopup( "system-information" );
				}
				break;

			}

		}

	}

};