<div class="gui_thongtin">
<div class="close_img"></div>



         
         


<form id="form1" name="form1" method="post" action="">
<table width="276" border="0">
  <tr>
    <td width="85">User</td>
    <td width="195">
      <label for="user"></label>
      <input name="user" type="text" id="user" size="30" />
   </td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input name="pass" type="password" id="pass" size="30" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    
      <input type="submit" name="close2" class="button" value="Login" />
    </td>
  </tr>
</table>

  </form> 
   
   
 <?php
{
	
	if(isset($_POST["user"])&&isset($_POST["pass"]))
	{
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		$d->reset();
		$lenhdangnhap = "select * from #_khachhang where user='$user' and matkhau='$pass'";
		$kqdangnhap=$d->query($lenhdangnhap);
		$result_dangnhap =$d->result_array();	
		$n=count($result_dangnhap);
		
				if($n > 0)
					{
						$_SESSION["user"]=$user;
		
						?>
    				    <script>
					
						location.href="?com=index";
						</script>
     				   <?php	
		
					}
				
	}
}
?>      
  </div>
