<?php
class Pager
{
    public $rs;
    public $numberOfRows;
    public $sql;
    public $sortColumn;
    public $sortOrder;
    public $currentPage;
    public $pageSize;
    public $pagerRows;
    public $pagination;
    public $numberOfPages;
    public $noRecordsFound;
    public $excludeEscapeArray = array('id'=>'id');

    /*
     * Default Constructor. Sets the body to No records found
     */
    public function __construct( )
    {
        $body = "";
        $body .= '<tr class="dr-subtable-firstrow rich-subtable-firstrow" onmouseover="this.style.backgroundColor=\'#F8F8F8\'" onmouseout="this.style.backgroundColor=\'#FFFFFF\'">';
        $body .= '<td class="dr-subtable-cell rich-subtable-cell">No Records Found</td>';
        $body .= '</tr>';

        $this->noRecordsFound = $body;
    }

    /*
     * Renders the Datagrid
     *
     * @param {Object}  $rs     Active recordset
     */
    public function Render( )
    {
        $grid = $this->BuildGrid( );

        return $grid;
    }

    /*
     * Fetches the sql to be executed from the sql files and add the limiting conditions
     */
    public function FetchSql( )
    {
        /* Setup the sql to be executed concatenated with the sort expression,
         * the sort order and the limiting conditions
        */
        $sql = $this->sql;
        $sortColumn = $this->sortColumn;
        $sortOrder = $this->sortOrder;
        $this->currentPage = (intval($this->currentPage) <= 0) ? 1 : intval($this->currentPage);
        $page_number = ( $this->currentPage - 1 ) < 0 ? 0 : $this->currentPage - 1;
        $pageSize = empty( $this->pageSize ) ? LIST_PAGE_SIZE : $this->pageSize;

        $start_from = $page_number * $pageSize;
        
        $orderBy = "ORDER BY " . (($sortColumn) ? ($sortColumn+2) : 2 ) . " " . (($sortOrder) ? ($sortOrder) : "ASC" );

        $limit = " LIMIT $start_from, $pageSize ";

        $sort_expression = " $sortColumn ";

        $sql = "$sql $orderBy $limit";

        /* If the command to be executed is a select statement then also fetch
         * the number of recrods the query would've returned.
         */
        //$sql = preg_replace( "/SELECT/i", "SELECT SQL_CALC_FOUND_ROWS ", $sql, 1 );

        return $sql;
    }

