<!DOCTYPE html>
<html>
	<head>
		<title>time</title>
	</head>
	<body>
		<div align="center">
		<form>
			<p>Когда вы родились?<p><br>
			День:
			<select name='day' required >
				<?php
					
					if ( isset($_GET['day']) )
					{
						$day = $_GET['day'];
					}
					else
					{
						$day = 1;
					}
					$i = 1;
					for (  $i; $i < 32; $i++)
					{
						if ( $i == $day )
						{
							echo "<option selected value='".$i."'>".$i."</option>";
						}
						else
						{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
				?>
			</select>
			Месяц:
			<select name='month' required>
				<?php 
				if ( isset($_GET['month']) )
				{
					$month = $_GET['month'];
				}
				else
				{
					$month = 0;
				}
				if ( $month == 1 || $month == 0 )
				{
					echo "<option selected value='1'>Январь</option>";
				}
				else
				{
					echo "<option value='1'>Январь</option>";
				}
				if ( $month == 2 )
				{
					echo "<option selected value='2'>Февраль</option>";
				}
				else
				{
					echo "<option value='2'>Февраль</option>";
				}
				if ( $month == 3 )
				{
					echo "<option selected value='3'>Март</option>";
				}
				else
				{
					echo "<option value='3'>Март</option>";
				}
				if ( $month == 4 )
				{
					echo "<option selected value='4'>Апрель</option>";
				}
				else
				{
					echo "<option value='4'>Апрель</option>";
				}
				if ( $month == 5 )
				{
					echo "<option selected value='5'>Май</option>";
				}
				else
				{
					echo "<option value='5'>Май</option>";
				}
				if ( $month == 6 )
				{
					echo "<option selected value='6'>Июнь</option>";
				}
				else
				{
					echo "<option value='6'>Июнь</option>";
				}
				if ( $month == 7 )
				{
					echo "<option selected value='7'>Июль</option>";
				}
				else
				{
					echo "<option value='7'>Июль</option>";
				}
				if ( $month == 8 )
				{
					echo "<option selected value='8'>Август</option>";
				}
				else
				{
					echo "<option value='8'>Август</option>";
				}
				if ( $month == 9 )
				{
					echo "<option selected value='9'>Сентябрь</option>";
				}
				else
				{
					echo "<option value='9'>Сентябрь</option>";
				}
				if ( $month == 10 )
				{
					echo "<option selected value='10'>Октябрь</option>";
				}
				else
				{
					echo "<option value='10'>Октябрь</option>";
				}
				if ( $month == 11 )
				{
					echo "<option selected value='11'>Ноябрь</option>";
				}
				else
				{
					echo "<option value='11'>Ноябрь</option>";
				}
				if ( $month == 12 )
				{
					echo "<option selected value='12'>Декабрь</option>";
				}
				else
				{
					echo "<option value='12'>Декабрь</option>";
				}
				?>	
			</select>
			Год:
			<select name="year" required>
				<?php
				if ( isset($_GET['year']) )
				{
					$year = $_GET['year'];
				}
				else
				{
					$year = 2000;
				}
					$i = 1900;
					for ( $i; $i < 2019; $i++ )
					{
						if ( $i == $year )
						{
							echo "<option selected value='".$i."'>".$i."</option>";
						}
						else
						{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
				?>
			</select>
			<p><input value="Подтвердить" type="submit"></p>
		</form>
		<?php
			if ( isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year']) )
			{

                $current_year = intval(time() / 31536000)+1970;
                $current_year_second = time() % 31536000 - intval(($current_year - 1970) / 4) * 86400;

                switch ( $month ) 
                {
                    case 1:
                        $birthday = 0;
                    break;
                    case 2:
                        $birthday = 31;
                    break;
                    case 3:
                        $birthday = 31+28;
                    break;
                    case 4:
                        $birthday = 31+28+31;
                    break;
                    case 5:
                        $birthday = 31+28+31+30;
                    break;
                    case 6:
                        $birthday = 31+28+31+30+31;
                    break;
                    case 7:
                        $birthday = 31+28+31+30+31+30;
                    break;
                    case 8:
                        $birthday = 31+28+31+30+31+30+31;
                    break;
                    case 9:
                        $birthday = 31+28+31+30+31+30+31+31;
                    break;
                    case 10:
                        $birthday = 31+28+31+30+31+30+31+31+30;
                    break;
                    case 11:
                        $birthday = 31+28+31+30+31+30+31+31+30+31;
                    break;
                    case 12:
                        $birthday = 31+28+31+30+31+30+31+31+30+31+30;
                    break;
                }
                $birthday = $birthday + $day - 1;
                if ( intval(time() / 31536000 + 2 + $birthday / 366) % 4 == 0 )
                {
                    $birthday += 1;
                }
                $lived_second = time() - (($year - 1970)*31536000 + ($birthday)*86400);
                $birthday *= 86400;
                $birthday -= 10800;

                    if ( $birthday > $current_year_second && $year >= $current_year )
                    {
                        echo "<b>А вот не надо мне тут херней страдать!!!</b>";
                        exit(0);
                    }

                    echo "Знак зодиака:<b>";
                    if ( ($month == 3 && $day >= 21) || ($month == 4 && $day <= 19) )
                    {
                        echo "овен";
                    }
                    if ( ($month == 4 && $day >= 20) || ($month == 5 && $day <= 20) )
                    {
                        echo "телец";
                    }
                    if ( ($month == 5 && $day >= 21) || ($month == 6 && $day <= 20) )
                    {
                        echo "близнецы";
                    }
                    if ( ($month == 6 && $day >= 21) || ($month == 7 && $day <= 22) )
                    {
                        echo "рак";
                    }
                    if ( ($month == 7 && $day >= 21) || ($month == 8 && $day <= 22) )
                    {
                        echo "лев";
                    }
                    if ( ($month == 8 && $day >= 23) || ($month == 9 && $day <= 22) )
                    {
                        echo "дева";
                    }
                    if ( ($month == 9 && $day >= 23) || ($month == 10 && $day <= 22) )
                    {
                        echo "весы";
                    }
                    if ( ($month == 10 && $day >= 23) || ($month == 11 && $day <= 21) )
                    {
                        echo "скорпион";
                    }
                    if ( ($month == 11 && $day >= 22) || ($month == 12 && $day <= 21) )
                    {
                        echo "стрелец";
                    }
                    if ( ($month == 12 && $day >= 22) || ($month == 1 && $day <= 19) )
                    {
                        echo "козерог";
                    }
                    if ( ($month == 1 && $day >= 20) || ($month == 2 && $day <= 18) )
                    {
                        echo "водолей";
                    }
                    if ( ($month == 2 && $day >= 19) || ($month == 3 && $day <= 20) )
                    {
                        echo "рыбы";
                    }
                    echo "</b><br>";
                    echo "Знак зодиака по году:<b>";
                    switch (($year-4) % 12) 
                    {
                        case 0:
                            echo "крыса";
                        break;
                        case 1:
                            echo "бык";
                        break;
                        case 2:
                            echo "тигр";
                        break;
                        case 3:
                            echo "кролик";
                        break;
                        case 4:
                            echo "дракон";
                        break;
                        case 5:
                            echo "змея";
                        break;
                        case 6:
                            echo "лошадь";
                        break;
                        case 7:
                            echo "коза";
                        break;
                        case 8:
                            echo "обезьяна";
                        break;
                        case 9:
                            echo "петух";
                        break;
                        case 10:
                            echo "собака";
                        break;
                        case 11:
                            echo "свинья";
                        break;
                        
                        default:
                            echo "-";
                            break;
                    }
                    echo "</b><br>";
                

                if ( $current_year_second > $birthday )
                {
                    $birthday_day = intval((31536000-($current_year_second - $birthday))/86400);
                    $birthday_hour = intval((31536000-($current_year_second - $birthday))%86400/3600);
                    $birthday_minute = intval((31536000-($current_year_second - $birthday))%3600/60);
                    $birthday_second = ((31536000-($current_year_second - $birthday))%60);
                }
                else
                {
                    $birthday_day = intval(($birthday - $current_year_second)/86400);
                    $birthday_hour = intval(($birthday - $current_year_second)%86400/3600);
                    $birthday_minute = intval(($birthday - $current_year_second)%3600/60);
                    $birthday_second = (($birthday - $current_year_second)%60);
                }



                if ( $year % 4 == 0 )
                    {
                        echo "Вы родились в <b>високосный</b> год";
                    }
                    else
                    {
                        echo "Вы родились в <b>невисокосный</b> год";
                    }
                    echo "<br>";


                echo "До Следующего ДР осталось <b>".$birthday_day."</b> ";
                if ( $birthday_day >= 11 && $birthday_day <= 14 )
                {
                    echo "дней";
                }
                else
                {
                    switch ( $birthday_day % 10 ) 
                    {
                        case 1:
                                echo "день";
                        break;

                        case 2:
                        case 3:
                        case 4:
                            echo "дня";
                        break;
                    
                        default:
                            echo "дней";
                            break;
                    }
                }
                echo " <b>".$birthday_hour."</b> ";
                if ( $birthday_hour >= 11 && $birthday_hour <= 14 )
                {
                    echo "часов";
                }
                else
                {
                    switch ( $birthday_hour % 10 ) 
                    {
                        case 1:
                                echo "час";
                        break;

                        case 2:
                        case 3:
                        case 4:
                            echo "часа";
                        break;
                    
                        default:
                            echo "часов";
                            break;
                    }
                }
                echo " <b>".$birthday_minute."</b> ";
                if ( $birthday_minute >= 11 && $birthday_minute <= 14 )
                {
                    echo "минут";
                }
                else
                {
                    switch ( $birthday_minute % 10 ) 
                    {
                        case 1:
                                echo "минута";
                        break;

                        case 2:
                        case 3:
                        case 4:
                            echo "минуты";
                        break;
                    
                        default:
                            echo "минут";
                            break;
                    }
                }
                echo " <b>".$birthday_second."</b> ";
                if ( $birthday_second >= 11 && $birthday_second <= 14 )
                {
                    echo "секунд";
                }
                else
                {
                    switch ( $birthday_second % 10 ) 
                    {
                        case 1:
                                echo "секунда";
                        break;

                        case 2:
                        case 3:
                        case 4:
                            echo "секунды";
                        break;
                    
                        default:
                            echo "секунд";
                            break;
                    }
                }
                echo "<br>";
                echo "Вы прожили <b>".$lived_second."</b> ";
                if ( $lived_second >= 11 && $lived_second <= 14 )
                {
                    echo "секунд";
                }
                else
                {
                    switch ( $lived_second % 10 ) 
                    {
                        case 1:
                                echo "секунд";
                        break;

                        case 2:
                        case 3:
                        case 4:
                            echo "секунды";
                        break;
                    
                        default:
                            echo "секунд";
                            break;
                    }
                }

                // sleep(1);
                // echo "<meta http-equiv=\"refresh\" content=\"0;URL=time.php?day=".$day."&month=".$month."&year=".$year."\">";
            }
		?>
		</div>
	</body>
</html>
