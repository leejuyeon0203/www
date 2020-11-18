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
    <title>블루스퀘어-Bookpark info</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub2/common/css/sub2common.css">

    <link rel="stylesheet" href="css/greet.css">

    <script src="https://kit.fontawesome.com/23c3575424.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<?
	include "../lib/dbconn.php";

	
  if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>

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

            <div id="col2">
                 <form name="board_form" method="post" action="list.php?mode=search">
                    <div id="list_search">
                        <div id="list_search1">▷ TOTAL <?= $total_record ?> </div>
                    </div>
                    <div id="sch">
                    <label for="sfl" class="sound_only hidden">검색대상</label>
                    <select name="find" id="sfl">
                        <option value="subject">제목</option>
                        <option value="content">내용</option>
                        <option value='nick'>별명</option>
                    </select>
                    <label for="stx" class="sound_only hidden">검색어<strong class="sound_only"> 필수</strong></label>
                    <input type="text" name="search" value="" required id="stx" class="sch_input" size="25" maxlength="20" placeholder="검색어를 입력해주세요">
                    <button type="submit" value="검색" class="sch_btn">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <span class="sound_only hidden">검색</span>
                    </button>
                    </div>
                </form>
                <div class="clear"></div>
                <div id="list_top_title">
                    <ul>
                        <li id="list_title1">Num</li>
                        <li id="list_title2">Title</li>
                        <li id="list_title3">Writer</li>
                        <li id="list_title4">Date</li>
                        <li id="list_title5">Count</li>
                    </ul>
                </div>

                <div id="list_content">
                    <?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

?>
                    <div class="list_item">
                        <div class="list_item1"><?= $number ?></div>
                        <div class="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
                        <div class="list_item3"><?= $item_nick ?></div>
                        <div class="list_item4"><?= $item_date ?></div>
                        <div class="list_item5"><?= $item_hit ?></div>
                    </div>
                    <?
   	   $number--;
   }
?>
                    <div id="show">
                        <select name="scale" onchange="location.href='list.php?scale='+this.value">
                            <option value=''>Show</option>
                            <option value='5'>5</option>
                            <option value='10'>10</option>
                            <option value='15'>15</option>
                            <option value='20'>20</option>
                        </select>
                    </div>
                    <div id="page_button">
                        <div id="button">
                            <a href="list.php?page=<?=$page?>">List</a>&nbsp;
                            <? 
	if($userid)
	{
?>
                            <a href="write_form.php">Write</a>
                            <?
	}
?>
                        </div>

                        <div id="page_num"> <i class="fas fa-chevron-left"></i> &nbsp;&nbsp;&nbsp;&nbsp;
                            <?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
           if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
            }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
		}      
   }
?>
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chevron-right"></i>
                        </div>
                    </div> <!-- button -->
                </div> <!-- list of content -->
                <div class="clear"></div>

            </div> <!-- col2 -->
        </div> <!-- content -->

    <? include "../common/sub_foot.html" ?>
</body>

</html>