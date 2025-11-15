<HTML>
<?
foreach($_GET as $key=>$val)$$key=$val;
foreach($_POST as $key=>$val)$$key=$val;
foreach($_COOKIE as $key=>$val)$$key=$val;
foreach($_FILES as $key=>$val)$$key=$val;
?>

<frameset cols="20%,*'" frameborder=1 framespacing=0 border=0>
<frame name="ramka1" src="menu.php?login=<?echo $login?>&haslo=<?echo $haslo?>" marginwidth=0 marginheight=0 scrolling="no">
<frame name="ramka2" src="oceny2b.php?login=<?echo $login?>&id=<?echo $id?>" marginwidth=0 marginheight=0 scrolling="auto" >

</frameset>

</frameset>

     </HTML>
