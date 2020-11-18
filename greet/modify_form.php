<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
   //세션변수 4
    //num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>블루스퀘어-북파크</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub2/common/css/sub2common.css">

    <link rel="stylesheet" href="css/greet.css">

    <script src="https://kit.fontawesome.com/23c3575424.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
        <script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>

<body>
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

  <div id="content2">
	<div id="col2">
	    <div id="write_form_title">
                    <h3>게시물 수정</h3>
                </div>        
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1"> 닉네임 </div>
				<div class="col2"><?=$usernick?></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button">
                        <a href="#" onclick="check_input()">SUBMIT</a>
                        <a href="list.php?table=news&page=">LIST</a>
                    </div>
		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content2 -->
    <? include "../common/sub_foot.html" ?>
</body>
</html>