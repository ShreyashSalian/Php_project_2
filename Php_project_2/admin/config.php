<?php
//echo error_reporting(0);
// $SERVER_NAME = $_SERVER[ 'HTTP_HOST' ];
// define( 'BASE_DIR', '3-MONTH-TRAINNING' );
// define('MAIN_DIR','Adient');
// define( 'SITE_NAME', '' );
// define( 'DIR_SEPERATOR', '/' );
// define( 'CONFIG_DIR', 'config' );
// define( 'BASE_PATH', $SERVER_NAME . DIR_SEPERATOR . BASE_DIR . DIR_SEPERATOR . MAIN_DIR . DIR_SEPERATOR);

// define( 'BASE_URL', isset( $_SERVER[ 'localhost' ] ) && $_SERVER[ 'HTTPS' ] != 'off' ? 'https' . '://' . $_SERVER[ 'HTTP_HOST' ] . DIR_SEPERATOR . BASE_DIR . DIR_SEPERATOR : 'http' . '://' . $_SERVER[ 'HTTP_HOST' ] . DIR_SEPERATOR . BASE_DIR . DIR_SEPERATOR  );
// //echo BASE_URL."<br>";
// define( 'ADMIN_DIR', 'admin' );

// define( 'INCLUDE_DIR', 'includes' );
// define( 'ASSET_DIR', 'assets' );
// define( 'API_DIR', 'api');
// define( 'CORE_DIR', 'core' );
// define( 'EMPLOYEE_DIR', 'employee' );
// define( 'IMAGES_DIR', 'images' );
// define( 'BACKEND_DIR', 'admin' );
// define( 'UPLOAD_DIR', 'uploads' );
// define('ADMIN_VIEWS','views');
// //define('CUSTOMER_DIR','adient');

// // ============================= ADMIN SECTION========================================
// define( 'ADMIN_URL', BASE_URL . MAIN_DIR . DIR_SEPERATOR .BACKEND_DIR . DIR_SEPERATOR );
// define( 'ADMIN_JS_PATH', ADMIN_URL .  ASSET_DIR . DIR_SEPERATOR . 'js' . DIR_SEPERATOR);
// define( 'ADMIN_CSS_PATH', ADMIN_URL . ASSET_DIR . DIR_SEPERATOR . 'css' . DIR_SEPERATOR);
// define( 'ADMIN_UPLOAD_URL', ADMIN_URL . UPLOAD_DIR . DIR_SEPERATOR );
// define( 'ADMIN_IMAGES_URL', ADMIN_URL . ASSET_DIR . DIR_SEPERATOR . IMAGES_DIR . DIR_SEPERATOR);
// define('ADMIN_VIEWS_URL', ADMIN_URL . ADMIN_VIEWS . DIR_SEPERATOR );
// define('ADMIN_INCLUDE_URL', ADMIN_URL . INCLUDE_DIR . DIR_SEPERATOR );

// /* ---------------------------Includes */
// define( 'ADMIN_HEADER',  ADMIN_INCLUDE_URL . 'header.php');
// define( 'ADMIN_FOOTER', ADMIN_INCLUDE_URL . 'footer.php' );
// define( 'ADMIN_NAV', ADMIN_INCLUDE_URL . 'nav.php' );
// define( 'ADMIN_SCRIPT', ADMIN_INCLUDE_URL . 'script.php' );


// /*--------------------------- Core Files */
// define( 'CONNECTION_FILE', BASE_URL . BACKEND_DIR . DIR_SEPERATOR  . 'connection.php' );
// define( 'CONFIG_FILE', BASE_URL . BACKEND_DIR . DIR_SEPERATOR  . 'config.php' );


// // ADMIN FILE ===========================================================
// define('CHANGE_PASS', ADMIN_VIEWS_URL. 'change_password.php');
// define('DEPARTMENT_QUERY', ADMIN_VIEWS_URL. 'department_query.php');
// define('DEPARTMENT', ADMIN_VIEWS_URL. 'department.php');
// define('DISPLAY_VISITORS', ADMIN_VIEWS_URL. 'display_visitors.php');
// define('EDIT_USER', ADMIN_VIEWS_URL. 'edit_user.php');
// define('LIST_USER', ADMIN_VIEWS_URL. 'list_user.php');


// define('LOGIN', ADMIN_VIEWS_URL. 'login.php');
// define('LOGOUT', ADMIN_VIEWS_URL. 'logout.php');
// define('SEND_MAIL', ADMIN_VIEWS_URL. 'send_mail.php');
// define('SHOW_USER', ADMIN_VIEWS_URL. 'show_user.php');
// define('UPDATE_USERS', ADMIN_VIEWS_URL. 'update_users.php');
// define('USER_ACTION', ADMIN_VIEWS_URL. 'user_action.php');
// define('USER_PROFILE', ADMIN_VIEWS_URL. 'user_profile.php');
// define('VISITORS', ADMIN_VIEWS_URL. 'visitors.php');



