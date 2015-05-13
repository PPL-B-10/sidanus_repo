<?php
	
	if(!defined('BASEPATH')) exit('no direct script access allowed');
	
	class akunmodel extends CI_Model {
	
		public function dbnya()
		{
			$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

		}
		function login()
		{
			
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			
			$this->dbnya();

			$sql = "SELECT username,password,status,role FROM penjual WHERE username='$user'";
			$result = mysql_query($sql);
			$baris = mysql_fetch_array($result);
			
			
			
			if(( $user == $baris[0]) && ($pass == $baris[1]))
			{
				$temp = base_url();
				if(($baris[2]  == "aktif") )
				{
					session_start();
					$nn = rand(1,10000);
					$_SESSION['user'] = $user;
					$_SESSION['sid'] = $nn;
					$_SESSION['role'] = "penjual";
					header("location:$temp");
					
					
				}else{
					echo"<script>alert('Login gagal karena dibanned, silahkan hubungi administrator untuk informasi selengkapnya !'); location.href='$temp';</script>";
				}
				
				
				
				
			}else
			{
				$sql = "SELECT username,password,role FROM admin WHERE username='$user'";
				$result = mysql_query($sql);
				$baris = mysql_fetch_array($result);
				
				
				$temp = base_url();
				if(( $user == $baris[0]) && ($pass == $baris[1]) )
				{
					session_start();
					$nn = rand(1,10000);
					$_SESSION['user'] = $user;
					$_SESSION['sid'] = $nn;
					$_SESSION['role'] = "admin";
					header("location:$temp");
					
					
					
				}else{
					
					echo"<script>alert('Login gagal'); location.href='$temp';</script>";
				}
			}
		
			
		}
		
		function loginadmin()
		{
			
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			
			$this->dbnya();

			$sql = "SELECT password,role FROM admin where username='$user'";
			$result = mysql_query($sql);
			$baris = mysql_fetch_array($result);
			
			
			
			if($pass == $baris[0])
			{
				session_start("user");
				$_SESSION['user'] = $user;
				$_SESSION['role'] = $baris[1];
				header("location:adminview");
				
				
				
			}else
			{
				echo"gagal";
			}
		
			
		}
		
		function resetpassword()
		{
			$email = $_POST['email'];
			$newpass = $this->randomPassword();
			$newstrpass = implode("",$newpass);
			
			$sql= "UPDATE penjual set password='$newstrpass' WHERE email = '$email'";
			$result = mysql_query($sql);
			
			if(mysql_affected_rows() > 0)
			{
				$subject = 'reset password';
				$message = "you have requested new password \n\n Here is your new password: ".$newstrpass."";
				$from = 'From: SiDanus <SomeEmailAddress@Domain.com>';
				mail($email,$subject,$message,$from);
				
				header("location:resetsuccess");
			}
			else
			{
				
				header("location:wrongemail");
			}
			
		}
		
		function randomPassword()
		{
		    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		    for ($i = 0; $i < 8; $i++) {
		        $n = rand(0, strlen($alphabet));
		        $pass[$i] = $alphabet[$n];
		    }
		    return $pass;
		}
		
		function daftar($npm)
		{	
			if(!isset($_POST['email']) || !isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['ulangpassword']) || !isset($_POST['namapemilik']) || !isset($_POST['nohp']) || !isset($_POST['sex'])){
				echo "<script>
				alert('mohon lengkapi data registrasi');
				window.location.href='daftarakun';
				</script>";
				die();
			}

			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 
				echo "<script>
				alert('format email salah');
				window.location.href='daftarakun';
				</script>";
				die();
			}
			if (!is_numeric($_POST['nohp'])){
				echo "<script>
				alert('format nomor hp salah');
				window.location.href='daftarakun';
				</script>";
				die();
			}
			
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$ulangpassword = $_POST['ulangpassword'];
			$namapemilik = $_POST['namapemilik'];
			$nohp = $_POST['nohp'];
			$sex = $_POST['sex'];

			$sql = "SELECT npm FROM penjual WHERE npm='$npm'";
			$result = mysql_query($sql);
			if(mysql_affected_rows() >0)
			{
				echo "<script>
				alert('npm anda ($npm) sudah terdaftar');
				window.location.href='daftarakun';
				</script>";
				die();
			}
			
			$sql = "SELECT username FROM penjual WHERE username='$username'";
			$result = mysql_query($sql);
			if(mysql_affected_rows() >0)
			{
				echo "<script>
				alert('username sudah terdaftar');
				window.location.href='daftarakun';
				</script>";
				die();
			}
			
			$sql = "SELECT email FROM penjual WHERE email='$email'";
			$result = mysql_query($sql);
			if(mysql_affected_rows() >0)
			{
				echo "<script>
				alert('email sudah terdaftar');
				window.location.href='daftarakun';
				</script>";
				die();
			}
			
			
			if($password == $ulangpassword)
			{
				$sqlmax = "SELECT MAX(idToko) FROM penjual";
				$hasil = mysql_query($sqlmax);
				$id = mysql_fetch_array($hasil);
				$id[0] = $id[0] + 1;
				
				$sql = "INSERT INTO penjual(npm, username, namaPenjual, password, email, idToko, jenisKelamin, noHP, status, role) values('$npm','$username', '$namapemilik', '$password', '$email', '$id[0]', '$sex', '$nohp', 'aktif', 'penjual')";
				$result = mysql_query($sql);
				if(mysql_affected_rows() >0)
				{
					$sql2 = "INSERT INTO toko (idToko, namaToko, lokasi, alamat) values ('$id[0]','toko', '-', '-')";
					$resut2 = mysql_query($sql2);
					
					$subject = 'Konfirmasi akun SiDanus';
					$message = "Selamat, akun anda telah terdaftar di SiDanus \n\n username: ".$username." \n password: ".$password." \n\n silakan login untuk mulai berjualan";
					$from = 'From: SiDanus <SomeEmailAddress@Domain.com>';
					mail($email,$subject,$message,$from);
					
					echo "<script>
					alert('akun anda berhasil didaftarkan');
					window.location.href='/pplZahra/';
					</script>";
					die();
				}
				
			}else{
				echo "<script>
				alert('password mismatch');
				window.location.href='daftarakun';
				</script>";
				die();
			}			
		}
		
	
	}
	
	
	
	
	  
	  
	  ?>