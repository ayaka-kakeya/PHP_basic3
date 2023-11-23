<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];

$column=(count($arr,1)-count($arr))/count($arr);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
    <!-- ここにテーブル表示 -->
    <table>
    <?php
        
        echo '<th></th>';
        for ($i=1; $i<=$column; $i++){
            echo '<th>c'.$i.'</th>';
        }
        echo '<th>横合計</th>';

        $sum2=0;

        for ($k=1; $k<=count($arr);$k++){
            echo '<tr><td>r'.$k.'</td>';
            $sum1=0;
            for ($j=1; $j<=$column;$j++){
                echo '<td>'.$arr['r'.$k]['c'.$j].'</td>';
                $sum1=$sum1+$arr['r'.$k]['c'.$j];
                $sum2=$sum2+$arr['r'.$k]['c'.$j];
            }
            echo '<td>'.$sum1.'</td></tr>';
        }

        echo '<tr><td>縦合計</td>';
        for ($m=1;$m<=$column;$m++){
            $sum3=0;
            for ($n=1;$n<=count($arr);$n++){
                $sum3=$sum3+$arr['r'.$n]['c'.$m];               
            }
            echo '<td>'.$sum3.'</td>';
        }
        echo '<td>'.$sum2.'</td></tr>';

    ?>
    </table>
</body>
</html>