<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);
		$row = mysql_fetch_array($result);       
	
        $kinds   = $row[kinds];
		$item_subject = $row[subject];
		$item_content = $row[content];
		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>BlueSquare - inquire</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub4/common/css/sub4common.css">
    <link rel="stylesheet" href="css/free.css">

    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/23c3575424.js" crossorigin="anonymous"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]--> 
    <script>
      function check_input()
       {
          if (!document.board_form.subject.value)
          {
              alert("제목을 입력하세요1");    
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
        <img src="../sub4/common/images/sub_visual.jpg" alt="비주얼이미지">
        <h3>Rental</h3>
        <p>희망과 행복의 온도를 높이는 블루스퀘어 입니다.</p>
    </div>
        
    <!-- 서브네비영역 -->
    <div class="subNav">
        <ul>
            <li><a id="nav1" href="../sub4/sub4_1.html">Rental facility</a></li>
            <li><a id="nav2" href="../sub4/sub4_2.html">Rental guide</a></li>
            <li><a id="nav3" class="current" href="../free/list.php">Rental guide</a></li>
        </ul>
    </div>  

<!-- 본문콘텐츠영역 -->
<article id="content">
    <div class="title_area">
           <div class="lineMap">
               <span>home</span> &gt; <span>Rental</span> &gt; <strong>Rental facility</strong>
           </div>
           <div class="title">
               <h2>free</h2>
               <p>예술이 향휴되는 공간 블루스퀘어 입니다</p>
            </div>
        </div>
        
    <div class="content_area">
        <div id="write_form_title">문의글쓰기</div>
		<div class="clear"></div>
<?
	if($mode=="modify")
	{
?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
			<div id="write_row1">
			    <div class="col1">글쓴이</div>
			    <div class="col2"><?=$usernick?></div>	
			</div>
			
			<!--<div id="write_row2_1">
                <div class="col1">문의유형</div>
                <div class="col2">
                    <select name="kinds" class="kinds">
                        <option value=' '>선택</option>
                        <option value='이용관련'>이용관련</option>
                        <option value='회원관련'>회원관련</option>
                        <option value='자원봉사관련'>자원봉사관련</option>
                        <option value='교육관련'>교육관련</option>
                    </select>
                </div>
            </div>-->
			
			<div id="write_row2">
                <div class="col1">제목</div>
                <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" placeholder="문의합니다" required></div>
			</div>
			<div id="write_row3">
                <div class="col1">내용</div>
                <div class="col2">
                    <textarea rows="15" cols="79" name="content"><?=$item_content?></textarea>
                </div>
			</div>
			<!--<div id="write_row4">
                <div class="col1">이미지파일1</div>
                <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
			<div class="clear"></div>
<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div id="write_row5">
                 <div class="col1"> 이미지파일2  </div>
                 <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
			<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="clear"></div>
			<div id="write_row6">
                 <div class="col1"> 이미지파일3   </div>
                 <div class="col2"><input type="file" name="upfile[]"></div>
			</div>-->
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<div class="clear"></div>
		</div>
        
		<div id="write_button">
            <a href="#" onclick="check_input()">Submit</a>
            <a href="list.php?table=<?=$table?>&page=<?=$page?>">List</a>
		</div>
		</form>

    </div>
</article>
<? include "../common/sub_foot.html" ?>
</body>
</html>