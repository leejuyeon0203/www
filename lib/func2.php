<?
   function latest_article($table, $loop, $char_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				$subject = str_replace( "&#039;", "'", $subject);               
                $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

            //목록 이미지 경로 불러오기
            if($table=='information'){
                $img_name = $row[file_copied_0];  //첨부된 첫번째 날짜로 되어 있는 실제 업로드 되어 있는 파일명
                                                //2020_10_12_15_56_09_0.jpg
                if($img_name){ //첨부된 첫번째 이미지가 있으면
                    $img_name = "./$table/data/".$img_name;
                }else{
                    $img_name = "./$table/data/default.jpg"; 
                }
            }
            

            if($table=='information'){
                 echo "      
				<li>
                    <a href='./$table/view.php?table=$table&num=$num'>
                        <div><img src='$img_name' width='335' height='195' alt=''></div><dl><dt>new</dt><dd>$subject<span>$regist_day</span></dd></dl>
                    </a>
                </li>
                ";
            }
			
		}
		mysql_close();
   }
?>