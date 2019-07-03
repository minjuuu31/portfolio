<?php

class Calender
{
    public function calenderBox()
    {
        $count = 0;
        $ym = mb_convert_kana(filter_input(INPUT_GET, 'ym'), 'n');
        if(!$ym)
        {
            $year = date('Y');
            $month = date('m');
              } else{
                list($year, $month) = explode('-', $ym);
        }        
        echo '<tr>', PHP_EOL;

        $week_start = date('w', strtotime("{$year}-{$month}-01"));)
        for($j = 0; $j < $week_start; $j++)
        {
            echo '<td>&nbsp;</td>', PHP_EOL;
        }

        $count += $week_start;

        for($i = 1; $i <= date('t', strtotime("{$year}-{$month}")); $i++)
        {
            echo '<td class="text-center">' . $i . '</td>', PHP_EOL;
            $count++;
            if($count % 7 === 0)
            {
                echo '</tr>', PHP_EOL;
                echo '<tr>', PHP_EOL;  
            }
        }

        $day_end = date('t', strtotime("{$year}-{$month}"));
        $week_end = date('w', strtotime("{$year}-{$month}-{$day_end}"));
        for($i = $week_end; $i < 6; $i++)
        {
            echo '<td>&nbsp;</td>', PHP_EOL;
        }
        echo '</tr>', PHP_EOL;
    }

}
?>