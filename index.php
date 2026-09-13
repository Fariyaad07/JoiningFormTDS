<?php
ob_start();
ini_set('session.save_path', dirname(__FILE__) . '/session');
session_save_path(dirname(__FILE__) . '/session');

error_reporting(0);
ini_set('display_errors', 0);
define('EXT', '.php');


/*
|--------------------------------------------------------------------------
| APPLICATION ENVIRONMENT
|--------------------------------------------------------------------------
*/

define('ENVIRONMENT', 'production');

/*
|--------------------------------------------------------------------------
| ERROR REPORTING
|--------------------------------------------------------------------------
*/

switch (ENVIRONMENT)
{
    case 'development':
        error_reporting(0);
        ini_set('display_errors', 0);
    break;

    case 'testing':
    case 'production':
        error_reporting(0);
        ini_set('display_errors', 0);
    break;

    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1);
}

/*
|--------------------------------------------------------------------------
| SYSTEM DIRECTORY NAME
|--------------------------------------------------------------------------
*/

$system_path = 'system';

/*
|--------------------------------------------------------------------------
| APPLICATION DIRECTORY NAME
|--------------------------------------------------------------------------
*/

$application_folder = 'website/application';

/*
|--------------------------------------------------------------------------
| VIEW DIRECTORY NAME
|--------------------------------------------------------------------------
*/

$view_folder = '';

/* --------------------------------------------------------------------
 * END OF USER CONFIGURABLE SETTINGS. DO NOT EDIT BELOW THIS LINE
 * --------------------------------------------------------------------
 */

if (defined('STDIN'))
{
    chdir(dirname(__FILE__));
}

if (($_temp = realpath($system_path)) !== FALSE)
{
    $system_path = $_temp.DIRECTORY_SEPARATOR;
}
else
{
    $system_path = rtrim($system_path, '/\\').DIRECTORY_SEPARATOR;
}

if (! is_dir($system_path))
{
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your system folder path does not appear to be set correctly.';
    exit(3);
}

define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', $system_path);
define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('SYSDIR', basename(BASEPATH));

if (is_dir($application_folder))
{
    if (($_temp = realpath($application_folder)) !== FALSE)
    {
        $application_folder = $_temp;
    }

    define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);
}
else
{
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your application folder path does not appear to be set correctly.';
    exit(3);
}

define('VIEWPATH', APPPATH.'views'.DIRECTORY_SEPARATOR);

require_once BASEPATH.'core/CodeIgniter.php';