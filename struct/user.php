<?php
echo '<div id="username">'.$sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->name.'</div>';

if($sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->color == ''){
	echo '<div id="changecolor">';
	echo '<svg width="30" height="15">';
	echo '<rect x="0" y="0" width="30" height="15" stroke="black" fill="white"/>';
	echo '<line x1="0" y1="0" x2="30" y2="15" stroke="black"/>';
	echo '</svg>';
	echo '<a href="color_choise.php"> Необходимо выбрать цвет</a>';
	echo '</div>';
}else if($sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->first_start == '0'){
		require_once 'struct/first_otpusk.php';
}else if($sotrudniki[get_user_id($sotrudniki, $_SESSION['user'])]->second_start == '0'){
		require_once 'struct/second_otpusk.php';
}

?>
