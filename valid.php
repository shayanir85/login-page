<!DOCTYPE html>
<html  lang="en">
<head>
    <?php
    session_start();
    $_SESSION['num'] = 8000;
    if (isset($_COOKIE['phone']) && strlen($_COOKIE['phone']) == 11) {
        echo '<meta http-equiv="refresh" content="0 url=webpage.php">';
        exit;
    }else{
        $_COOKIE['phone'] = '';
        $_COOKIE['name'] = '';
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['FullName'])
            && isset($_POST['Pass'] )){

                // if($pass == $found[1] && $fullname == $found[0]){
                //          $_SESSION['name'] = $found[0];
                //          $_SESSION['phone'] = $found[2];
                //          echo '<p class="alert alert-success font mx-auto text-center mt-2 col col-6"> با موفقیت وارد شدید</p>';
                //          echo '<meta http-equiv="refresh" content="1 url=webpage.php">';
                //          die('<div class="loader"></div>');
                //      } else {
                //          echo '<p class="alert alert-danger font mx-auto text-center mt-2 col col-6"> نام کاربری یا رمز عبور اشتباه است</p>';
                //      }
                $Rfile = fopen('database.txt','r');
                //for($i = 0; $i<$_SESSION['num'] ; $i++){}
                    $read = fgets($Rfile,filesize("database.txt"));
                    $fullname = $_POST['FullName'];
                    $pass = $_POST['Pass'];
                    $found = explode(',',$read);
                    if($pass == $found[1] && $fullname == $found[0]){
                        $_COOKIE['name'] = $found[0];
                        $_COOKIE['phone'] = $found[2];
                        setcookie('phone',$found[2],time() + (86400*30),'/');
                        setcookie('name',$found[0],time() + (86400*30),'/');
                            }
                        echo '
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                    
                    <body class="bg-dark">
                    <p class="alert alert-success font mx-auto text-center mt-2 col col-6"> با موفقیت وارد شدید</p>
                    </body>
                    ';
                    
                    echo '<meta http-equiv="refresh" content="1 url=webpage.php">';
                    die('<div class="loader"></div>');
                } else {
                    echo '<p class="alert alert-danger font mx-auto text-center mt-2 col col-6"> نام کاربری یا رمز عبور اشتباه است</p>';
                }
                fclose($Rfile);
                }
                

    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" >
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>
<body class="bg-dark text-white">
    <form id="myForm" class="row col col-6 bg-light rounded shadow text-dark text-center mx-auto m-5 p-4" action="" onsubmit="ajax()" method="POST">
        <div>
            <label class="font m-2" for="FullName" >: نام و نام خانوادگی </label><br>
            <input id="FullName" name="FullName" style="direction: rtl;" class="border border-0 shadow rounded col-9 font" type="text" >
        </div>
        <div>
            <label class="font m-2" for="Pass" >:  رمز عبور   </label><br>
            <span id="toggle" class="col col-2 btn btn-primary p-1" ><i id="toggler"class=" far fa-eye"></i></span>
            <input id="Pass" name="Pass" style="direction: rtl;" class="col border border-0 shadow col-9 rounded font " type="password" >
        </div>
        <div class="font">
            <button id="btn"  type="submit" class=" mt-5 col-12 mx-auto btn btn-primary">
                 ورود
            </button>
        </div>
        <a href="index.php" class="hov text-center mt-4" style="text-decoration: none; color:black">
            <h6 class="hov font mx-auto">
                حساب کاربری ندارم
            </h6>
        </a>
    </form>
    <p id="alert" class="mx-auto text-center"></p>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="index.js"></script>
    <script>
        function ajax(){ 
            const xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
            if(xml.readyState == 0 && xml.status == 200){
                console.log('success');
            }}
            xml.open('POST','valid.php');
            xml.send();
         }
    setInterval(responsive,100);
    var password = document.getElementById('Pass');
    var toggler = document.getElementById('toggler');
    var toggle = document.getElementById('toggle');
    showHidePassword = () => {
    if (password.type == 'password') {
    password.setAttribute('type', 'text');
    toggler.classList.add('fa-eye-slash');
    } else {
    toggler.classList.remove('fa-eye-slash');
    password.setAttribute('type', 'password');
    }
    };
    toggle.addEventListener('click', showHidePassword);
    </script>
</body>
</html>