    /* Build the header */
    private function BuildGrid( )
    {
        /* If current page is not set then use 1 as the current page. Happens
         * only on the first page
         */
        $this->currentPage = isset( $this->currentPage ) ? $this->currentPage : 1;
        
        $header = $body = "";
        
        /* Iterate through the recordset */
        if( $this->rs && sizeof($this->rs) > 0 )
        {            
            /* Fetch the number of columns in the selected recordset */
            $keys = array_keys($this->rs[0]);
            $ncols = count($keys);
            
            /* Setup the header of the table. Along with the required sorting
             * Expressions
             */
            $header = '<thead class="dr-table-thead">';
            $header .= '<tr class="dr-table-header rich-table-header  ">';
            
            for( $i = 0 ; $i < $ncols ; $i++ )
            {
                $field = $keys[$i];

                if( preg_match( "/input type=\"checkbox\"/", ($field) ) )
                    $fname = ($field);
                else
                    $fname = htmlspecialchars($field);

                if(strlen($fname)==0) $fname = '';

                $header .= '<th class="dr-table-headercell rich-table-headercell ">';

                if ( preg_match( "/input type=\"checkbox\"/", ($field) ) )
                    $header .= "$fname";
                else
                    $header .= '<a href="javascript: resort(' . $i . ');">' . $fname . '</a>';

                $header .= "</th>";
            }
            
            $header .= '</tr></thead>';

            /* Finished building the header. Build the body of the table */
            $body = "<tbody>";
            
            $count = 0;
            
            for( $i = 0 ; $i < count($this->rs) ; $i++ )
            {
                if($count%2 == 0)
                {
                    $body .= '<tr class="dr-subtable-firstrow rich-subtable-firstrow " onmouseover="this.style.backgroundColor=\'#DFEAFF\'" onmouseout="this.style.backgroundColor=\'#FFFFFF\'">';
                }
                else
                {
                    $body .= '<tr class="tr-subtable-cell " onmouseover="this.style.backgroundColor=\'#DFEAFF\'" onmouseout="this.style.backgroundColor=\'#F8F8F8\'">';
                }
                $count = $count + 1;
                
                for( $j = 0; $j < $ncols; $j++ )
                {
                    $v = $this->rs[$i][$keys[$j]];
                    
                    /* If you need to escape any more html do it here as another if */
                    /* Need to escape html in the pager */
                    if( trim(array_search( $i, $this->excludeEscapeArray )) == "" )
                    {
                        
                        if( preg_match( '/(<a.*?>)(.*)?(<\/a>)/', $v, $match ) ||
                           preg_match( '/(<span.*?>)(.*)?(<\/span>)/', $v, $match ) )
                        {
                            $v = $match[1] . htmlspecialchars( $match[2] ) . $match[3];
                        }
                        else if( preg_match( '/(<input type=\'checkbox\'.*?\/)/is', strtolower($v), $match ) )
                        {
                            
                        }
                        else if( preg_match( '/(<input type=\'hidden\'.*?>)/is', $v, $match ) )
                        {
                             
                        }
                        else if( preg_match( '/(<b.*?>)(.*)?(<\/b>)(.*)?/', $v, $match ) )
                        {
                            $v = $match[1] . htmlspecialchars( $match[2] ) . $match[3].$match[4];
                        }
                        else
                        {
                            $v = htmlspecialchars( $v );
                        }
                    }
                    

                    /* Clean HTML Only */
                    $body .= '<td class="dr-subtable-cell rich-subtable-cell ">' . $v . '</td>';
                }

                $body .= '</tr>';
            }
        

            $body .= "</tbody>";

            /* Finished building body. Build the pager */
            if( ceil( $this->numberOfRows / LIST_PAGE_SIZE ) > 1 )
            {
                $this->numberOfPages = ceil( $this->numberOfRows / LIST_PAGE_SIZE );
                $footer  = '<table cellspacing="0" cellpadding="0" border="0" align="left" class="dr-table" width="97%">';
                $footer .= '<tr>';

                /* Condition to make the blank, previous set, previous and first
                 * links disabled when in the first page set
                 */
                $disable_first = "";
                if( ( $this->currentPage - 1 ) == 0 || !isset( $this->currentPage ) )
                    $disable_first = "dr-dscr-button-dsbld rich-datascr-button-dsbld ";

                /* Calculate the start index of the page set */
                $start_index = (int)( $this->currentPage / NUMBER_OF_PAGE_LINKS );

                $start_index = $start_index * NUMBER_OF_PAGE_LINKS;

                /* Calcuate the Previous page set
                 * Logic:   We should've execeeded the first page set.
                 *          The edge case when the current page is divisible by
                 *          the NUMBER_OF_PAGE_LINKS should be handled.
                 */
                if( $this->currentPage > NUMBER_OF_PAGE_LINKS )
                if( (int)( $this->currentPage % NUMBER_OF_PAGE_LINKS ) != 0 )
                {
                    $previous_set = $start_index - NUMBER_OF_PAGE_LINKS + 1 . " - ";
                    $previous_set .= $start_index;
                }
                else
                {
                    $previous_set = $start_index - ( NUMBER_OF_PAGE_LINKS * 2 ) + 1 . " - ";
                    $previous_set .= $start_index - ( NUMBER_OF_PAGE_LINKS );
                }

                /* Build the first, previous and the previous set links */
                $footer .= '<td style="color:#003366; background-color:#ECF4FE;width:75%;" class="dr-subtable-cell">';
                $footer .= ' &nbsp;Page '.$this->currentPage.' of '.$this->numberOfPages.' &nbsp;&nbsp;&nbsp;';
                $footer .= '( '.$this->numberOfRows.' records )</td>';
                
                $footer .= '<td class="' . $disable_first . 'dr-dscr-button" id="nav_first' . $disable_first . '" title="First">&#171;&#171;</td>';
                $footer .= '<td class="' . $disable_first . 'dr-dscr-button" id="nav_previous' . $disable_first . '" title="Previous">&#171;</td>';
                

                if( $this->currentPage % NUMBER_OF_PAGE_LINKS == 0 )
                    $start_index = ( ( $this->currentPage / NUMBER_OF_PAGE_LINKS ) - 1 ) * NUMBER_OF_PAGE_LINKS;
                    
                /* Build the Next page set, Next and Last links. Logic same as above */
                if( ( $start_index + NUMBER_OF_PAGE_LINKS ) < ceil( $this->numberOfRows / LIST_PAGE_SIZE ) )
                {
                    $next_set = $start_index + 1 + NUMBER_OF_PAGE_LINKS . " - ";
                    if( $start_index + ( NUMBER_OF_PAGE_LINKS * 2 ) < $this->numberOfPages )
                        $next_set .= $start_index + ( NUMBER_OF_PAGE_LINKS * 2 );
                    else
                        $next_set .= $this->numberOfPages;
                }

                $disable_last = "";
                if( ( $this->currentPage ) == ceil( $this->numberOfRows / LIST_PAGE_SIZE ) )
                    $disable_last = "dr-dscr-button-dsbld rich-datascr-button-dsbld ";

                /* Render the next page set, next and last page links */                
                $footer .= '<td class="' . $disable_last . 'dr-dscr-button" id="nav_next' . $disable_last . '" title="Next">&#187;</td>';
                $footer .= '<td class="' . $disable_last . 'dr-dscr-button" id="nav_last' . $disable_last . '" title="Last">&#187;&#187;</td>';
                $footer .= '</tr>';
                $footer .= '</table>';

                /* End pagination */
                $this->pagination = $footer;
            
            }
        }
        else
        {
            /* Case when no records are found */
            $body .= '<tr class="dr-subtable-firstrow rich-subtable-firstrow " onmouseover="this.style.backgroundColor=\'#F8F8F8\'" onmouseout="this.style.backgroundColor=\'#FFFFFF\'">';
            $body .= '<td class="dr-subtable-cell rich-subtable-cell ">No Records Found</td>';
            $body .= '</tr>';
        }

        /* Return concatenated header and body */
        $this->pagerRows = "$header$body";
        
        return;
    }
}
?>