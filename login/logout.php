<?

  session_start();
  @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 

  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  unset($_SESSION['usernick']);
  unset($_SESSION['userlevel']);

  echo("
       <script>
          location.href = '../index.html'; 
         </script>
       ");
?>
