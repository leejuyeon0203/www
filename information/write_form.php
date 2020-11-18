<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table='concert'


	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

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
    <title>블루스퀘어 - 정보 글쓰기 페이지</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/information.css">
    <script src="https://kit.fontawesome.com/23c3575424.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
        function check_input() {
            if (!document.board_form.subject.value) {
                alert("제목을 입력하세요!");
                document.board_form.subject.focus();
                return;
            }

            if (!document.board_form.content.value) {
                alert("내용을 입력하세요!");
                document.board_form.content.focus();
                return;
            }
            document.board_form.submit();
        }
    </script>
</head>

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

        <div id="col1">
            <div id="left_menu">
                <?
			include "../lib/left_menu.php";
?>
            </div>
        </div> <!-- end of col1 -->

        <div id="col2" class="photo">

            <div id="title">
                <!--<img src="../img/title_concert.gif">-->
            </div>

            <div class="clear"></div>

            <div id="write_form_title">
                <h3>게시물 작성</h3>
                <!--<img src="../img/write_form_title.gif">-->
            </div>

            <div class="clear"></div>

            <?
	if($mode=="modify")  // 수정하기 모드 일때
	{

?>
            <form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
                <?
        //enctype="multipart/form-data" 이것을 써줘야 이미지가 넘어감. 데이터가 크기때문에 넘어갈수있게 도와줌.
	}
	else   // 새글쓰기 모드 일때
	{
?>
                <form name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data">
                    <?
	}
?>
                    <div id="write_form">
                        <div class="write_line"></div>
                        <div id="write_row1">
                            <div class="col1"> 별명 </div>
                            <div class="col2"><?=$usernick?></div>
                            <?
	if( $userid && ($mode != "modify") )
	{   //새글쓰기 에서만 HTML 쓰기가 보인다
?>
                            <div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
                            <?
	}
?>
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row2">
                            <div class="col1"> 제목 </div>
                            <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>"></div>
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row3">
                            <div class="col1"> 내용 </div>
                            <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
                        </div>
                        <div class="write_line"></div>
                        <div id="write_row4">
                            <div class="col1"> 이미지파일1 </div>
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
                        <div class="write_line"></div>
                        <div id="write_row5">
                            <div class="col1"> 이미지파일2 </div>
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
                        <div class="write_line"></div>
                        <div class="clear"></div>
                        <div id="write_row6">
                            <div class="col1"> 이미지파일3 </div>
                            <div class="col2"><input type="file" name="upfile[]"></div>
                        </div>
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
                </form>
        </div><!-- end of col2 -->
        <div id="write_button">
            <a href="#" onclick="check_input()">Submit</a>
            <a href="list.php?table=news&page=">List</a>
        </div>
    </div> <!-- end of content -->

        <? include "../common/sub_foot.html" ?>

</html>