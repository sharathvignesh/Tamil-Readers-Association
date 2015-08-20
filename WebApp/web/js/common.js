$(document).ready(function()
{
    $('.numbersOnly').keyup(function () {
        var regNumberTest = new RegExp();
    
        regNumberTest.compile(/^[0-9]+$/);

        if( !regNumberTest.test( this.value ) )
            this.value = '';
    });
    
    $( ".callEditPage" ).click( RedirectToEdit );
    
    $( ".dateFormat" ).each(function() { $(this).text( GetDateFormat( $(this).text(), "shortDate" ) ) } );
    
    SetupNavigation(1,1,$("#last_index").val());
    
    HandleControlTableValidation();
	
	//Switch Accounts
	$("#accounts").change(function (){
		var orgId = $('#accounts option:selected').val();
		
		//Call Ajax for loading data
		$.ajax({
			async:true,
			type:"POST",
			url:base_url+"/SwitchAccount",
			data:"orgId="+ orgId +
					"&submit="+1+
					"&output_type=json",
			dataType:"json",
			success:function(json)
			{
				if(json != null && json.response != null)
				{
					window.location.reload(true);
				}
			}
		});
    });
});

function RedirectToEdit( )
{
	var idVal ;
	idVal = $(this).attr( "idvalue" );
	
	$( "#id" ).val( idVal );
	document.editForm.submit( );
}

function handleLinks()
{
    $(".dr-dscr-act").each(function(){this.className="dr-dscr-inact";});
    this.className="dr-dscr-act";
    getPage(this.innerHTML,$("#sortColumn").val(),$("#sortOrder").val(),'','json','');
}
function SetupNavigation(startIndex,currentIndex,lastIndex)
{
    $("#nav_first").click(function(){
        $("#currentPage").val(1);
        getPage(1,$("#sortColumn").val(),$("#sortOrder").val(),'','json','');
    });
    $("#nav_previous").click(function(){
        $("#currentPage").val(eval(currentIndex)-1);
        getPage(eval(currentIndex)-1,$("#sortColumn").val(),$("#sortOrder").val(),'','json','');
    });
    $("#nav_last").click(function(){
        $("#currentPage").val(lastIndex);
        getPage(lastIndex,$("#sortColumn").val(),$("#sortOrder").val(),'','json','');
    });
    $("#nav_next").click(function(){
        $("#currentPage").val(eval(currentIndex)+1);
        getPage(eval(currentIndex)+1,$("#sortColumn").val(),$("#sortOrder").val(),'','json','');
    });
    $("#next_set").click(function(){
        var next_set_arr=this.innerHTML.split(" - ");
        getPage(next_set_arr[0],$("#sortColumn").val(),$("#sortOrder").val(),'','json','');
    });
    $("#previous_set").click(function(){
        var previous_set_arr=this.innerHTML.split(" - ");
        getPage(previous_set_arr[1],$("#sortColumn").val(),$("#sortOrder").val(),'','json','');
    });
}

function loadPager(type,url,data)
{
    $("#working").show();
    $.ajax({
        async:true,
        type:type,
        url:url,
        data:data,
        dataType:"json",
        success:function(json)
        {
            if(json.response!=null&&json.response.pager!=null)
            {
                var response=json.response.pager;
                var num_of_rows=response["numberOfRows"];
                var currentPage=response["currentPage"];
                var sortOrder=response["sortOrder"];
                var sortColumn=response["sortColumn"];
                $("#pager").html(response["pagerRows"]);
                if(response["pagination"]!=null)
                {
                    $("#pagination").show();
                    $("#pagination").html(response["pagination"]);
                    SetupNavigation(0,currentPage,response["numberOfPages"]);
                }
                else
                {
                    $("#pagination").hide();
                }
                $("#error_message").html('');
                $(".dr-dscr-inact").click(handleLinks);
                $("#working").hide();
                $("#currentPage").val(response["currentPage"]);
                $("#sortOrder").val(response["sortOrder"]);
                $("#sortColumn").val(response["sortColumn"]);
                
                $( ".dateFormat" ).each(function() { $(this).text( GetDateFormat( $(this).text(), "shortDate" ) ) } );
                
                $( ".callEditPage" ).click( RedirectToEdit );
            }
            else
            {
                $("#pagination").hide();
                $("#pager").html("<tr><td  style=\"text-align: center\" class=\"dr-subtable-cell rich-subtable-cell textbold\">No Records Found</td></tr>");
                $("#working").hide();
            }
        }
    });
}

