<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$ripple = "free_ripple";

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);       
	
    $item_kinds   = $row[kinds];
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];
	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$item_content = $row[content];
	$is_html      = $row[is_html];
    
    $sql = "select * from $ripple where parent=$item_num";
    $result2 = mysql_query($sql, $connect);
    $num_ripple = mysql_num_rows($result2);


	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}
	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
        function check_input() {
            if (!document.ripple_form.ripple_content.value) {
                alert("내용을 입력하세요!");
                document.ripple_form.ripple_content.focus();
                return;
            }
            document.ripple_form.submit();
        }

        function del(href) {
            if (confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
            }
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
            <div id="view_comment"> &nbsp;</div>
            <div id="view_title">
                <div id="view_title1"><?= $item_subject ?></div>
                <div id="view_title1_1"></div>
                <div id="view_title2"><?= $item_kinds ?>문의 | <?= $item_nick ?> | <?= $item_date ?></div>
            </div>

            <div id="view_content">
                <!--<span><i class="far fa-comment-dots"></i>
                    <?
		if ($num_ripple) //리플개수가 있으면 
				echo " $num_ripple"; 
?>
                </span>-->
                <?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
                <?= $item_content ?>
            </div>

            <div id="ripple">
                <?
	    $sql = "select * from free_ripple where parent='$item_num'";
	    $ripple_result = mysql_query($sql);

		while ($row_ripple = mysql_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num];
			$ripple_id      = $row_ripple[id];
			$ripple_nick    = $row_ripple[nick];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
?>
                <div id="ripple_writer_title">
                    <ul>
                        <li id="writer_title1"><?=$ripple_nick?></li>
                        <li id="writer_title2"><?=$ripple_date?></li>
                        <li id="writer_title3">
                            <? 
                            if($userid=="aaa" || $userid==$ripple_id) //관리자또는 userid가 ripple_id인 사람(=댓글을 단 사람)
                              echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>"; 
                      ?>
                        </li>
                    </ul>
                </div>
                <div id="ripple_content"><?=$ripple_content?></div>
                <div class="hor_line_ripple"></div>
                <?
		}
?>
                <form name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">
                    <div id="ripple_box">
                        <div id="ripple_box1"><?=$userid?></div>
                        <div id="ripple_box2">
                            <textarea rows="5" cols="65" name="ripple_content" placeholder="답변을 남겨보세요" required></textarea>
                        </div>
                        <div id="ripple_box3">
                            <input type="submit" onclick="check_input()" title="등록" value="등록">
                        </div>
                    </div>
                </form>
            </div> <!-- end of ripple -->

            <div id="view_button">
                <a href="list.php?table=<?=$table?>&page=<?=$page?>">List</a>&nbsp;
                <? 
	if($userid && ($userid==$item_id))
	{
?>
                <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">Modify</a>&nbsp;
                <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">Delete</a>&nbsp;
                <?
	}
?>
                <? 
	if($userid)
	{
?>
                <a href="write_form.php?table=<?=$table?>">Write</a>
                <?
	}
?>
            </div>
            <div class="clear"></div>
        </div>
    </article>
    <? include "../common/sub_foot.html" ?>
</body>

</html>