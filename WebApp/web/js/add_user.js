var supervisorRequired = false;

$(document).ready(function(){
    
    $("#submitUser").click( Validate );
	
	$("#TC").click(function(){
        $('#ex2').jqm({ajax: base_url + '/TermsAndConditionsPopUp'});
		$('#ex2').jqmShow();
    });
	
	$("#PP").click(function(){		
        $('#ex2').jqm({ajax: base_url + '/PrivacyPolicyPopUp'});
		$('#ex2').jqmShow();
    });
});
function CloseModal()
{
    $('#ex2').jqmHide();
}

function Validate()
{   
    var isCheckFailed = 1;
    
    //Email is mandatory
    if( $.trim( $("#email").val() ) == "" )
    {
        $("label[for='email']").html("Please enter your email");
        $("#email").focus();
        isCheckFailed = 0;
    }
    else
    {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailaddressVal = $("#email").val();
        if(!emailReg.test(emailaddressVal))
        {
            $("label[for='email']").html("Please enter valid Email");
            $("#email").focus();
            isCheckFailed = 0;
        }
    }
    	
	//Agree to Terms and Conditions
    if( !($("#iAgree").is(':checked')) )
	{
		$("label[for='iAgree']").html("You have to agree to our terms and conditions");
        $("#iAgree").focus();
        isCheckFailed = 0;
	}
	
    if( isCheckFailed == 0 )
	{
		return false;
	}
	
	return true;
}
