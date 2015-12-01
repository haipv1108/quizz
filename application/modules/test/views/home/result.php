<div> Diem dat duoc: <?php echo $score;?>         Tren tong diem: <?php echo $totalScore;?></div>
<div> Diem quy doi: <?php echo round($score/$totalScore*10,2);?></div>

<form method="post" action="">
	<input type="submit" value="Trở về" name="submit_rs">
</form>