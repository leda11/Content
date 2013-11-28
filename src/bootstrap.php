<?php
/**
* Bootstrapping, setting up and loading the core.
*
* @package HandyCore
*/

/**
* Enable auto-load of class declarations.
*/
function autoload($aClassName) {
  $classFile = "/src/{$aClassName}/{$aClassName}.php";
   $file1 = HANDY_SITE_PATH . $classFile;
   $file2 = HANDY_INSTALL_PATH . $classFile;
   
   if(is_file($file1)) {
      require_once($file1);
   } elseif(is_file($file2)) {
      require_once($file2);
   }
}
spl_autoload_register('autoload');

//--------------------------------------------------------------------------------

/**
* Helper, wrap html_entites with correct character encoding mom03
*/
function htmlent($str, $flags = ENT_COMPAT) {
  return htmlentities($str, $flags, CHandy::Instance()->config['character_encoding']);
}
//--------------------------------------------------------------------------------

/**
* Helper, make clickable links from URLs in text.
*/
function makeClickable($text) {
  return preg_replace_callback(
    '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#',
    create_function(
      '$matches',
      'return "<a href=\'{$matches[0]}\'>{$matches[0]}</a>";'
    ),
    $text
  );
}

//--------------------------------------------------------------------------------

/**
    * Set a default exception handler and enable logging in it.
    */
    function exception_handler($exception) {
      echo "Handy: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
    }
    set_exception_handler('exception_handler');// que?
//--------------------------------------------------------------------------------    
 //Helper, interval formatting of times. Needs PHP5.3. 
 //function formatDateTimeDiff($start, $startTimeZone=null, $end=null, $endTimeZone=null) {   
//--------------------------------------------------------------------------------    
 //function getIncludeContents($filename, $vars=array()) {   
