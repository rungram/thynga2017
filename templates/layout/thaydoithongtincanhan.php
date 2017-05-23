<div class="vnt_login" style="float:right;">
    
    <div class="login-form">
        
        <div class="formMember">
            
            <form action=""  onSubmit="return CheckSignup()" name="formdangky" id="formdangky" method="post" class="validate " novalidate="novalidate">
                <div class="row_input">
                    <label for="rUserName">Tên đăng nhập<br>(viết liền không dấu) <span>*</span></label>
                    <input type="text" class="form-control required" id="user" name="user" value="<?=$info_kh["user"]?>" aria-required="true">
                 
    		  		 <span class="error" id="user_error" style="color='#FF0000'">
                      <?php
							{
							if($ktuser == 1)
							?>
							<font color="#FF0000"><?php echo $user_user ;?></font>
							<?php
							}
					  ?>
                     </span>
                </div>
                <div class="row_input">
                    <label for="rPassWord">Mật khẩu <span>*</span></label>
                    <input type="password" class="form-control required" id="matkhau" name="matkhau" value="<?=$info_kh["matkhau"]?>" autocomplete="off" aria-required="true">
                     <span class="error" id="matkhau_error" style="color='#FF0000'"></span>
                </div>
                
                <div class="row_input">
                    <label for="rEmail">Email <span>*</span></label>
                    <input type="text" class="form-control required" id="email" name="email" value="<?=$info_kh["email"]?>" aria-required="true">
                    <span class="error" id="email_error" style="color='#FF0000'">
                     <?php {
							if($ktemail == 1)
							?>
							<font color="#FF0000"><?php echo $user_email ;?></font>
							<?php
							}
					  ?>
                    </span>
                </div>
                
                <div class="row_input">
                    <label for="full_name">Họ tên <span>*</span></label>
                    
                    <input type="text" class="form-control required" id="hoten" name="hoten" value="<?=$info_kh["tenkhachhang"]?>" title="Vui lòng nhập Họ tên" aria-required="true">
                     <span class="error" id="hoten_error" style="color='#FF0000'"></span>
                </div>
                
                <div class="row_input">
                    <label for="phone">Điện thoại <span>*</span></label>
                    <input type="text" class="form-control required" id="dienthoai" name="dienthoai" value="<?=$info_kh["dienthoai"]?>" title="Vui lòng nhập Điện thoại" aria-required="true">
                    <span class="error" id="dienthoai_error" style="color='#FF0000'"></span>
                </div>
                
                 <div class="row_input">
                                    <label for="phone">Điạ chỉ <span>*</span></label>
                                    <input type="text" class="form-control required" id="diachi" name="diachi" value="<?=$info_kh["diachi"]?>" title="Vui lòng nhập địa chỉ" aria-required="true">
                                    <span class="error" id="diachi_error" style="color='#FF0000'"></span>
                 </div>
                

                <div class="remember">
                    <ul>
                        <li><input type="checkbox" name="dongy" id="dongy" checked="checked"><span>Tôi đã xem và đồng ý với quy chế của website này</span></li>
                        <span class="error" id="dongy_error" style="color='#FF0000'"></span>
                    </ul>
                </div>
                <div class="form_button">
                    <ul>
                        <li><button id="btnRegister" name="dangky" type="submit" class="btn" value="Cập nhật"><span>Cập nhật</span></button></li>
                        <li><a href="dang-nhap.html">Bạn có khoản?</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>