<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// mysqli_report(MYSQLI_REPORT_ALL);

require_once "../functions.php";


if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $password = "";
    $username_err = $password_err = $login_err = "";
 
    if(empty(trim($_POST["username"]))) {
        $username_err = "0";
        header("Location: ../signin.php?error=0");
        exit;
    } else {
        $username = strtolower(trim($_POST["username"]));
    }
    
    if(empty(trim($_POST["password"]))) {
        $password_err = "1";
        header("Location: ../signin.php?error=1");
        exit;
    } else {
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)) {
        if(putenv('LDAPTLS_REQCERT=never')) {
            $ldapConnection = ldap_connect('10.230.56.67');

            if(!$ldapConnection) {
                header("Location: ../signin.php?error=3");
            } else {			
                ldap_set_option($ldapConnection, LDAP_OPT_PROTOCOL_VERSION, 3);
                ldap_set_option($ldapConnection, LDAP_OPT_REFERRALS, 0);

                $ldapParams = ldap_bind($ldapConnection, "CENTRAS\\" . $username, $password);	

                if($ldapParams) {
                    $ldapFilter = "(samaccountname=" . $username . ")";
                    $ldapAttributes = array("memberof", "|", "givenname", "|", "sn", "|", "mail", "|", "department", "|", "title");

                    $accountSearch = ldap_search($ldapConnection, "CN=Users,DC=sav,DC=kaunas,DC=lt", $ldapFilter, $ldapAttributes);

                    if($accountSearch) {
                        $info = ldap_get_entries($ldapConnection, $accountSearch);

                        $admin_grupes = [
                            1 => [
                                "CN=Sk_Informatika,OU=Skyriai,DC=sav,DC=kaunas,DC=lt",
                            ],
                            2 => [
                                "CN=Sk_ViesiejiRysiai,OU=Skyriai,DC=sav,DC=kaunas,DC=lt",
                            ]
                        ];
                
                        if(isset($info[0]['memberof'])) {
                            $i = 0;
                            
                            while(isset($info[0]['memberof'][$i])) {
                                $grupe = $info[0]['memberof'][$i];

                                @session_start();
                                $_SESSION[SESSION_ID]["loggedin"] = true;
                                $_SESSION[SESSION_ID]["username"] = $username;
                                $_SESSION[SESSION_ID]["company_name"] = $info[0]['givenname'][0] . ' ' . $info[0]['sn'][0];
                                $_SESSION[SESSION_ID]["skyrius"] = $info[0]['department'][0];
                                $_SESSION[SESSION_ID]["email"] = $info[0]['mail'][0];
                                $_SESSION[SESSION_ID]["selected"] = 0;

                                foreach ($admin_grupes as $key => $groups) {
                                    if (in_array($grupe, $groups)) {
                                        $_SESSION[SESSION_ID]['admin'] = 1;
                                        break; 
                                    }
                                }

                                $i++;
                            }

                            if($_SESSION[SESSION_ID]['admin'])
                                header("location: ../index.php");
                            else 
                                header("location: ../signout.php");
                        }
                    }   
                } else {
                    header("Location: ../signin.php?error=2");
                }
            }
        }
    }
} else {
    header('Location: ../signin.php');
    exit;
}