<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "information"; //해당 게시판의 테이블명
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>블루스퀘어-Information</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    
    <link rel="stylesheet" href="css/information.css">
    
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

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
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
        
        <!-- 본문콘텐츠영역 -->
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

            <div id="col2">
                <form name="board_form" class="form_top" method="post" action="list.php?mode=search">
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
        
      if($row[file_copied_0]){  // 첫번째 첨부이미지가 있으면..
        $item_img = './data/'.$row[file_copied_0]; // ./data/2020_10_12_10_41_13_0.jpg
      }else{  // 첨부된 이미지가 없으면.. 
        $item_img = './data/default.jpg'  ;  // 이미지가 없으면 이미지 방에 들어있는 default.jpg를 넣어라
      }
      
?>
                    <ul class="list_item">
                        <li class="list_item1"><?= $number ?></li> <!-- 글 넘버 -->
                        
                        <li class="list_item2"><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">

                                <img src="<?=$item_img?>" alt="" width="50" height="50">
                                <!--썸네일 이미지-->

                                <span><?= $item_subject ?></span></a></li>
                        <li class="list_item3"><i class="far fa-user"></i><?= $item_nick ?></li>
                        <li class="list_item3"><i class="far fa-calendar-alt"></i><?= $item_date ?></li>
                        <li class="list_item3"><i class="far fa-eye"></i> <?= $item_hit ?></li>
                    </ul>
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
                    <div id="button">
                            <a href="list.php?table=<?=$table?>&page=<?=$page?>">List</a>&nbsp;
                            <? 
	if($userid="aaa")
	{
?>
                            <a href="write_form.php?table=<?=$table?>">Write</a>
                            <?
	}
?>
                        </div>
                    <div id="page_button">
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
                    </div> <!-- end of page_button -->
                </div> <!-- end of list content -->
            </div> <!-- end of col2 -->
        </div> <!-- end of content -->
    <? include "../common/sub_foot.html" ?>
</body>
</html>