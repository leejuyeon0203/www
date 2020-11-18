<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    // $table=concert $num=1  $page=1

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];  // 첨부파일의 실제이름
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];  // 날짜/시간 바뀐이름
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
	
	for ($i=0; $i<3; $i++)  // 0~2 첨부된 이미지 처리를 위한 반복문
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명) 
                // => 배열형태의 리턴값
              // => 파일의 $imageinfo[0] (너비)와 $imageinfo[1 ](높이)값, 종류(파일종류.. jpg?png?zip파일?? 한글파일??)
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

        if ($image_width[$i] > 785)  // 첨부된 이미지의 최대너비를 785지점
				$image_width[$i] = 785;
		}
		else   // 업로드된 이미지가 없으면..
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
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/information.css">
    <script src="https://kit.fontawesome.com/23c3575424.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
        function del(href) {
            if (confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
            }
        }
    </script>
</head>

<? include "../common/sub_head.html" ?>
<!--<div id="wrap">-->
<div class="visual">
    <img src="../sub5/common/images/sub_visual.jpg" alt="비주얼이미지">
    <h3>Customer</h3>
    <p>블루스퀘어의 새로운 소식을 만나보세요.</p>
</div>

<!-- 서브네비영역 -->
<div class="subNav">
    <ul>
        <li><a id="nav1" href="../sub5/sub5_1.html">Event</a></li>
        <li><a id="nav2" class="current" href="../information/list.php">Information</a></li>
        <li><a id="nav3" href="../sub5/sub5_3.html">FAQ</a></li>
        <li><a id="nav4" href="../sub5/sub5_4.html">Promote video</a></li>
    </ul>
</div>

<div id="content">
    <div class="title_area">
        <div class="lineMap">
            <span>home</span> &gt; <span>Customer</span> &gt; <strong>Event</strong>
        </div>
        <div class="title">
            <h2>Information</h2>
            <p>블루스퀘어가 당신과 함께 합니다</p>
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
            <div id="view_comment"> &nbsp;</div>

            <div id="view_title">
                <div id="view_title1"><?= $item_subject ?></div>
                <div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>
                    | <?= $item_date ?> </div>
            </div>

            <div id="view_content">
                <?
	for ($i=0; $i<3; $i++)  //업로드된 이미지를 출력한다
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];  // ./data/2019_03_22_10_07_15_0.jpg
			$img_name = "./data/".$img_name; // 이미지네임에다 경로까지 넣어줌..
             // ./data/2019_03_22_10_07_15_0.jpg
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width' alt=''>"."<br><br>";
		}
	}
?>
                <?= $item_content ?>
            </div>

            <div id="view_button">
                <a href="list.php?table=<?=$table?>&page=<?=$page?>">List</a>&nbsp;
                <? 
	if($userid==$item_id || $userid=="master" || $userlevel==1 )
	{
?>
                <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">MODIFY</a>&nbsp;
                <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">DELETE</a>&nbsp;
                <?
	}
?>
                <? 
	if($userid)
	{
?>
                <a href="write_form.php?table=<?=$table?>">WRITE</a>
                <?
	}
?>
            </div>

            <div class="clear"></div>

        </div> <!-- end of col2 -->
    </div> <!-- end of content -->
</div><!-- content -->
<? include "../common/sub_foot.html" ?>

</html>