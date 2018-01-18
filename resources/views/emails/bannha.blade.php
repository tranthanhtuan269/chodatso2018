<div class="content-email">
    <div class="title-email">Có một khách hàng mới vừa đăng nhu cầu bán nhà ở khu vực Quý khách cần mua.</div>
    <div class="detail-email">
        <div class="row">Họ và tên: <?php echo $user->name; ?></div>
        <div class="row">Email: <?php echo $user->email; ?></div>
        <div class="row">Phone: <?php echo $user->phone; ?></div>
        <div class="row">Giá chào: <?php echo ($tindang->gia / 1000000000) . "tỷ"; ?></div>
        <div class="row">Diện tích: <?php echo $tindang->dien_tich . "m2"; ?></div>
        <div class="row">Mặt tiền: <?php echo $tindang->mat_tien  . "m"; ?></div>
        <div class="row">Đường vào: <?php echo $tindang->duong_vao  . "m"; ?></div>
        <div class="row">Ảnh bất động sản:</div>
        <div class="row">
        <?php 
            if(strlen($tindang->images) > 0){
                $temp = substr($tindang->images,0,-1);
                $images = explode( ';', $temp ); 
                foreach ($images as $image) {
                    echo '<img src="' . URL::to('/') . '/images/' . $image . '">';
                }
            }
        ?>
        </div>
        <hr />
        <div class="row">Link tin: <a href="http://chodatso.com/<?php echo $tindang->id; ?>">http://chodatso.com/<?php echo $tindang->id; ?></a></div>
        <div class="row">Hy vọng Quý khách sẽ thích ngôi nhà này! Gọi ngay cho chủ nhà và giới thiệu Quý khách là xem tin đăng ở chodatso.com để được giá chào tốt nhất!</div>
        <div class="row">Chúc Quý khách sớm mua được nhà! </div>
    </div>
</div>