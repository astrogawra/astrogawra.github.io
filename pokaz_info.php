<HTML>
<?
foreach($_GET as $key=>$val)$$key=$val;
foreach($_POST as $key=>$val)$$key=$val;
foreach($_COOKIE as $key=>$val)$$key=$val;
foreach($_FILES as $key=>$val)$$key=$val;
?>
  <HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-2">
    <TITLE></TITLE>
        <STYLE>
      h1 {font-family: Book Antiqua, Helvetica, sans-serif; font-variant: small-caps ;font-size: 20pt;color:blue}
      h2 {font-family: Arial, Helvetica, sans-serif; font-variant: small-caps ;font-size: 10pt}
      p {font-family: Arial, Helvetica, sans-serif; font-size: 9pt; color:red}
    </STYLE>
  </HEAD>
  <BODY background="images/back.gif">
  <img src="images/logo.gif" alt="Jerry" align="left" border=4 height=55 width=70><br><br><br><center>
  <?
       $user_db='jarstan';
       $pass_db='alfik';
         mysql_connect ("localhost", "$user_db", "$pass_db") or 
        die ("Nie można połączyć się z MySQL");
      mysql_select_db ("szkola2") or 
        die ("Nie można połączyć się z bazą szkola2");      
        
         $wynik = mysql_query ("SELECT * FROM info  WHERE id='$id';") or 
        die ("błąd w pytaniu");    
        
          $rekord = mysql_fetch_array ($wynik);
                       
                       if ($dzialanie=='sem1') {
                               $opis= $rekord[2]
                               else $opis= $rekord[3];
 
              print" KOmentarz do $opis";  
   
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
          ?>

  </BODY>
</HTML> 