function resort(sort_column_index)
{
    var currentPage = $("#currentPage").val();
    var sortOrder = $("#sortOrder").val();
    var sortColumn = $("#sortColumn").val();

    if(sortColumn == sort_column_index)
    {
        sortOrder = sortOrder.toLowerCase();
        if(sortOrder == "asc")
        {
            sortOrder = "desc";
        }
        else
        {
            sortOrder = "asc";
        }
    }
    else
    {
        sortColumn = sort_column_index;
        sortOrder == "asc";
    }

    getPage(currentPage, sortColumn, sortOrder,  "SorColumnChanged", "json");
}

function Search( )
{
    $("#currentPage").val('1');
    var currentPage = $("#currentPage").val();
    var sortOrder = $("#sortOrder").val();
    var sortColumn = $("#sortColumn").val();

    getPage(currentPage, sortColumn, sortOrder, "SearchCriteriaChanged", "json");
    
    return false;
    
}

function ClearSearch( )
{
    $("#currentPage").val('1');
    var currentPage = $("#currentPage").val();
    var sortOrder = $("#sortOrder").val();
    var sortColumn = $("#sortColumn").val();
    
    var form = action + "SearchForm";
    
    $( "#" + form + ":input" ).each(
        function()
        {
            switch( this.type )
            {
                default: 
                case "text":
                    $( this ).val( '' );
                    break;
                
                case "checkbox":
                case "radio":
                    $(this).attr("checked", false);
                    break;
                
                case "button":
                case "submit":
                case "reset":
                case "password":
                    break;
            }
        });
    
    getPage(currentPage, sortColumn, sortOrder, "ClearSearch", "json");
}

function EmptyErrorLabelOnSuccess( inputName, labelName, type )
{
	switch( type )
	{
		case "text" :
			if( $.trim( $( "#" + inputName ).val( ) ).length  )
			{
				$( "label[for="+labelName+"]" ).html( "" );
			}
			break;
		case "radio" :
			if( $( 'input:radio[name='+inputName+']:checked' ).val( ) )
			{
				$( "label[for="+labelName+"]" ).html( "" );
			}
			break;
	}
}

function HandleControlTableValidation()
{
    $( "#ctSubmit" ).click( ValidateCT );
	
	$( "#ctName" ).blur(function() {
		$( "label[for='ctName']" ).html( "" );
	});
	
	$( "#ctDescription" ).blur(function() {
		$( "label[for='ctDescription']" ).html( "" );
	});
}

function ValidateCT( )
{
	$( "label[for='ctDescription']" ).html( "" );
	$( "label[for='ctName']" ).html( "" );
	
	var isCheckFailed = "1";
	if( !$.trim( $( "#ctName" ).val( ) ).length  )
    {
		$( "label[for='ctName']" ).html( "Please enter name" );
        isCheckFailed = "0";
    }
	if( !$.trim( $( "#ctDescription" ).val( ) ).length  )
    {
		$( "label[for='ctDescription']" ).html( "Please enter description" );
        isCheckFailed = "0";
    }
	if( $.trim( $( "#ctDescription" ).val( ) ) && $.trim( $( "#ctDescription" ).val( ) ).length > 200 )
    {
		$( "label[for='ctDescription']" ).html( "Description should not exceed 200 characters" );
        isCheckFailed = "0";
    }
	
	if( isCheckFailed == "0" )
	{
		return false;
	}
	return true;
}