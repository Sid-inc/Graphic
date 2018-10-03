	<div id="legend">
		<ul>	
	
	
	<?php
			for	($n = 1; $n < count($sotrudniki); $n++){
				echo '<li>';
				echo '<svg width="30" height="15">';
				if ($sotrudniki[$n]->color <> ''){
					echo '<rect x="0" y="0" width="30" height="15" stroke="black" fill="'.$sotrudniki[$n]->color.'"/>';
				}else{
					echo '<rect x="0" y="0" width="30" height="15" stroke="black" fill="white"/>';
					echo '<line x1="0" y1="0" x2="30" y2="15" stroke="black"/>';
				}
				echo '</svg> ';
				echo $sotrudniki[$n]->name;
				echo '</li>';
			}
	?>
	
	
		</ul>
	</div>