// // ================================================= Admin js file=================================
// define('CHANGE_PASSWORD_JS', ADMIN_JS_PATH .'change_password.js');
// define('DEPARTMENT_JS', ADMIN_JS_PATH .'department.js');
// define('EMPLOYEERS_JS', ADMIN_JS_PATH.'employeers.js');
// define('QUERYLIST_JS', ADMIN_JS_PATH.'querylist.js');
// define('USER_PROFILE_JS', ADMIN_JS_PATH.'user_profile.js');
// define('USER_QUERY_JS', ADMIN_JS_PATH.'user_query.js');
// define('USER_JS', ADMIN_JS_PATH.'user.js');


// // ========================================== EMPLOYEERS FILE=========================================
// // ================ include====================
// define('EMPLOYEER_INCLUDE',ADMIN_URL . EMPLOYEE_DIR . DIR_SEPERATOR . 'include' . DIR_SEPERATOR);
// define('EMPLOYEER_VIEWS',ADMIN_URL . EMPLOYEE_DIR . DIR_SEPERATOR . 'views' . DIR_SEPERATOR);
// define('EMPLOYEER_NAV',EMPLOYEER_INCLUDE . 'navbar.php');
// define('EMP_CHANGE_PASSWORD', EMPLOYEER_VIEWS .'change_password.php');
// define('EMP_DEPARTMENT_LIST', EMPLOYEER_VIEWS .'department_list.php');
// define('EMP_DEPARTMENT', EMPLOYEER_VIEWS .'department.php');
// define('EMP_HOME', EMPLOYEER_VIEWS .'home.php');
// define('EMP_INDEX', EMPLOYEER_VIEWS .'index.php');
// define('EMP_PROFILE', EMPLOYEER_VIEWS .'profile.php');
// define('EMP_USERLIST', EMPLOYEER_VIEWS .'user_list.php');
// define('EMP_VISITOR', EMPLOYEER_VIEWS .'.php');
// /*Get User Path*/
// // define( 'FL_USERS', USERSCONTROLLER_PATH . 'Users.php' );
// // define( 'FL_SINGLEUSER', USERSCONTROLLER_PATH . 'SingleUser.php' );
// // define( 'FL_USERLOGIN', USERSCONTROLLER_PATH . 'UserLogin.php' );

// // =============================== VISTORS SIDE===========================================

// define( 'VISITOR_URL', BASE_URL . MAIN_DIR . DIR_SEPERATOR);
// define( 'VISITOR_JS_URL', VISITOR_URL.  ASSET_DIR. DIR_SEPERATOR . 'js' . DIR_SEPERATOR);
// define( 'VISITOR_CSS_URL',  VISITOR_URL . ASSET_DIR . DIR_SEPERATOR . 'css' . DIR_SEPERATOR);
// define( 'VISITOR_IMAGES_URL',  VISITOR_URL . ASSET_DIR . DIR_SEPERATOR . 'image' . DIR_SEPERATOR);
// define( 'VISITOR_UPLOAD_URL',  VISITOR_URL . UPLOAD_DIR . DIR_SEPERATOR);
// define( 'VISITOR_VIEWS_URL',  VISITOR_URL . ADMIN_VIEWS . DIR_SEPERATOR );
// define( 'VISITOR_INCLUDE_URL',  VISITOR_URL . INCLUDE_DIR . DIR_SEPERATOR );



// // ================================== visitor js===========================
// define('VISITOR_VALIDATION', VISITOR_JS_URL. 'visitors_validation.js');
// define('VISITOR_JS', VISITOR_JS_URL. 'visitors.js');

// //================================== VISITOR CSS FILE =====================
// define('VISITOR_LOGIN_CSS', VISITOR_CSS_URL. 'login.css');

// // ================================= VISITOR VIEWS==================
// define('APPOINT_VALID', VISITOR_VIEWS_URL. 'appoint_valid.php');
// define('VISITOR_APPOINTMENT', VISITOR_VIEWS_URL. 'appointment.php');
// define('VISITOR_INDEX', VISITOR_VIEWS_URL. 'index.php');
// define('VISITOR_LIST', VISITOR_VIEWS_URL. 'list.php');
// define('VISITOR_LOGIN', VISITOR_VIEWS_URL. 'login.php');
// define('VISITOR_LOGOUT', VISITOR_VIEWS_URL. 'logout.php');
// define('VISITOR_DETAIL', VISITOR_VIEWS_URL. 'visitors.php');


//Database
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PWD","");
define("DB_NAME","adient");
define("URL", "http://localhost/3-MONTH-TRAINNING/adient/admin/");
define("cust_URL", "http://localhost/3-MONTH-TRAINNING/adient/");


// define("DB_HOST", "localhost");
// define("DB_USER", "root");
// define("DB_PWD", "");
// define("DB_NAME", "adient");
// define("URL", "http://localhost/3-MONTH-TRAINNING/adient/admin/");
// define("cust_URL", "http://localhost/3-MONTH-TRAINNING/adient/");
//const url = "http://localhost/3-MONTH-TRAINNING/06_April_2021_PHP/admin";
//define( 'DBNAME', 'adient' );
//define( 'DBPREFIX', 'tbl_' );

//Table Names
// define( 'USER', 'user' );
// define( 'VISITORS', 'visitors' );
// define( 'DEPARTMENT', 'department' );




// $extra_js = array();
// $extra_css= array();

// require_once FL_CONNECTION;
// $connection = new connection();
// require_once FL_COMMON;
// $common = new common();
// if ( !session_id() ) {
//     $session_id = session_start();
// }









