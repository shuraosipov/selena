<div id="logo">
	SELENA
</div>
<div id="navcontainer"> 

	<a class="button" href="users_a.php">Пользователи</a>
	<a class="button" href="#">Настройки</a>
	<a class="button" href="#">Управление</a>
	

</div>
<div id="quit">
		<a class="button" href="logout.php">Выйти</a>
</div>


<div id="name">
	<?php   echo $username = $_SESSION['username'];?>	
</div>