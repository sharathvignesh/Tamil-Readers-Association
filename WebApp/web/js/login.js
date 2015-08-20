$(document).ready(function()
{
    $( "#loginSubmit" ).click( Validate );
	
	//On Page load fetch advertisements
	window.onload = defaultfocus();
});

function Validate( )
{   
    var isCheckFailed = "1";
    if( !$.trim( $( "#loginEmail" ).val( ) ).length  )
    {
		$( "label[for='loginEmail']" ).html( "Please enter email" );
        isCheckFailed = "0";
    }
	if( !$.trim( $( "#loginPassword" ).val( ) ).length  )
    {
		$( "label[for='loginPassword']" ).html( "Please enter password" );
        isCheckFailed = "0";
    }
    
    if( isCheckFailed == "0" )
		return false;
	
	return true;
}

function defaultfocus( )
{
	$( "#loginEmail" ).focus();
}