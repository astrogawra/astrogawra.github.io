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
      h1 {font-family: Book Antiqua, Helvetica, sans-serif; font-variant: small-caps ;font-size:16pt;color:blue}
      h2 {font-family: Arial, Helvetica, sans-serif; font-variant: small-caps ;font-size: 14pt;color:Maroon}
      p {font-family: Arial, Helvetica, sans-serif; font-size: 9pt; color:red}
    </STYLE>
  </HEAD>
  <BODY background="images/back.gif">
  <img src="images/logo.gif" alt="Jerry" align="left" border=4 height=55 width=70><br><br><br><center>
  <h2>Użytkownik : <b><?print"$login";?></b></h2>
  <?
       $user_db='jarstan';
       $pass_db='alfik';
       
         mysql_connect ("localhost", "$user_db", "$pass_db") or 
        die ("Nie można połączyć się z MySQL");
      mysql_select_db ("szkola2") or 
        die ("Nie można połączyć się z bazą szkola2");      
        
      
      
         print"<center><h1>Edytuj Wpis o Klasie $id_k - $rocznik</h1>";    
       print " <form action=info_k2.php method=post target=ramka2>         
                       <table border=1 width=100% cellpadding=5 align=center bgcolor=#BED4E4>";
                        if($nr==''){
                           print"<tr> <TD align=center> <textarea name=opis rows=8 cols=60></textarea></TD>
                          <input type=hidden name=dzialanie value='wstaw'>";
                       }else{
                                 
                 $wynik = mysql_query ("SELECT * FROM info2 WHERE lp='$nr';") or 
                        die ("błąd w pytaniu");
                                 $rekord = mysql_fetch_array ($wynik);
                                 $kiedy=$rekord[2];
                                 $rocznik=$rekord[1];
                                            $opis=$rekord[4];                       
                            print"  <tr> <TD align=center> <textarea name=opis rows=8 cols=60>$opis</textarea></TD>
                            <input type=hidden name=dzialanie value='zmien'>
                            <input type=hidden name=nr value='$nr'>
                            <input type=hidden name=kiedy value='$kiedy'>";
                            }
                     print" <td align=center>                                     
                        
                          <input type=hidden name=login value=$login> 
                           <input type=hidden name=rocznik value=$rocznik>  
                            <input type=hidden name=id_k value=$id_k>                  
                            <input type=submit value='Zapisz'>
                             </form>
                      </td></tr> </table>";
