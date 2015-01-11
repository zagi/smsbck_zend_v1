<?php
    
    /*
     * app index file
     * author: michal[at]zagalski.pl
     **/

    //check if application path is defined, if false define it. realpath returns the canonicalized absolute pathname.
    defined('APPLICATION_PATH')
        || define('APPLICATION_PATH',
                  realpath(dirname(__FILE__) . '/../application'));

    //check if application env path is defined, if false define it. getenv gets the value of an env. variable or returns false if it not exists. 
    defined('APPLICATION_ENV')
        || define('APPLICATION_ENV',
                  (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
                                             : 'production'));
    
    set_include_path(implode(PATH_SEPARATOR, array(
        realpath(APPLICATION_PATH . '/../library'),
        get_include_path(),
    )));

    //zend application 
    require_once 'Zend/Application.php';

    //create application object
    $application = new Zend_Application(
        APPLICATION_ENV,
        APPLICATION_PATH . '/configs/application.ini'
    );

    //bootstrap and run
    $application->bootstrap()
                ->run();
?>