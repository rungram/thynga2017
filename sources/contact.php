
<?php if(!defined('_source')) die("Error");
		$title_bar .= "Liên hệ - ";
		
		$d->reset();
		$sql_company = "select * from #_setting limit 0,1";
		$d->query($sql_company);
		$company = $d->fetch_array();
		
		if(!empty($_POST)){	
		include_once "phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = "116.193.76.21"; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = "info@gianhangcongngheviet.com"; // SMTP account username
		$mail->Password   = "1234qwer!@#$";  

		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom('info@gianhangcongngheviet.com',$_POST['ten']);

		//Thiết lập thông tin người nhận
		$mail->AddAddress($company['email'], $company['ten']);
		
		//Thiết lập email nhận email hồi đáp
		//nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($_POST['email'],$_POST['ten']);

		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = $_POST['tieude1']." - ".$company['ten'];
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	

			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ từ website <a href="http://www.poolstore.vn">www.poolstore.vn</a></th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST['ten'].'</td>
				</tr>
				<tr>
					<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>

				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';
			
			$mail->Body = $body;
			if($mail->Send())
			transfer("Thông tin liên hệ được gửi.<br>Cảm ơn.", "index.php");
			else
			 transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "lien-he.php");
		}
		
		$d->reset();
		$sql_contact = "select noidung_$lang from #_lienhe ";
		$d->query($sql_contact);
		$company_contact = $d->fetch_array();
	
?>