<!DOCTYPE html>
<html  lang="en">
<head>
    <?php
    // $cookie_name = 'user';
    // $cookie_value = 1234;
    // setcookie($cookie_name,$cookie_value,time()+(86400*30),"/");
    // echo 'cookie name is : '.$cookie_name.' and cookie value is : '.$cookie_value;    
    session_start();
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["FullName"])
            or isset($_POST["Email"])
            or isset($_POST["Phone"])
            or isset($_POST["Pass"])
            or isset($_POST["Cpass"])){
            $fullname = $_POST["FullName"];
            $email = $_POST["Email"];
            $phone = $_POST["Phone"];
            $pass = $_POST["Pass"];
            $cpass = $_POST["Cpass"];
            if(check($fullname,$email,$phone,$pass,$cpass)){
                header("location: webpage.php");
                $txt = fopen("database.txt","a")or die("corrently we are unable to open this shit");
                fwrite($txt,$fullname.','.$pass.','.$phone.','.$email."\n");
                fclose($txt);
                $_COOKIE['name'] = $fullname;
                $_COOKIE['phone'] = $phone;
                setcookie('name',$fullname,time() + (86400*30),'/');
                setcookie('phone',$phone,time() + (86400*30),'/');
                die();
            }
        }
    }
    function check($fullname,$email,$phone,$pass,$cpass){
         if (empty($cpass)||
         empty($pass) ||
         empty($phone)||
         empty($phone)||
         empty($email)||
         empty($fullname)) {
            return false;
        } 
        if ($pass != $cpass) {
            return false;
        } 
        if (substr($phone, 0, 2) != '09') {
            return false;
        } 
        if (strlen($phone) != 11) {
            return false;
        } 
        if (strlen($pass) < 8) {
            return false;
        } 
        return true;
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
            <label class="font m-2" for="Email"  >: ایمیل </label><br>
            <input id="Email" name="Email" class="border border-0 shadow rounded font col-9"  type="email" >
        </div>
        <div>
            <label class="font m-2" for="Phone" >: شماره موبایل   </label><br>
            <input id="Phone" name="Phone" class="border border-0 shadow col-9 rounded font" placeholder="0911****357" type="tel" >
        </div>
        <div>
            <label class="font m-2" for="Pass" >:  رمز عبور   </label><br>
            <span id="toggle" class="col col-2 btn btn-primary p-1" ><i id="toggler"class=" far fa-eye"></i></span>
            <input id="Pass" name="Pass" style="direction: rtl;" class="col border border-0 shadow col-9 rounded font " type="password" >
        </div>
        <div>
            <label class="font m-2" for="Cpass" >:  تکرار رمز عبور   </label><br>
            <input id="Cpass" name="Cpass" style="direction: rtl;" class="border border-0 shadow col-9 rounded font " type="password" >
        </div>
        <div class="font">
            <button id="btn" disabled type="submit" class=" mt-5 col-12 mx-auto btn btn-primary">
                 ورود
            </button>
        </div>
        <a href="http://localhost/php/login%20page%20ajax/valid.php" class="hov text-center mt-4" style="text-decoration: none; color:black">
            <h6 class="hov font mx-auto">
                حساب کاربری دارم
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
            xml.open('POST','index.php');
            xml.send();
         }
    setInterval(responsive,100);
    function check() {
        const fullname = $('#FullName').val();
        const email = $('#Email').val();
        const phone = $('#Phone').val();
        const pass = $('#Pass').val();
        const cpass = $('#Cpass').val();

        if (!fullname) {
            $('#alert').html('<p class="col col-6 alert alert-primary mx-auto font">نام و نام خانوادگی را وارد کنید</p>');
        } else if (!email) {
            $('#alert').html('<p class="col col-6 alert alert-primary mx-auto font">ایمیل را وارد کنید</p>');
        } else if (!phone) {
            $('#alert').html('<p class="col col-6 alert alert-primary mx-auto font">شماره را وارد کنید</p>');
        } else if (!pass) {
            $('#alert').html('<p class="col col-6 alert alert-primary mx-auto font">رمز عبور را وارد کنید</p>');
        } else if (!cpass) {
            $('#alert').html('<p class="col col-6 alert alert-primary mx-auto font">تکرار رمز عبور را وارد کنید</p>');
        } else {
            if(pass != cpass){
                $('#alert').html('<p class="col col-6 alert alert-primary mx-auto font">تکرار رمز عبور اشتباه است </p>');
            }else if(phone.substring(0,2) != '09'){
                $('#alert').html('<p class="col col-6 alert alert-primary mx-auto font">شماره اشتباه است </p>');
            }else if(phone.length != 11){
                $('#alert').html('<p class="col col-6 alert alert-primary mx-auto font">شماره اشتباه است </p>');
            }
            else if(pass.length < 8){
                $('#alert').html('<p class="col col-6 alert alert-primary mx-auto font"> رمز عبور شما حداقل بیشتر از هشت کاراکتر باشد </p>');
            }else{
                $('#alert').html('<p class="col col-6 alert alert-success mx-auto font">وارد شدید است </p>');
                return true;
            }
        }
    }
    function check_check(){
        if(check() == true){
            $("#btn").prop('disabled', false);
            
        }
    }
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
    setInterval(check_check,100);
    </script>

</body>
</html>