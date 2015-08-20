<?php

class HttpUtils
{
    /*
     * Get XHTML from html string
     *
     * @param   {String}    $html   html string to be re-written into xhtml
     * @return  {SimpleXMLElement}    xhtmlized html
     */
    function GetXML( $html )
    {
		// Specify configuration
		$config = array('output-xml'  => true,
										'numeric-entities' => true,
										'hide-comments' => true);

		// Tidy
		$tidy = new tidy;
		$tidy->parseString($html, $config, 'utf8');
		$tidy->cleanRepair( );
		$xHTML = $tidy->html( );

		return ( new SimpleXMLElement( $xHTML ) );
	}

    /*
     * Get HTML given a url
     *
     * @param   {String}    $url    URL to fetch html from
     * @param   {Array}     $vars   POST/GET parameters to be sent to the url
     * @param   {Array}     $string_tags    Optional parameter. Tags to strip
     *                                      from the html in the format
     *                                      tag => replacement
     * @return  {String}    HTML from the url
     */
    function GetHTML( $url, $vars, $strip_tags = array() )
    {
        /* Make the call to curl to fetch the string */
		$html = $this->curl_string( $url, $vars );

        /* Replace each unwanted tag with the corresponding tag */
		foreach( $strip_tags as $pattern => $replace )
			$html = preg_replace( $pattern, $replace, $html );

		return $html;
    }

    /*
     * Post/Get url with the specified params
     *
     * @param   {String}    $url        Url to GET/POST
     * @param   {Array}     $vars       Params to post to the url
     * @param   {Boolean}   $isHTTPS    isHTTPS or HTTP call
     *
     * @return  {string}    html string from the GET/POST
     */
    function curl_string( $url, $vars, $isHTTPS = false )
    {
	$ch = curl_init();
	$user_agent = "Mozilla/5.0";
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_USERAGENT, $user_agent );
	curl_setopt( $ch, CURLOPT_COOKIEJAR, "c:\cookie.txt" );
	curl_setopt($ch, CURLOPT_COOKIEFILE, "c:\cookie.txt" );
	curl_setopt( $ch, CURLOPT_HEADER, 0 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
	curl_setopt( $ch, CURLOPT_TIMEOUT, 120 );
	curl_setopt( $ch, CURLOPT_ENCODING, "UTF-8" );

        if( $isHTTPS )
        {
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
        }

	if ( $vars )
        {
	    curl_setopt( $ch, CURLOPT_POST, 1 );
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $vars );
	}

	$result = curl_exec( $ch );

	curl_close( $ch );

	return $result;
    }
}

?>
