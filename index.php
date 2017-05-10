


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>

<?php
session_start();


function loginForm()
{
    include_once('login.html');
}

if(isset($_SESSION['name']))
{
    session_destroy();
    session_start();
}

if(isset($_POST['enter']))
{
    if($_POST['name'] !="")
    {
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else
    {
        echo '<span class="error">Please type in a name</span>';
    }
}

if(!isset($_POST['name']) || empty($_POST['name']))
{
    loginForm();
}
else
{
    include('chatbox.php');
}

if(isset($_GET['logout']))
{

    include_once('log-leave.php');
    session_destroy();
    header("Location: index.php"); //Redirect user
}

?>


 
</body>
</html>