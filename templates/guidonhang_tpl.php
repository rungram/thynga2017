<?php if(!defined('_source')) die("Error");
	

	$sql = "select max(id_order) as maxid_order from #_order";
	$d->query($sql);
	$maxid_order_rr	= $d->fetch_array(); 

	if(!empty($maxid_order_rr))
	$nextid_order = $maxid_order_rr['maxid_order'] + 1; 
	else
	$nextid_order = 1;
	if($_SESSION['id_order']!=-1)
	{
	//xoa order cũ 
	//delete bang don hang
	$id_order = $_SESSION['id_order'];
	$sql_dh = "delete from #_donhang where id_order='".$id_order."'";
	$d->query($sql_dh);
	//delete bang order 
	$sql_delete = "delete from #_order where id_order='".$id_order."'";
	$d->query($sql_delete);
	}
	//tao ma order chen vao order
	$code_rand	 = 'ORDER '.fns_Rand_digit2(0,9,5);
	$ngaytao	 =	lay_thoigian();
	$user	=	$_SESSION['user_dn'];
	$sql_order ="insert into #_order(ma_donhang,id_order,ngaytao,user)values('$code_rand','$nextid_order','$ngaytao','$user')";
	$send_order = $d->query($sql_order);

	if(isset($_POST["hoten2"]))
	{
		include_once _lib."C_email.php";
		
		
		//add vo database
		$tennguoidat=$_POST['hoten2'];
		$diachi=$_POST['diachi'];
		$dienthoai=$_POST['dienthoai'];
		$email=$_POST['email'];
		$tinh_tp=$_POST['tinh_tp'];
		$noidung=$_POST['noidung']; 
		if($_SESSION['user_dn'])
		$user=$_SESSION['user_dn'];
		$ngaydathang=lay_thoigian();
		$ngaytim = date('Y-m-d');
		
		$max=count($_SESSION['cart']);	
		for($i=0;$i<$max;$i++)
	
		 {
			$id_sp=$_SESSION['cart'][$i]['productid'];
			$soluong=$_SESSION['cart'][$i]['qty'];
			$tenmathang=get_product_name($id_sp);
			$hinhmathang=get_hinh($id_sp);
			$pmota=get_mota($id_sp);
			$pkodau=get_kodau($id_sp);
			$masp=get_masp($id_sp);
			$psale=get_giagiam($id_sp);
			if($psale ==0) 
			$giamathang=get_price($id_sp);
			else 
			$giamathang=get_giagiam($id_sp);
			$tenkhongdau=get_kodau($id_sp);
			$size= $_SESSION['size'.$id_sp];
				$mau= $_SESSION['mau'.$id_sp];
	
		 $tonggia=$giamathang*$soluong;
		 $d->reset();
		 $sql_sendgiohang="insert into #_donhang(tennguoidat,dienthoai,diachi,noidung,tenmathang,giamathang,soluong,ngaydathang,tonggia,hinh,user,tenkhongdau,masp,size,mau,email,tinh_tp,ngaytim,id_order,id_sp)
	values('$tennguoidat','$dienthoai','$diachi','$noidung','$tenmathang','$giamathang','$soluong','$ngaydathang','$tonggia','$hinhmathang','$user','$tenkhongdau','$masp','$size','$mau','$email','$tinh_tp','$ngaytim','$nextid_order','$id_sp')";
			 $send_giohang=$d->query($sql_sendgiohang); 
					
		 }
		
		 //add vo database
	 
	//add vo mail 
	if(!empty($email))	
	{
	$body = '<table>';
		$body .= '
		<tr>
			<th colspan="2">&nbsp;</th>
		</tr>
		<tr>
			<th colspan="2">Đơn hàng từ website</th>
		</tr>
		<tr>
			<th colspan="2">&nbsp;</th>
		</tr>
		<tr>
			<th>Họ tên :</th><td>'.$_POST['hoten2'].'</td>
		</tr>
		<tr>
			<th>Tỉnh/TP :</th><td>'.$_POST['tinh_tp'].'</td>
		</tr>
		<tr>
			<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
		</tr>
		<tr>
			<th>Email :</th><td>'.$_POST['email'].'</td>
		</tr>
		<tr>
			<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
		</tr>
		
		<tr>
			<th>Ghi chú :</th><td>'.$_POST['noidung'].'</td>
		</tr>
		
		';
		
		$body .= '</table>';
		
		
		
		//danh sach san pham
		$body .= '<table border="1" cellpadding="1" cellspacing="1">';
		$body .= 
		'<tr style="border-bottom:1px solid #cecece">
			<td align="center" width="5%">STT</td>
			<td align="center">Mã sản phẩm</td>
			<td align="center">Sản phẩm</td>
			<td align="center">Hình ảnh</td>
			<td align="center">Đơn Giá</td>
		
			<td align="center">Số lượng</td>
			<td align="center">Thành Tiền</td>
		</tr>';
	
		
		 //add vo mail	

				include_once "phpmailer/class.phpmailer.php";	
				include_once "phpmailer/class.smtp.php";	
				
				//Khởi tạo đối tượng
				$subject = "Thông tin đơn hàng.";
				//$from = "shopnana.info@gmail.com";
				$from = "nguyenleduykhang29111994@gmail.com";
				$from_name = $tennguoidat;
				
				$to = $email;
				//$to = "ngoisaoleloi@gmail.com";
				//$to = $txt_email;
				
				global $error;
				$mail = new PHPMailer();	// tạo một đối tượng mới từ class PHPMailer
				$mail->IsSMTP(); // bật chức năng SMTP
				$mail->IsSMTP(); // bật chức năng SMTP
				$mail->SMTPDebug = 0;	// kiểm tra lỗi : 1 là	hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
				$mail->SMTPAuth = true;	// bật chức năng đăng nhập vào SMTP này
				$mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
				$img = '';
				$img_url = '';
				for($i=0;$i<$max;$i++)
				{
					
				$id_sp=$_SESSION['cart'][$i]['productid'];
			$soluong=$_SESSION['cart'][$i]['qty'];
								$tenmathang=get_product_name($id_sp);
								$hinhmathang=get_hinh($id_sp);
								$pmota=get_mota($id_sp);
								$pkodau=get_kodau($id_sp);
								$psale=get_giagiam($id_sp);
								$pma=get_masp($id_sp);
							$size= $_SESSION['size'.$id_sp];
							$mau= $_SESSION['mau'.$id_sp];
							if($psale ==0)
								$giamathang=get_price($id_sp);
							else
								$giamathang=get_giagiam($id_sp);
							$j=$i+1;
							$img = get_hinh($id_sp);
							$img_url = 'upload/sanpham/'.$img;
							$mail->AddEmbeddedImage($img_url, $id_sp,$img);
							$body .='<tr>
			<td align="center" width="5%">'.$j.'</td>
		
			<td align="center">'.$pma.'</td>
			<td align="center">'.$tenmathang.'</td>
			<td align="center"><img src="cid:'.$id_sp.'"></td>
			<td align="center">'. number_format ($giamathang,0,",",".").' VNĐ</td>
				
			<td align="center">'.$soluong.'</td>
			<td align="center">'. number_format(($soluong*$giamathang),0,",",".").' VNĐ</td>
			</tr>';
							
				}
				
				$body .= '</table>';
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = 465; 
				$mail->Username = "nguyenleduykhang29111994@gmail.com";	
				$mail->Password = "Kcdagtemyatpxh1";			 
				$mail->SetFrom($from, $from_name);
				$mail->From = $from;	
				
				$mail->Subject = $subject;
//				 $mail->AddEmbeddedImage($img_url, 'Kartka',$img);
//				 $mail->Body = "<p>This is a test picture: <img src='cid:Kartka' /></p>";
				$mail->Body = $body;
				$mail->AddAddress($to);
				
				$mail->AddReplyTo($email,"Thông tin phản hồi.");// Ấn định email sẽ nhận khi người dùng reply lại.
				$mail->WordWrap = 50; // set word wrap	 
				$mail->IsHTML(true); // send as HTML
				//Thiết lập định dạng font chữ
				$mail->CharSet = "utf-8";
				if(!$mail->Send()) {
				} 
}
		if($send_order) {
		unset($_SESSION['cart']);
		redirect("index.html");
		}
	}
?>
