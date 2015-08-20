function trim(str)
{
    return str.replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,"");
}

function fulltrim(str)
{
    return str.replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,"").replace(/\s+/g," ");
}


function isNumber( sString )
{
    var regNumberTest = new RegExp();
    
    regNumberTest.compile(/^[0-9]+$/);

    if( !regNumberTest.test( sString ) )
        return false;

    return true;
}

function isDecimal( sString )
{
    var decimalCheck = new RegExp();
    decimalCheck.compile(/^\d+(\.\d+)?$/);

    if( !decimalCheck.test( sString ) )
        return false;

    return true;
}

function echeck(str)
{
    //alert("email");
    var email = str;
    //alert(email);

    var emailPat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.search(emailPat))
    {
        //alert("Enter correct format for email");
        return false;
    }

    return true;

}

function isValidURL(urlStr)
{
    if (urlStr.indexOf(" ")!=-1)
    {
        //alert("Spaces are not allowed in a URL");
        return false;
    }

    if(urlStr==""||urlStr==null)
    {
        return false;
    }

    urlStr = urlStr.toLowerCase();
    var specialChars="\\(\\)><@,;:\\\\\\\"\\.\\[\\]";
    var validChars="\[^\\s" + specialChars + "\]";
    var atom=validChars + '+';
    var urlPat=/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?/;
    var matchArray=urlStr.match(urlPat);

    if (matchArray==null)
    {
        return false;
    }

    return true;
}