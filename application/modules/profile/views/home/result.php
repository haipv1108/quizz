<div> Điểm đạt được: <?php echo $score;?>         Trên tổng điểm: <?php echo $totalScore;?></div>
<div> Điểm quy đổi: <?php echo round($score/$totalScore*10,2);?></div>

<form method="post" action="">
	<input type="submit" value="Trở về" name="submit_rs">
</form>