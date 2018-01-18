<div class="content-email">
    <div class="title-email">Có một khách hàng mới vừa đăng nhu cầu mua nhà ở khu vực Quý khách đăng bán.</div>
    <div class="detail-email">
        <div class="row">Họ và tên: <?php echo $user->name; ?></div>
        <div class="row">Tầm tài chính: <?php echo ($tindang->tam_tien / 1000000000) . "tỷ"; ?></div>
        <div class="row">Diện tích: <?php echo $tindang->dien_tich . "m2"; ?></div>
        <div class="row">Mặt tiền: <?php if($tindang->mat_tien != '') echo $tindang->mat_tien  . "m"; else echo "Không quan trọng"; ?></div>
        <div class="row">Đường vào: <?php if($tindang->duong_vao != '') echo $tindang->duong_vao  . "m"; else echo "Không quan trọng"; ?></div>
        <hr />
        <div class="row">Link tin: <a href="http://chodatso.com/yeucaunha/<?php echo $tindang->id; ?>">http://chodatso.com/<?php echo $tindang->id; ?></a></div>
        <div class="row">Chúc Quý khách sẽ bán được nhà sớm! Gọi ngay cho người mua và giới thiệu Quý khách là xem yêu cầu đăng ở chodatso.com để bắt đầu cuộc trò chuyện tốt nhất!</div>
    </div>
</div>