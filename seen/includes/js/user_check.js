$(document).ready(function()//When the dom is ready 
{
$("#user_name").change(function() 
{ //if theres a change in the username textbox

var username = $("#user_name").val();//Get the value in the username textbox
if(username.length > 3)//if the lenght greater than 3 characters
{
$("#availability_status").html('Checking availability...');
//Add a loading image in the span id="availability_status"

$.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "/includes/signup_ajax.php",  //file name
    data: "username="+ username,  //data
    success: function(server_response){  
   
   $("#availability_status").ajaxComplete(function(event, request){ 

	if(server_response == '0')//if signup_ajax.php return value "0"
	{ 
	$("#availability_status").html('<font color="Green"> Available </font>  ');
	//add this image to the span with id "availability_status"
	}  
	else  if(server_response == '1')//if it returns "1"
	{  
	 $("#availability_status").html('<font color="red">Not Available </font>');
	}  
   
   });
   } 
   
  }); 

}
else
{

$("#availability_status").html('<font color="#cc0000">Username too short</font>');
//if in case the username is less than or equal 3 characters only 
}



return false;
});

});