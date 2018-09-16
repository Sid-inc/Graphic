<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=Content-Type content="text/html;charset=UTF-8">
	  <link href="/css/style.css?=123" type="text/css" rel="stylesheet" />
	<title>График отпусков</title>
</head>
<body>
	<header>
		<div id="login"><a href="index.php"><p>Авторизация</p></a></div>
		<h1>График отпусков на 2019 год</h1>
	</header>
	<div id="username">Дима</div>
	<div id="changecolor">
		<svg width="30" height="15">
  			<rect x="0" y="0" width="30" height="15" stroke="black" fill="white"/>
			<line x1="0" y1="0" x2="30" y2="15" stroke="black"/>
		</svg>
		<a href="index.php">Необходимо выбрать цвет</a>
	</div>
	<form name="first_holiday" action="index.php" method="post">
		Начало первого отпуска. День:
		<select>
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
		<select>
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
		</select>
		<input type="submit" value="Выбрать"></input>
	</form>
	<form name="second_holiday" action="index.php" method="post">
		Начало второго отпуска. День:
		<select>
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
		<select>
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
		</select>
		<input type="submit" value="Выбрать"></input>
	</form>
	<div id="legend">
		<ul>
			<li>		
				<svg width="30" height="15">
  					<rect x="0" y="0" width="30" height="15" stroke="black" fill="white"/>
					<line x1="0" y1="0" x2="30" y2="15" stroke="black"/>
		    		</svg> 
				Коля
			</li>
			<li>
				<svg width="30" height="15">
  					<rect x="0" y="0" width="30" height="15" stroke="black" fill="white"/>
					<line x1="0" y1="0" x2="30" y2="15" stroke="black"/>
				</svg>
				Паша
			</li>
			<li>
				<svg width="30" height="15">
  					<rect x="0" y="0" width="30" height="15" stroke="black" fill="white"/>
					<line x1="0" y1="0" x2="30" y2="15" stroke="black"/>
				</svg>
				Дима
			</li>
			<li>
				<svg width="30" height="15">
  					<rect x="0" y="0" width="30" height="15" stroke="black" fill="white"/>
					<line x1="0" y1="0" x2="30" y2="15" stroke="black"/>
				</svg>
				Женя
			</li>
			<li>
				<svg width="30" height="15">
  					<rect x="0" y="0" width="30" height="15" stroke="black" fill="white"/>
					<line x1="0" y1="0" x2="30" y2="15" stroke="black"/>
				</svg>
				Вадим
			</li>
			<li>
				<svg width="30" height="15">
  					<rect x="0" y="0" width="30" height="15" stroke="black" fill="white"/>
					<line x1="0" y1="0" x2="30" y2="15" stroke="black"/>
				</svg>
				Прохор
			</li>
			<li>
				<svg width="30" height="15">
  					<rect x="0" y="0" width="30" height="15" stroke="black" fill="white"/>
					<line x1="0" y1="0" x2="30" y2="15" stroke="black"/>
				</svg>
				Юра
			</li>
		</ul>
	</div>
		<table class="floating">
			<tr><th colspan="7">Январь</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table class="floating">
			<tr><th colspan="7">Февраль</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table class="floating">
			<tr><th colspan="7">Март</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table>
			<tr><th colspan="7">Апрель</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table class="floating">
			<tr><th colspan="7">Май</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table class="floating">
			<tr><th colspan="7">Июнь</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table class="floating">
			<tr><th colspan="7">Июль</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table>
			<tr><th colspan="7">Август</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table class="floating">
			<tr><th colspan="7">Сентябрь</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table class="floating">
			<tr><th colspan="7">Октябрь</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table class="floating">
			<tr><th colspan="7">Ноябрь</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
		<table>
			<tr><th colspan="7">Декабрь</th></tr>
			<tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr>
			<tr><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
			<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
			<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
			<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
			<tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
			<tr><td colspan="7" class="daycount">Доступно дней:</td></tr>
		</table>
</body>
</html>


<?php

require_once '/lib/class/day.php';

$arr = [];

for ($d=1;$d<32;$d++){
	$arr[] = new Day('Jan',$d,'Monday',0);
}

//print_r($arr);



?>
