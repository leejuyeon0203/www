<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">
	<title>회원가입</title>
	<link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="../member/css/member_form.css">
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	
	<script>
        

        function check_nick() {
            window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
                "NICKcheck",
                "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
        }

        function check_input() {
            if (!document.member_form.pass.value) {
                alert("비밀번호를 입력하세요");
                document.member_form.pass.focus();
                return;
            }

            if (!document.member_form.pass_confirm.value) {
                alert("비밀번호확인을 입력하세요");
                document.member_form.pass_confirm.focus();
                return;
            }

          

            if (!document.member_form.nick.value) {
                alert("닉네임을 입력하세요");
                document.member_form.nick.focus();
                return;
            }

            if (!document.member_form.hp2.value || !document.member_form.hp3.value) {
                alert("휴대폰 번호를 입력하세요");
                document.member_form.nick.focus();
                return;
            }

            if (document.member_form.pass.value !=
                document.member_form.pass_confirm.value) {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
                document.member_form.pass.focus();
                document.member_form.pass.select();
                return;
            }

            document.member_form.submit();
        }

        function reset_form() {
            document.member_form.id.value = "";
            document.member_form.pass.value = "";
            document.member_form.pass_confirm.value = "";
            document.member_form.name.value = "";
            document.member_form.nick.value = "";
            document.member_form.hp1.value = "010";
            document.member_form.hp2.value = "";
            document.member_form.hp3.value = "";
            document.member_form.email1.value = "";
            document.member_form.email2.value = "";

            document.member_form.id.focus();

            return;
        }
    </script>
	
</head>
<?
    //$userid='aaa';
    
    include "../../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>

    <div class="wrap">
        <article id="content">
            <h2><a href="../index.html"><span>BLUE</span> SQUARE</a></h2>
            <form name="member_form" method="post" action="modify.php" class="memberForm joinBox">
                    <label class="hidden">회원정보 수정</label>
                    <div class="idBox idBox2">
                        <p class="hidden">아이디</p>
                        <p>aaa</p><!-- 로그인 된 상태-->
                        <span>한번 등록한 아이디는 변경이 불가능 합니다.</span>
                    </div>
                    <div class="pwBox">
                        <label for="pass" class="hidden">비밀번호</label>
                        <input type="password" name="pass" id="pass" required value="" class="mb10 pwBg1" placeholder="비밀번호" title="비밀번호">
                        <label for="pass_confirm" class="hidden">비밀번호 확인</label>
                        <input type="password" name="pass_confirm" id="pass_confirm" class="pwBg2" placeholder="비밀번호 재확인" required value="" title="비밀번호 재확인">
                    </div>
                    <div class="nameBox">
                        <label for="name" class="hidden">이름</label>
                        <input type="text" name="name" id="name" title="이름" placeholder="이름" required value="">
                    </div>
                    <div class="nameBox nameBox1">
                        <label for="nick" class="hidden">닉네임</label>
                        <input type="text" name="nick" id="nick" required value="" placeholder="닉네임" title="닉네임">
                        <span id="loadtext2"></span> <!-- 실시간 메세지를 찍기 위해 -->
                    </div>
                    <div class="telBox">
                        <label class="hidden" for="hp1">전화번호 앞3자리</label>
                        <select name="hp1" id="hp1" title="휴대폰 앞 세자리를 선택하세요.">
                            <option>010</option>
                            <option>011</option>
                            <option>016</option>
                            <option>017</option>
                            <option>018</option>
                            <option>019</option>
                        </select> ㅡ
                        <label class="hidden" for="hp2">연락처 둘째 자리</label>
                        <input type="text" class="hp" name="hp2" id="hp2" title="연락처 둘째 자리를 입력하세요." required value="1111"> ㅡ <label class="hidden" for="hp3">연락처 셋째 자리</label>
                        <input type="text" class="hp" name="hp3" id="hp3" title="연락처 셋째 자리를 입력하세요." required value="0000">
                    </div>
                    <div class="mailBox">
                        <label for="email1" class="hidden">이메일</label>
                        <input type="text" id="email1" title="이메일 앞자리" name="email1" placeholder="1234"  required value="">@
                        <label class="hidden" for="email2">이메일주소</label>
                        <input type="text" name="email2" id="email2" title="이메일 뒷자리" required value="0000">
                    </div>
                    <div class="subMit">
                        <input type="button" id="submitGo" onclick="check_input()" value="회원정보 수정완료" title="회원정보 수정완료">
                    </div>
            </form>
        </article>
    </div>
</body>
</html>


