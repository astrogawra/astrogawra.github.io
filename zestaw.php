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
      h1 {font-family: Book Antiqua, Helvetica, sans-serif; font-variant: small-caps ;font-size: 16pt;color:blue}
      h2 {font-family: Arial, Helvetica, sans-serif; font-variant: small-caps ;font-size: 12pt;color:#106501}
      p {font-family: Arial, Helvetica, sans-serif; font-size: 9pt; color:red}
    </STYLE>
  </HEAD>
  <BODY background="images/back.gif">
  <center>
  <img src="images/logo.gif" alt="Jerry" align="left" border=4 height=80 width=100>
  <h1>Wybór  Parametrów Zestawienia</h1><br>
  <i><center>{imię i nazwisko zostanie wprowadzone automatyczne}</center></i>
  <?    
        
        
        print"<form action=zestaw2.php method=post>
<table border=1 width=60% cellpadding=5 align=center bgcolor=#90E3AC>
                     <tr  bgcolor=#4BD178 align=center> <th>Parametr</th><th  align=center colspan=2></th></tr>
                     <tr align=center><th rowspan=2>Tytuł zestawienia</th><td colspan=2>zmień standardowy tytuł : <input type=checkbox name=tytul value=1></td></tr><tr><td colspan=2><input type=text name=t_tytul alt=wprowadź tekst size=40></td></tr>
                      <tr align=center><th rowspan=2>Wybierz semestr</th><td colspan=2>semestr 1<input type=radio name=sem value='sem1' checked></td></tr><tr align=center><td align=center colspan=2>semestr 2<input type=radio name=sem value='sem2'></td></tr>
                     <tr align=center><th>Adres ucznia</th><td colspan=2><input type=checkbox name=adres value=1></td></tr>
                    <tr align=center><th>Data urodzenia</th><td colspan=2><input type=checkbox name=data value=1></td></tr>
                    <tr align=center><th>Pesel</th><td colspan=2><input type=checkbox name=pes value=1></td></tr>
                    <tr align=center><th>Kontakt-{tel./e-mail}</th><td colspan=2><input type=checkbox name=kont value=1></td></tr>
                    <tr align=center><th>Ocena</th><td colspan=2><input type=checkbox name=ocena value=1 checked> </td></tr>
                    <tr align=center><th>Suma punktów</th><td colspan=2><input type=checkbox name=sum value=1></td></tr>
                    <tr align=center><th>Punkty z kategorii</th><td colspan=2><input type=checkbox name=punkty value=1></td></tr>
                     <tr align=center><th>Komentarz o uczniu - sem1</th><td colspan=2><input type=checkbox name=info1 value=1></td></tr>
                      <tr align=center><th>Komentarz o uczniu - sem2</th><td colspan=2><input type=checkbox name=info2 value=1></td></tr>
                      <tr align=center><th>Dodatkowa pusta kolumna</th><td><input type=checkbox name=kol value=1></td><td>nagłówek:<input type=text name=dod_kol></td></tr>
                      
   <tr align=center><td colspan=3>                 
          <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>                           
                            <input type=submit value='Wygeneruj Zestawienie'></form>
                            <form action=oceny.php method=post target=_top>
                           <input type=hidden name=login value=$login> 
                           <input type=hidden name=haslo value=$haslo>
                            <input type=submit value='Powrót do Listy Uczniów'></form>
        </td></tr>
        
        </table>
</form>";
        
  ?>
     
  </BODY>
</HTML> 
