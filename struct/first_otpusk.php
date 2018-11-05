	<div class="form-wrapper">
	<form name="first_holiday" action="index.php" method="post">
		Начало первого отпуска. День:
		<select name="day">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			<option>13</option>
			<option>14</option>
			<option>15</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			<option>21</option>
			<option>22</option>
			<option>23</option>
			<option>24</option>
			<option>25</option>
			<option>26</option>
			<option>27</option>
			<option>28</option>
			<option>29</option>
			<option>30</option>
			<option>31</option>
		</select>
			Месяц:
		<select name="mounth">
			<option>Февраль</option>
			<option>Март</option>
			<option>Апрель</option>
			<option>Май</option>
			<option>Июнь</option>
			<option>Июль</option>
			<option>Август</option>
			<option>Сентябрь</option>
			<option>Октябрь</option>
			<option>Ноябрь</option>
		</select>
		<input name="submit" type="submit" value="Выбрать"></input>
		<br />
		<div class="<?php if (strlen($date_error)>2) {echo 'error';};?>">
			<?=$date_error?>
		</div>
	</form>
	</div>
	