<?
   session_start();
?>
<meta charset="utf-8">
<?
   @extract($_GET); 
   @extract($_POST); 
   @extract($_SESSION); 

   //$sid (post)
   //$pass (post)
  

   if(!$id) {   // !(느낌표)=없으면
     echo("
           <script>
             window.alert('아이디 입력하세요');
             history.go(-1);
           </script>
         ");
         exit; //빠져나와
   }

   if(!$pass) {
     echo("
           <script>
             window.alert('패스워드 입력하세요');
             history.go(-1);
           </script>
         ");
         exit;
   }

 

   include "../lib/dbconn.php";

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect); // 있으면 1 , 없으면 null

   $num_match = mysql_num_rows($result);  //1 null

   if(!$num_match) // 검색 레코드가 없으면
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다.');
             history.go(-1);
           </script>
         ");
    }
    else   // 검색 레코드가 있으면
    {
		 $row = mysql_fetch_array($result);
          //$row[id] ,.... $row[level]
         $sql ="select * from member where id='$id' and pass=password('$pass')";
         $num_match = mysql_num_rows($result); // 있으면 1 , 없으면 null
     
  

        if(!$num_match) 
        {
           echo("
              <script>
                window.alert('패스워드가 일치하지 않습니다.');
                history.go(-1);
              </script>
           ");

           exit;
        }
        else   //아이디와 패스워드가 일치한다면
        {
           $userid = $row[id];
		   $username = $row[name];
		   $usernick = $row[nick];
		   $userlevel = $row[level];
  
            
           // 필요한 세션변수를 생성한다. (가장중요!!)
           $_SESSION['userid'] = $userid;//$_SESSION['userid'] = $row[id];
           $_SESSION['username'] = $username;//$_SESSION['username'] = $row[name];
           $_SESSION['usernick'] = $usernick;//$_SESSION['usernick'] = $row[nick];
           $_SESSION['userlevel'] = $userlevel;//$_SESSION['userlevel'] = $row[level];

           echo("
              <script>
			    alert('로그인이 되었습니다.');
                location.href = '../index.html';
              </script>
           ");
        }
   }          
?>
