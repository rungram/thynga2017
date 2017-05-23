<?php 
if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	global $d;
	$data['ten'] = $_POST['ten'];
	$data['email'] = $_POST['email'];
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['diachi'] = $_POST['diachi'];
	$data['noidung'] = $_POST['noidung'];
	$data['subject'] = $_POST['subject'];
	$d->setTable('lienhe');
	$d->insert($data);
}
?>
<div class="bg-white">
		<div class="col-12">
            <h2>LIÊN HỆ VỚI THY NGA</h2>
        </div>
        <div class="col-12">
            <div class="news-summary">
                <div class="col-12">
                    <form method="post" name="frm" action="lien-he.html">
                        <table class="frmContact">
                            <tbody><tr>
                                <td style="width: 60px">Họ tên:</td>
                                <td style="width: 250px"><input class="txt require" type="text" name="ten" value="" required> </td>
                            </tr>
                            <tr>
                                <td>Điện thoại:</td>
                                <td><input class="txt require" type="text" name="dienthoai" value="" required> </td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input class="txt require" type="text" name="email" value=""> </td>
                            </tr>
                            <tr>
                                <td>Địa chỉ:</td>
                                <td><input class="txt require" type="text" name="diachi" value=""> </td>
                            </tr>
                            <tr>
                                <td>Tiêu đề:</td>
                                <td><input class="txt require" type="text" name="subject" value="" required> </td>
                            </tr>
                            
                            <tr>
                                <td>Lời nhắn:</td>
                                <td><textarea name="noidung" class="txt area require"></textarea> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="btn_submit" class="btnSubmit" value="Gửi"></td>
                            </tr>
                            
                        </tbody></table>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
      
        <div class="clearfix"></div>
    
    <div class="clearfix"></div>
</div>