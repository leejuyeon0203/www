<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>블루스퀘어-북파크 정보안내</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub2/common/css/sub2common.css">
    <link rel="stylesheet" href="css/greet.css">
    <script src="https://kit.fontawesome.com/23c3575424.js" crossorigin="anonymous"></script>
    <script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>
<? include "../common/sub_head.html" ?>
    <!-- 메인비주얼영역 -->
    <div class="visual">
        <img src="../sub2/common/images/sub_visual.jpg" alt="비주얼이미지">
        <h3>Book Park</h3>
        <p>북파크는 책과 강연 그리고 프리미엄 라운지를 제공합니다.</p>
    </div>

    <!-- 서브네비영역 -->
    <div class="subNav">
        <ul>
            <li><a id="nav1" href="../sub2/sub2_1.html">Book park</a></li>
            <li><a id="nav2" href="../sub2/sub2_2.html">Bookpark lounge</a></li>
            <li><a id="nav3" class="current" href="../greet/list.php">Bookpark Info</a></li>
        </ul>
    </div>
    <div id="content">
        <div class="title_area">
            <div class="lineMap">
                <span>home</span> &gt; <span>Book Park</span> &gt; <strong>Bookpark Info</strong>
            </div>
            <div class="title">
                <h2>Bookpark Info</h2>
                <p>책과 공연 그리고 프리미엄 라운지</p>
            </div>
        </div>
    </div>
        <div id="header">
            <? include "../lib/top_login2.php"; ?>
        </div> <!-- end of header -->

        <div id="menu">
            <? include "../lib/top_menu2.php"; ?>
        </div> <!-- end of menu -->

        <div id="content2">
            <div id="col1">
                <div id="left_menu">
                    <?
			include "../lib/left_menu.php";
?>
                </div>
            </div>

            <div id="col2">

                <div id="title">
                    <!--<img src="../img/title_greet.gif">-->
                </div>

                <div id="view_comment"> &nbsp;</div>

                <div id="view_title">
                    <div id="view_title1"><?= $item_subject ?></div>
                    <div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>
                        | <?= $item_date ?> </div>
                </div>

                <div id="view_content">
                    <?= $item_content ?>
                </div>

                <div id="view_button">
                    <a href="list.php?page=<?=$page?>">LIST</a>&nbsp;
                    <? 
                        if($userid==$item_id || $userlevel==1 || $userid=="master")
                        {
                    ?> 
                    <!--userid=현재 로그인한 아이디 / item_id=글을 쓴 아이디 -->
                    <!--userid=="master" >> 유저아이디 'master'인 사람만 글을 관리 할 수 있음 // 'master'부분은 바꾸기가능-->
                    <a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">MODIFY</a>&nbsp;
                    <a href="javascript:del('delete.php?num=<?=$num?>')">DELETE</a>&nbsp;
                    <?
	}
?>
                    <? 
	if($userid )  //로인인이 되면 글쓰기
	{
?>
                    <a href="write_form.php">WRITE</a>
                    <?
	}
?>
                </div>

                <div class="clear"></div>

            </div> <!-- end of col2 -->
        </div> <!-- end of content2 -->
    <? include "../common/sub_foot.html" ?>
</html>
