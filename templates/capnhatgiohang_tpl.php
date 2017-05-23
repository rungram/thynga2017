<?php

	for($k=$_SESSION["tongsp"];$k>=1;$k--)
	{
		echo $_POST["X".$k] ;
		
	 if($_POST["X".$k])
		
		{
	  		for($i =$k;$i <= $_SESSION["tongsp"];$i++)
				{
				$j = $i +1;
				$_SESSION["id".$i]=$_SESSION["id".$j];
				$_SESSION["ten".$i]=$_SESSION["ten".$j];
				$_SESSION["Soluong".$i]=$_SESSION["Soluong".$j];
				$_SESSION["gia".$i]=$_SESSION["gia".$j];
		
				}

			session_unregister($_SESSION["id".$i]);
			session_unregister($_SESSION["ten".$i]);
			session_unregister($_SESSION["gia".$i]);
			session_unregister($_SESSION["Soluong".$i]);
			$_SESSION["tongsp"]--;
			
		}
		else
			for($h=1;$h<=$_SESSION["tongsp"];$h++)

		    $_SESSION["Soluong".$h]=$_POST["C".$h];
	}
			
	
echo "<script>
location.href='?com=gio-hang';
</script>";

?>