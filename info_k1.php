<HTML>
<?
foreach($_GET as $key=>$val)$$key=$val;
foreach($_POST as $key=>$val)$$key=$val;
foreach($_COOKIE as $key=>$val)$$key=$val;
foreach($_FILES as $key=>$val)$$key=$val;
?>
  <HEAD>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-2">
    <TITLE>Asystent Wychowawcy - by Jarosław Stańko</TITLE>
        <STYLE>
      h1 {font-family: Book Antiqua, Helvetica, sans-serif; font-variant: small-caps ;font-size: 20pt;color:blue}
      h2 {font-family: Arial, Helvetica, sans-serif; font-variant: small-caps ;font-size: 10pt}
      p {font-family: Arial, Helvetica, sans-serif; font-size: 9pt; color:red}
    </STYLE>
  </HEAD>
  <BODY background="images/back.gif">
  <img src="images/logo.gif" alt="Jerry" align="left" border=4 height=55 width=70><br><br><br><center>
  <h2>Użytkownik systemu:</h2><h1><?echo $login;?></h1>
  <?
       $user_db='jarstan';
       $pass_db='alfik';
       
         mysql_connect ("localhost", "$user_db", "$pass_db") or 
        die ("Nie można połączyć się z MySQL");
      mysql_select_db ("szkola2") or 
        die ("Nie można połączyć się z bazą szkola2");      
        
         $wynik = mysql_query ("SELECT * FROM klasy") or 
        die ("błąd w pytaniu");    
        
  print"   <form action=info_k2.php method=POST target=ramka2>
<center><br>
<font size=5 color=Maroon>Wybierz klasę<br><br></font><br>
<select name=id_k >";
while ($tablica=mysql_fetch_row($wynik))
{
print"<center><option>  $tablica[2] </center>";
}
echo"</select><br>
<input type=hidden name=login value='$login'> 
<input type=submit value=Wybierz>
</FORM>";    
            
     print "    <center>      
                              <form action=security.php method=post target=_top>  
                              <input type=hidden name=login value='$login'> 
                           <input type=hidden name=haslo value='$haslo'>                              
                            <input type=submit value=Menu>
                             </form></center>";
        
        
        
        
