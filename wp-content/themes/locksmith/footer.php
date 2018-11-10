

<?php 
	/*
	Tạo một file văn bản và lưu với tên index.log để lưu giá trị đếm, nội dung của file này là con số khởi đầu của bộ đếm (có thể bắt đầu bằng số 0 hoặc 	một số bất kỳ). Lưu ý không thêm dấu cách, Enter hay bất kỳ ký tự nào khác.
	*/
	?>
	<?php 
	$CountFile = "index.log";
	$CF = fopen ($CountFile, "r");
	$Views = fread ($CF, filesize ($CountFile));
	fclose ($CF);
	$Views++; 
	
	$CF = fopen ($CountFile, "w");
	fwrite ($CF, $Views); 
	fclose ($CF);                
?>

<section class="wd-footer row">
	<p class="copytight">Copyright © 2018 <strong>Kim Hoàng Phát</strong> - <a href="http://kimhoangphat.vn"><strong>www.kimhoangphat.vn</strong></a></p>
	<div class="box_statis">Lượt truy cập : <strong><?php 	echo $Views; ?></strong></div>

</section>



<?php wp_footer() ?>

</body>

</html>

