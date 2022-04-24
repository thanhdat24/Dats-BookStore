<?php
// Hiển thị lỗi SQL

function db_sql_error($message, $query_string = "")
{
    global $con;

    $sqlerror = "<table width='100%' border='1' cellpadding='0' cellspacing='0'>";
    $sqlerror .= "<tr><th colspan='2'>{$message}</th></tr>";
    $sqlerror .= ($query_string != "") ? "<tr><td nowrap> Query SQL</td><td nowrap>: " . $query_string . "</td></tr>\n" : "";
    $sqlerror .= "<tr><td nowrap> Error Number</td><td nowrap>: " . mysqli_errno($con) . " " . mysqli_error($con) . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Date</td><td nowrap>: " . date("D, F j, Y H:i:s") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> IP</td><td>: " . getenv("REMOTE_ADDR") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Browser</td><td nowrap>: " . getenv("HTTP_USER_AGENT") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Script</td><td nowrap>: " . getenv("REQUEST_URI") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Referer</td><td nowrap>: " . getenv("HTTP_REFERER") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> PHP Version </td><td>: " . PHP_VERSION . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> OS</td><td>: " . PHP_OS . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Server</td><td>: " . getenv("SERVER_SOFTWARE") . "</td></tr>\n";
    $sqlerror .= "<tr><td nowrap> Server Name</td><td>: " . getenv("SERVER_NAME") . "</td></tr>\n";
    $sqlerror .= "</table>";
    $msgbox_messages = "<meta http-equiv=\"refresh\" content=\"9999\">\n<table class='smallgrey' cellspacing=1 cellpadding=0>" . $sqlerror . "</table>";
    echo $msgbox_messages;
    exit;
}

function db_query($query_string)
{
    global $con;
    $result = mysqli_query($con, $query_string);
    if (!$result) {
        db_sql_error('Query Error', $query_string);
    }
    return $result;
}

//Lấy một mảng trong database
function db_fetch_array($query_string)
{
    global $con;
    $result = array();
    $mysqli_result = db_query($query_string);
    while ($row = mysqli_fetch_assoc($mysqli_result)) {
        $result[] = $row;
    }
    mysqli_free_result($mysqli_result);
    return $result;
}

//Lấy số bản ghi
function db_num_rows($query_string)
{
    global $con;
    $mysqli_result = db_query($query_string);
    return mysqli_num_rows($mysqli_result);
}

function checkLogin($email, $password)
{
    $md5Pass = md5($password);
    $checkUser = db_num_rows("SELECT * FROM khachhang WHERE `email`='{$email}' AND `password` = '{$md5Pass}'");
    if ($checkUser > 0) {
        return true;
    } else {
        return false;
    }
}

function logout()
{
    unset($_SESSION['isLogin']);
    unset($_SESSION['userLogin']);
    unset($_SESSION['carts']);
    redirect("?page=home");
}

function isLogin()
{
    if (isset($_SESSION['isLogin'])) {
        return true;
    } else {
        return false;
    }
}

function userDetail($email)
{
    global $con;
    $sql = "SELECT *FROM khachhang WHERE Email='$email'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);
    return $result;
}

function checkUserExits($Email)
{
    $checkUserExits = db_num_rows("SELECT * FROM khachhang WHERE Email = '{$Email}'");
    if ($checkUserExits > 0) {
        return true;
    } else {
        return false;
    }
}
