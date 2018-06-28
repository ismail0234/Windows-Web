var timeSet = function()
{

  var date = new Date();
  
  var hours   = date.getHours(); 
  var minutes = date.getMinutes(); 
  var day     = date.getDate(); 
  var month   = date.getMonth() + 1; 
  var year    = date.getFullYear(); 
  date.getFull

  $(".hour").text( ( hours < 10 ? '0' + hours : hours ) + ":" + ( minutes < 10 ? '0' + minutes : minutes ) );
  $(".date").text( ( day < 10 ? '0' + day : day ) + "." + ( month < 10 ? '0' + month : month ) + "." +  year );

};   