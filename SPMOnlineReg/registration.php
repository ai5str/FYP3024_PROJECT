<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
	<style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        .form-container {
            background-color: whitesmoke;
            border: 2px solid #ccc;
            padding: 10px;
            width: 800px;
            margin: 5px auto;
            
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        header img {
            width: 100px; /* Adjust the width as needed */
            height: auto; /* Maintain aspect ratio */
        }

        nav {
            background-color: #444;
            padding: 10px 0;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            text-decoration: underline;
            
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .hidden {
            display: none;
        }

        .button-container {
            text-align: center;
        }

        .button-container button {
            margin: 5px;
            margin-top: 30px;
        }

        .notification {
    background-color: #f44336; /* Red background */
    color: white;
    text-align: center;
    padding: 16px;
    margin: 10px 0;
    border-radius: 5px;
}

.notification.error {
    background-color: #f44336; /* Red background */
}
    </style>
</head>
<body>
	<header>
        <h1>SMAJA SPM Online Registration</h1>
    </header>
    <nav>
    	<a href="userManual.html">User Manual</a>
        <a href="registration.php">Registration</a>
        <a href="about.php">About Us</a>
        <a href="faqs.php">FAQs</a>
        <a href="userLogout.php">Log Out</a>
       
    </nav>
    <form method="post" action="confirmation.php">
	<div class="form-container">
		<img src="smaja.jpg" width="100" height="100">

		<img src="smaja.jpg" width="100" height="100" align="right">

		<hr>
		<marquee>REGISTRATION FORM</marquee>
		<hr>
		<div id="section1">

		<form>
			<table>
				<tr>
					<td>
						Name:
					</td>
					<td>
						<input type="text" placeholder="Full Name" name="fullname" size="50">
					</td>
				</tr>
				<tr>
                    <td width="80"><br></td>
                    <td width="150"><br></td>
                </tr>
				<tr>
					<td>
						IC Number:
					</td>
					<td>
						<input type="text" name="ic_number" size="50">
					</td>
				</tr>
				<tr>
                    <td width="80"><br></td>
                    <td width="150"><br></td>
                </tr>
				<tr>
					<td>
						Gender:
					</td>
					<td>
						<input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female&nbsp;
					</td>
					<td>Date of Birth</td>
	                <td>
	                    <input type="date" name="dob">
	                </td>
				</tr>
				<tr>
                    <td width="80"><br></td>
                    <td width="150"><br></td>
                </tr>
				<tr>
					<td>
						Ethnicity:
					</td>
					<td>
						<input type="text" name="ethnicity" size="30">
					</td>
					<td>
						Religion:
					</td>
					<td>
						<input type="text" name="religion" size="30">
					</td>
				</tr>
				<tr>
                    <td width="80"><br></td>
                    <td width="150"><br></td>
                </tr>
				<tr>
					<td>
						OKU Status (If Applicable):
					</td>
					<td>
						<input type="text" name="oku" size="30">
					</td>
					<td>
						OKU Card No. (If Applicable):
					</td>
					<td>
						<input type="text" name="okuCard" size="30">
					</td>
				</tr>
				<tr>
                    <td width="80"><br></td>
                    <td width="150"><br></td>
                </tr>
				<tr>
					<td>Entry:
					</td>
					<td>
                        <select name="entry">
                            <option value="spm">SPM</option>
                            <option value="spmu">SPMU</option>
                            <option value="stam">STAM</option>
                        </select>
                    </td>
                    <td>
						Year:
					</td>
					<td>
						<input type="year" name="year" size="30">
					</td>
				</tr>
				<tr>
                    <td width="80"><br></td>
                    <td width="150"><br></td>
                </tr>
				<tr>
					<td>
						Address:
					</td>
					<td>
						<input type="text" name="address" size="50">
					</td>
				</tr>
				<tr>
                    <td width="80"><br></td>
                    <td width="150"><br></td>
                </tr>
				<tr>
					<td>
						Poscode:
					</td>
					<td>
						<input type="text" name="poscode" size="30">
					</td>
					<td>
						City:
					</td>
					<td>
						<input type="text" name="city" size="30">
					</td>
				</tr>
				<tr>
                    <td width="80"><br></td>
                    <td width="150"><br></td>
                </tr>
				<tr>
					<td>
						State:
					</td>
					<td>
						<input type="text" name="state" size="30">
					</td>
					<td>
						Phone No.:
					</td>
					<td>
						<input type="text" name="phone" size="30">
					</td>
				</tr>
				<tr>
                    <td width="80"><br></td>
                    <td width="150"><br></td>
                </tr>
				<tr>
					<td>
						Email:
					</td>
					<td>
						<input type="text" name="email" size="50">
					</td>
			</table>
			<br><br>
			<p align="margin-left">Please check the box below referring to the subject you want to register:<br><br>
				<b>Compulsory Subjects:</b></p>
            	<table border="1" cellpadding="3px"style="width: 650px;">
            		<tr>
		                <td colspan="2"><input type="checkbox" name="subjects[]" value="Bahasa Melayu">1103 - Bahasa Melayu</td>
	                	<td colspan="2"><input type="checkbox" name="subjects[]" value="Bahasa Inggeris">1119 - Bahasa Inggeris</td>
	                	<td colspan="2"><input type="checkbox" name="subjects[]" value="Pendidikan Islam">1223 - Pendidikan Islam</td>
		            </tr>
		            <tr>
		                <td colspan="2"><input type="checkbox" name="subjects[]" value="Sejarah">1249 - Sejarah</td>
		                <td colspan="2"><input type="checkbox" name="subjects[]" value="Matematik">1449 - Matematik</td>
		                <td colspan="2"><input type="checkbox" name="subjects[]" value="Sains">1511 - Sains</td> <!-- New column -->
		            </tr>
		            <tr>
		                <td colspan="2"><input type="checkbox" name="subjects[]" value="Pendidikan Moral">1225 - Pendidikan Moral</td>
		            </tr>
		        </table>

	            <br>
	            <b><p align="margin-left">Elective Subjects:</p></b>
	             <table border="1" cellpadding="3px"style="width: 800px;">
	            <tr>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Kesusasteraan Inggeris">2206 - Kesusasteraan Inggeris</td>
	                	<td colspan="3"><input type="checkbox" name="subjects[]" value="Geografi">2280 - Geografi</td>
	                	<td colspan="3"><input type="checkbox" name="subjects[]" value="Bahasa Arab">2361 - Bahasa Arab</td>
		            </tr>
		            <tr>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Matematik Tambahan">3472 - Matematik Tambahan</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Pertanian">3729 - Pertanian</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Prinsip Perakaunan">3756 - Prinsip Perakaunan</td> <!-- New column -->
		            </tr>
		            <tr>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Perniagaan">3766 - Perniagaan</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Ekonomi">3767 - Ekonomi</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Fizik">4531 - Fizik</td>
		            </tr>
		            <tr>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Kimia">4541 - Kimia</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Biologi">4551 - Biologi</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Sains Tambahan">4561 - Sains Tambahan</td>
		            </tr>
		            <tr>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Tasawwur Islam">5226 - Tasawwur Islam</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Pendidikan Al-Quran dan Al-Sunnah">5227 - Pendidikan Al-Quran dan Al-Sunnah</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Pendidikan Syariah Islamiah">5228 - Pendidikan Syariah Islamiah</td>
		            </tr>
		            <tr>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Bahasa Cina">6351 - Bahasa Cina</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Bahasa Tamil">6354 - Bahasa Tamil</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Bahasa Iban">6356 - Bahasa Iban</td>
		            </tr>
		            <tr>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Bahasa Kadazandusun">6357 - Bahasa Kadazandusun</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Bahasa Semai">6358 - Bahasa Semai</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Kesusasteraan Cina">9216 - Kesusasteraan Cina</td>
		            </tr>
		            <tr>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Kesusasteraan Tamil">9217 - Kesusasteraan Tamil</td>
		                <td colspan="3"><input type="checkbox" name="subjects[]" value="Bahasa Punjabi">9378 - Bahasa Punjabi</td>
		            </tr>
		        </table>

		        <div class="button-container">
                <!-- Button to navigate to the next section if needed -->
                <button type="reset">Reset</button>
                <!-- Submit button -->
                <input type="submit" value="Submit">
            </div>
		</form>
    </div>
</div>
</body>
</html>