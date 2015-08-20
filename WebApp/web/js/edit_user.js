var supervisorRequired = false;

$(document).ready(function(){
    
    $("#submitUser").click(Validate);
});

function Validate( )
{   
    var isCheckFailed=1;
    var accountType = parseInt( $.trim( $("#accountType").val() ) );
	
	if( accountType==1 )
	{
		if( $.trim( $("#email").val() ) == "" )
		{
			$("label[for='email']").html("Please enter your email &nbsp;");
			$("#email").focus();
			isCheckFailed = 0;
		}
		else
		{
			$("label[for='email']").html("<span>Email<span>*</span></span>");
		}
		
		if( $.trim( $("#password").val() ) != "" )
		{
			if( $.trim( $("#newPassword").val() ) == "" )
			{
				$("label[for='newPassword']").html("Please enter new password");
				$("#newPassword").focus();
				isCheckFailed = 0;
			}
			if( $.trim( $("#confirmPassword").val() ) == "" )
			{
				$("label[for='confirmPassword']").html("Please confirm new password");
				$("#confirmPassword").focus();
				isCheckFailed = 0;
			}
			if( $.trim( $("#newPassword").val() ) != $.trim( $("#confirmPassword").val() ) )
			{
				$("label[for='confirmPassword']").html("Your new and confirm password should be same");
				$("#confirmPassword").focus();
				isCheckFailed = 0;
			}
		}
		else if( $.trim( $("#newPassword").val() ) != "" || $.trim( $("#confirmPassword").val() ) != "" )
		{
			$("label[for='password']").html("Please enter your current password");
			$("#password").focus();
			isCheckFailed = 0;
		}
	}
	
	if( $.trim( $("#username").val() ) == "" )
    {
        $("label[for='username']").html("Please enter your username &nbsp;");
        $("#username").focus();
        isCheckFailed = 0;
    }
    else
    {
        $("label[for='username']").html("<span>Username<span>*</span></span>");
    }
    
    if( isCheckFailed == 0 )
	{
		return false;
	}
	
	return true;
}
