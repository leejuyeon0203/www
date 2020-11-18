<?
session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">
    <title>블루스퀘어-로그인</title>
    <link rel="stylesheet" href="css/member.css">
</head>
<body>
    <div id="wrap">
        <div class="hbox">
            <h1>
                <a href="../index.html"><span>BLUE</span> SQUARE</a>
            </h1>
        </div>
        <div class="content">
            <form name="member_form" method="post" action="login.php">
                <ul>
                    <li><input type="text" class="idbox" name="id" title="유저 아이디" placeholder="아이디"></li>
                    <li><input type="password" class="pwbox" name="pass" title="비밀번호" placeholder="비밀번호"></li>
                </ul>
                <input class="login_button" type="submit" title="로그인" value="로그인">
                <p>아직 회원이 아니신가요?&nbsp;&nbsp;&nbsp;<span><a href="../member/join.html">회원가입</a></span></p>
            </form>
            <!--login-->
        </div> <!-- content-->
    </div>
    <!--wrap-->
</body>
</html>