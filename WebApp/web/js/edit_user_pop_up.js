var supervisorRequired = false;

$(document).ready(function(){
    
    $("#submitUser").click(CallAjax);
});

function CallAjax()
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
	
    if( isCheckFailed == 1 )
	{
		var accountType = parseInt( $.trim( $("#accountType").val() ) );
		var username = $("#username").val();
		var email = $("#email").val();
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var gender = $("#gender").val();
        var yearOfBirth = $("#yearOfBirth").val();
        var phoneNo = $("#phoneNo").val();
        var mobile = $("#mobile").val();
        var addressLine1 = $("#addressLine1").val();
        var addressLine2 = $("#addressLine2").val();
        var addressCity = $("#addressCity").val();
        var addressState = $("#addressState").val();
        var addressCountry = $("#addressCountry").val();
        var addressZipCode = $("#addressZipCode").val();
        var interests = $("#interests").val();
        
        //Call Ajax for loading data
        $.ajax({
            async:true,
            type:"POST",
            url:base_url+"/EditUserPopUp",
            data:"accountType="+ accountType +
					"username="+ username +
					"email="+ email +
					"firstname="+ firstname +
                    "&lastname="+lastname+
                    "&gender="+gender+
                    "&yearOfBirth="+yearOfBirth+
                    "&phoneNo="+phoneNo+
                    "&mobile="+mobile+
                    "&addressLine1="+addressLine1+
                    "&addressLine2="+addressLine2+
                    "&addressCity="+addressCity+
                    "&addressState="+addressState+
                    "&addressCountry="+addressCountry+
                    "&addressZipCode="+addressZipCode+
                    "&interests="+interests+
                    "&submitUser="+1+
                    "&output_type=json",
            dataType:"json",
            success:function(json)
            {
                if(json != null && json.response != null)
                {
					$("#accountType").val(json.response.userSVC.accountType);
					$("#username").val(json.response.userSVC.username);
					$("#email").val(json.response.userSVC.email);
                    $("#firstname").val(json.response.userSVC.firstname);
                    $("#lastname").val(json.response.userSVC.lastname);
                    $("#gender").val(json.response.userSVC.gender);
                    $("#yearOfBirth").val(json.response.userSVC.yearOfBirth);
                    $("#phoneNo").val(json.response.userSVC.phone);
                    $("#mobile").val(json.response.userSVC.mobile);
                    $("#addressLine1").val(json.response.userSVC.addressLine1);
                    $("#addressLine2").val(json.response.userSVC.addressLine2);
                    $("#addressCity").val(json.response.userSVC.addressCity);
                    $("#addressState").val(json.response.userSVC.addressState);
                    $("#addressCountry").val(json.response.userSVC.addressCountry);
                    $("#addressZipCode").val(json.response.userSVC.addressZipCode);
                    $("#interests").val(json.response.userSVC.interests);
                    
                    alert(json.response.message);
                    
                    parent.CloseModal();
                }
            }
        });    
	}
}