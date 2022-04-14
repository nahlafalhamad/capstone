<?php
define("IN_CODE",1);
include'config.php';
$fNameerror=$lNameerror=$gendererrorerror=$emailerror=$addr_line1error=$addr_line2error=$cityerror=$stateerror=$postalerror=$phoneerror=$languageserror=$birthdayerror=$smokingerror=$petserror=$transerror=$experienceerror=$educationerror=$CPRerror=$fAiderror=$careTypeerror=$howManyCerror=$ageRangeerror=$sNeedserror=$hRateerror=$usernameerror=$passworderror=$passworderror1=$uploadPicerror=$AllError=$SSerror ='';

$fName=$lName=$gender=$email=$addr_line1=$addr_line2=$city=$state=$postal=$phone=$languages=$birthday=$smoking=$pets=$trans=$experience=$education=$CPR=$fAid=$careType=$howManyC=$ageRange=$sNeeds=$hRate=$username=$password=$password2=$sNeeds=$SS='';
$flag=0;
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 
}
if(isset($_POST['submit'])) {
	$fName=test_input($_POST["fName"]);
	$lName=test_input($_POST["lName"]);
	$phone=test_input($_POST["phone"]);
	$postal=test_input($_POST["postal"]);
	$email=test_input($_POST["email"]);
	$SS=test_input($_POST["SS"]);
	
	

	$state=$_POST["state"];
	$hRate=$_POST["hRate"];
	if (isset($_POST["careType"]))$careType=$_POST["careType"]; else $careType="";
		if (isset($_POST["sNeeds"]))$sNeeds=$_POST["sNeeds"]; else $sNeeds="";
	if (isset($_POST["CPR"]))$CPR=$_POST["CPR"]; else $CPR="";
	if (isset($_POST["fAid"]))$fAid=$_POST["fAid"]; else $fAid="";
	if (isset($_POST["education"]))$education=$_POST["education"]; else $education="";
		if (isset($_POST["education"]))$education=$_POST["education"]; else $education="";

		if (isset($_POST["languages"]))$languages=$_POST["languages"]; else $languages="";

		if (isset($_POST["experience"]))$experience=$_POST["experience"]; else $experience="";
		if (isset($_POST["gender"]))$gender=$_POST["gender"]; else $gender="";
			if (isset($_POST["pets"]))$pets=$_POST["pets"]; else $pets="";
if (isset($_POST["smoking"]))$smoking=$_POST["smoking"]; else $smoking="";
			if (isset($_POST["trans"]))$trans=$_POST["trans"]; else $trans="";



	$howManyC=$_POST["howManyC"];
	$ageRange=$_POST["ageRange"];
	$birthday=$_POST["birthday"];
	$city=$_POST["city"];
	$addr_line1=$_POST["addr_line1"];
	$addr_line2=$_POST["addr_line2"];
	$username=test_input($_POST["username"]);
$password=test_input($_POST["password"]);
	$password2=test_input($_POST["password2"]);
	if(!preg_match("/^[a-zA-Z-' -]{2,26}/",$fName)){
	$fNameerror = "<FONT COLOR='#ff0000'>*First Name is invalid</font>";
		$AllError=$AllError.$fNameerror."<br>";
	$flag=1;
	}
	
	
	///////////////////////////////////////
 
	if(!preg_match("/^[0-9]{9}/",$SS)){
	$SSerror = "<FONT COLOR='#ff0000'>*Social Security is invalid</font>";
		$AllError=$AllError.$SSerror."<br>";
	$flag=1;
	}
	
	///////////////////////////////////////
 
	if(!preg_match("/^[a-zA-Z-' -]{2,26}/",$lName)){
	$lNameerror = "<FONT COLOR='#ff0000'>*Last Name is invalid</font>";
		$AllError=$AllError.$lNameerror."<br>";
	$flag=1;
	}

	//////////////////////////////////////////////////////
	
	if(preg_match("/[0-9]{10}/", $phone) === 0){
	$phoneerror = "<FONT COLOR='#ff0000'>*Phone number is invalid</font>";
		$AllError=$AllError.$phoneerror."<br>";
	$flag=1;
	}
	
	///////////////////////////////////////////////////
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerror = "<FONT COLOR='#ff0000'>*Invalid email format</font>";
				$AllError=$AllError.$emailerror."<br>";

		$flag=1;
    }
	////////////////////////////////////////////////

	if(preg_match("/[0-9]{5}/", $postal) === 0) {
  $postalerror="<font color='#ff0000'>*Zip code is invalid</font>";
						$AllError=$AllError.$postalerror."<br>";

		$flag=1;
}
	
///////////////////////////////////////////////	
if(preg_match("/[a-zA-Z]{8,20}/", $username) === 0) {
  $usernameerror="<font color='#ff0000'>*Username is invalid</font>";
$AllError=$AllError.$usernameerror."<br>";
		$flag=1;
}
	else{
		$sql="select loginID  from login where username ='$username'";
	 $resultsql=mysqli_query($con,$sql);
$row=mysqli_num_rows($resultsql);
    if($row != 0){
     $usernameerror="<FONT COLOR='#ff0000'>*This username is already exist</font>";
		$AllError=$AllError.$usernameerror."<br>";

		$flag=1;
    }
		
		
	}
	
///////////////////////////////////////////////		
	if(preg_match("/[0-9A-Za-z!@#$%]{8,20}/", $password) === 0) {
  $passworderror="<font color='#ff0000'>*Password is invalid</font>";
		$AllError=$AllError.$passworderror."<br>";

		$flag=1;
}
	
///////////////////////////////////////////////	
	
if($password != $password2) {
  $passworderror1="<font color='#ff0000'>*Passwords are not matching</font>";
			$AllError=$AllError.$passworderror1."<br>";

		$flag=1;
}
	
///////////////////////////////////////////////	
	function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
	
	//////////////////
	/*
	if((($_POST["sunF"] == $_POST["sunT"])&&($_POST["sunF"]!="DAYOFF")&&($_POST["sunT"]!="DAYOFF")) ||  (($_POST["sunF"]!="DAYOFF")&&($_POST["sunT"]=="DAYOFF")) || (($_POST["sunF"]=="DAYOFF")&&($_POST["sunT"]!="DAYOFF"))  ) {
  $sunerror="<font color='#ff0000'>*Sunday schedule is invalid</font>";
  			$AllError=$AllError.$sunerror."<br>";

	$flag=1;
}
	
///////////////////////////////////////////////		
	if((($_POST["moF"] == $_POST["moT"])&($_POST["moF"]!="DAYOFF")&&($_POST["moT"]!="DAYOFF")) ||  (($_POST["moF"]!="DAYOFF")&&($_POST["moT"]=="DAYOFF")) || (($_POST["moF"]=="DAYOFF")&&($_POST["moT"]!="DAYOFF"))  ) {
  $monerror="<font color='#ff0000'>*Monday schedule is invalid</font>";
		  			$AllError=$AllError.$monerror."<br>";

	$flag=1;
}
	
///////////////////////////////////////////////	
	if((($_POST["tuF"] == $_POST["tuT"])&($_POST["tuF"]!="DAYOFF")&($_POST["tuT"]!="DAYOFF")) ||  (($_POST["tuF"]!="DAYOFF")&($_POST["tuT"]=="DAYOFF")) || (($_POST["tuF"]=="DAYOFF")&($_POST["tuT"]!="DAYOFF"))  ) {
  $tuerror="<font color='#ff0000'>*Tuesday schedule is invalid</font>";
		  			$AllError=$AllError.$tuerror."<br>";

	$flag=1;
}
	
///////////////////////////////////////////////	
	if((($_POST["weF"] == $_POST["weT"])&($_POST["weF"]!="DAYOFF")&($_POST["weT"]!="DAYOFF")) ||  (($_POST["weF"]!="DAYOFF")&($_POST["weT"]=="DAYOFF")) || (($_POST["weF"]=="DAYOFF")&($_POST["weT"]!="DAYOFF"))  ) {
  $weerror="<font color='#ff0000'>*Wedensday schedule is invalid</font>";
		  			$AllError=$AllError.$weerror."<br>";

	$flag=1;
}
	
///////////////////////////////////////////////	
	if((($_POST["thF"] == $_POST["thT"])&($_POST["thF"]!="DAYOFF")&($_POST["thT"]!="DAYOFF")) ||  (($_POST["thF"]!="DAYOFF")&($_POST["thT"]=="DAYOFF")) || (($_POST["thF"]=="DAYOFF")&($_POST["thT"]!="DAYOFF"))  ) {
  $therror="<font color='#ff0000'>*Thursday schedule is invalid</font>";
				  			$AllError=$AllError.$therror."<br>";

	$flag=1;
}
	
///////////////////////////////////////////////	
		if((($_POST["frF"] == $_POST["frT"])&($_POST["frF"]!="DAYOFF")&($_POST["frT"]!="DAYOFF")) ||  (($_POST["frF"]!="DAYOFF")&($_POST["frT"]=="DAYOFF")) || (($_POST["frF"]=="DAYOFF")&($_POST["frT"]!="DAYOFF"))  ) {
  $frerror="<font color='#ff0000'>*Friday schedule is invalid</font>";
					  			$AllError=$AllError.$frerror."<br>";

	$flag=1;
}
	
///////////////////////////////////////////////	
	if((($_POST["saF"] == $_POST["saT"])&&($_POST["saF"]!="DAYOFF")&&($_POST["saT"]!="DAYOFF")) ||  (($_POST["saF"]!="DAYOFF")&&($_POST["saT"]=="DAYOFF")) || (($_POST["saF"]=="DAYOFF")&&($_POST["saT"]!="DAYOFF"))  ) {
  $saerror="<font color='#ff0000'>*Saturday schedule is invalid</font>";
				  			$AllError=$AllError.$saerror."<br>";

	$flag=1;
}
*/

///////////////////////////////////////////////	

	/*if ($_FILES["uploadPic"]["size"] > 500000) {
  $uploadPicerror= "<font color='#ff0000'>*Your file size is too large</font>";
  $flag=1;
}
*/
	///////////////////////////////////////////////
	
	
	
	
	
	if($flag!=1){
				
	   
	$query1= "insert into caregiver(fname ,lname, email ,phonenumber ,gender ,addressLine1 ,addressLine2 ,city ,state ,zipcode ,SS ,birthdate ,smoking  ,pets ,transportation  ,caringType, childrenNo, ageRange, specialNeeds ,hourlyRate ,fAid ,CPR,education ,experience ,cStatus ) values('$fName','$lName','$email','$phone','$gender','$addr_line1','$addr_line2','$city','$state','$postal','$SS','$birthday','$smoking','$pets','$trans','$careType',$howManyC,'$ageRange','$sNeeds','$hRate','$fAid','$CPR','$education',$experience,'Pending')";
	
	
	 if(mysqli_query($con,$query1)){
   // $last_id = mysqli_insert_id($con);
   	$sqlID="select max(caregiverID)from caregiver where SS='$SS' and email='$email' ";
	$result=mysqli_query($con,$sqlID);
	$last_id = mysqli_fetch_array($result, MYSQLI_NUM);
///////////////////////////////////////////////////////////////////////////picture 
$temp = explode(".", $_FILES["uploadPic"]["name"]);
$targetpic = "files/pictures/".$last_id[0]. '.' . end($temp);
move_uploaded_file($_FILES["uploadPic"]["tmp_name"], $targetpic);			 
$sqls="update caregiver set picture='$targetpic' where caregiverID=$last_id[0]"; 
$query_run=mysqli_query($con,$sqls);	 
		 
		 
///////////////////////////////////////////////////////////////////////		 
   
		 foreach($_POST['languages'] as $items){
        $query="insert into caregiverLangs(caregiverID,langName)values($last_id[0],'$items')";
		$query_run=mysqli_query($con,$query);
			 
		 }
		 
///////////////////////////////////////multi file upload/////////////////////
		 $targetpic1 = "files/documents/".$last_id[0]."/" ;	
	     mkdir($targetpic1, 0777, true);
		 	
		$countfiles = count($_FILES['uploadfile']['name']);
    for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['uploadfile']['name'][$i];
		$targetpic_file1 = $targetpic1 . basename($_FILES['uploadfile']['name'][$i]);
		$queryi="insert into careGiverFiles(caregiverID ,fPath) values($last_id[0],'$targetpic_file1')";
		mysqli_query($con,$queryi);
		move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $targetpic_file1);
		
	
       
    }
		/////////////
		 
		
		 		 
		 
		 
		 
		 $query2="insert into login(username,PASSWORD,userID,usertype) values('$username','$password',$last_id[0],'caregiver')";
		 echo $query2; 
		 
      if(mysqli_query($con,$query2)){
		 header('Location:smsg.php');

       //  header('Location:Index.php');
	 }
    
            
            
        }
		 else
		 header('Location:emsg.php');
   
		

		
		
	}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		///////////////////
	
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Care Giver Registration</title>
	<link href="css/multiColumnTemplate.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
    <div class='primary_header'>
		<center><img src='img/banner4.jpg' ></center>
    </div>
    <nav class='secondary_header' id='menu'>
      <ul>
		 
		  <a href="index.php"><li>Home</li></a>
          <a href="login.php"><li>Login</li></a>
		  <a href="signupSeeker.php"><li>Care Seeker Sign Up</li></a>
		  <a href="#"><li>Regulations</li></a>
		  <a href="#"><li>Contact Us</li></a>
        
      </ul>
    </nav>
  </header>	
	
	
	<table width="95%" align="center">
	
						<tr align="center" bgcolor="#E5E5E5"  ><th><h1><img src="img/signup.png" width="70">Caregiver Registration Form</h1></th></tr>

		<tr align="center" bgcolor="#E5E5E5">
	
			
			
			
			
			
			
			<td>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  enctype="multipart/form-data">
			<table width="70%" cellspacing="10" cellpadding="5">
				<tr><td colspan="3"><?php echo $AllError;?></td></tr>
				<tr bgcolor="#f7942f" align="center"><td colspan="3"><h3>Personal Information </h3></td></tr>
			<tr><td>First Name</td><td><input type="text"  name="fName"  size="26"  maxlength="26"   value="<?php echo $fName;?>" required></td><td><?php echo $fNameerror;?></td></tr>
			<tr><td>Last Name</td><td><input type="text"  name="lName"  size="26"  maxlength="26"  value="<?php echo $lName;?>" required></td><td><?php echo $lNameerror;?></td></tr>
				
			<tr><td>Social Security</td><td><input type="text"  name="SS"  size="26"  maxlength="9"  value="<?php echo $SS;?>" required></td><td><?php echo $SSerror;?></td></tr>	
				
				
				
			<tr><td>Email</td><td><input type="text"  name="email"  size="26"  maxlength="26" placeholder="example@example.com" value="<?php echo $email;?>" required></td><td><?php echo $emailerror;?></td></tr>
		   <tr><td>Phone Number</td><td><input type="text"  name="phone"  size="10"  maxlength="10"  value="<?php echo $phone;?>"required></td><td><?php echo $phoneerror;?></td></tr>
			<tr><td>Gender</td><td><input type="radio" required name="gender" value="Male" <?php if (isset($gender) && $gender=="Male") echo "checked";?>>Male  <input type="radio" required name="gender" value="Female" <?php if (isset($gender) && $gender=="Female") echo "checked";?>>Female</td><td></td></tr>

		   <tr><td>Adress</td><td><input type="text"  name="addr_line1"  size="26"   placeholder="Street Adress" value="<?php echo $addr_line1; ?>" required></td><td></td></tr>
				
			 <tr><td></td><td><input type="text"  name="addr_line2"  size="26"   placeholder="Street Adress Line 2" value="<?php echo $addr_line2; ?>" ></td><td></td></tr>
<tr><td></td><td><input type="text"  name="city"  size="26"   placeholder="City" value="<?php echo $city;?>" required></td><td></td></tr>
<tr><td></td><td><input type="text"  name="postal"  size="5"   placeholder="zip code" value="<?php echo $postal;?>" maxlength="5" required></td><td><?php echo $postalerror;?></td></tr>				
				
				
				

				<tr><td></td><td><select name="state" required>
                      <option selected="" value=" <?php if($state != "")echo $state ?>"> <?php if($state=="")echo "Please Select your state"; else echo $state;?></option>
                      <option value="Alabama"> Alabama </option>
                      <option value="Alaska"> Alaska </option>
                      <option value="Arizona"> Arizona </option>
                      <option value="Arkansas"> Arkansas </option>
                      <option value="California"> California </option>
                      <option value="Colorado"> Colorado </option>
                      <option value="Connecticut"> Connecticut </option>
                      <option value="Delaware"> Delaware </option>
                      <option value="District of Columbia"> District of Columbia </option>
                      <option value="Florida"> Florida </option>
                      <option value="Georgia"> Georgia </option>
                      <option value="Hawaii"> Hawaii </option>
                      <option value="Idaho"> Idaho </option>
                      <option value="Illinois"> Illinois </option>
                      <option value="Indiana"> Indiana </option>
                      <option value="Iowa"> Iowa </option>
                      <option value="Kansas"> Kansas </option>
                      <option value="Kentucky"> Kentucky </option>
                      <option value="Louisiana"> Louisiana </option>
                      <option value="Maine"> Maine </option>
                      <option value="Maryland"> Maryland </option>
                      <option value="Massachusetts"> Massachusetts </option>
                      <option value="Michigan"> Michigan </option>
                      <option value="Minnesota"> Minnesota </option>
                      <option value="Mississippi"> Mississippi </option>
                      <option value="Missouri"> Missouri </option>
                      <option value="Montana"> Montana </option>
                      <option value="Nebraska"> Nebraska </option>
                      <option value="Nevada"> Nevada </option>
                      <option value="New Hampshire"> New Hampshire </option>
                      <option value="New Jersey"> New Jersey </option>
                      <option value="New Mexico"> New Mexico </option>
                      <option value="New York"> New York </option>
                      <option value="North Carolina"> North Carolina </option>
                      <option value="North Dakota"> North Dakota </option>
                      <option value="Ohio"> Ohio </option>
                      <option value="Oklahoma"> Oklahoma </option>
                      <option value="Oregon"> Oregon </option>
                      <option value="Pennsylvania"> Pennsylvania </option>
                      <option value="Puerto Rico"> Puerto Rico </option>
                      <option value="Rhode Island"> Rhode Island </option>
                      <option value="South Carolina"> South Carolina </option>
                      <option value="South Dakota"> South Dakota </option>
                      <option value="Tennessee"> Tennessee </option>
                      <option value="Texas"> Texas </option>
                      <option value="Utah"> Utah </option>
                      <option value="Vermont"> Vermont </option>
                      <option value="Virgin Islands"> Virgin Islands </option>
                      <option value="Virginia"> Virginia </option>
                      <option value="Washington"> Washington </option>
                      <option value="West Virginia"> West Virginia </option>
                      <option value="Wisconsin"> Wisconsin </option>
                      <option value="Wyoming"> Wyoming </option>
                    </select>
				    </td><td></td></tr>
				<tr><td>Birth Date</td><td><input type="date"  name="birthday" value="<?php echo $birthday; ?>" required></td><td></td></tr>
			<tr><td>Upload Your Picture</td><td><input type="file"  name="uploadPic"  accept="image/png, image/gif, image/jpeg ,image/jpg"  data-file-maxsize="10854" required>
			<font size="-1" color='#767373'>*Only (jpg,jpeg,png,gif) files</font></td><td><?php echo $uploadPicerror; ?></td></tr>
<tr align="center" bgcolor="#f7942f"><td colspan="3"><h3>Preferences </h3></td></tr>
				
<tr><td> Are You Smoking?</td><td><input type="radio" required name="smoking" value="Yes" <?php if (isset($smoking) && $smoking=="Yes") echo "checked";?>>Yes  <input type="radio" name="smoking" value="No" <?php if (isset($smoking) && $smoking=="No") echo "checked";?>>No</td><td></td></tr>
<tr><td> Are you Comfortable with pets?</td><td><input type="radio" required name="pets" value="Yes" <?php if (isset($pets) && $pets=="Yes") echo "checked";?>>Yes  <input type="radio" name="pets" value="No" <?php if (isset($pets) && $pets=="No") echo "checked";?>>No</td><td></td></tr>
<tr><td>Do you have transportation?</td><td><input type="radio" required name="trans" value="Yes" <?php if (isset($trans) && $trans=="Yes") echo "checked";?>>Yes  <input type="radio" name="trans" value="No"  <?php if (isset($trans) && $trans=="No") echo "checked";?>>No</td><td></td></tr>
<tr align="center" bgcolor="#f7942f"><td colspan="3"><h3>Qualifications</h3></td></tr>
<tr><td>Experience</td><td><select  name="experience" style="width:150px" data-component="dropdown" required>
              <option selected="" value=" <?php if($experience != "")echo $experience ?>"> <?php if($experience=="")echo "Please Select"; else echo $experience;?></option>
              <option value="1"> 1 </option>
              <option value="2"> 2 </option>
              <option value="3"> 3 </option>
              <option value="4"> 4 </option>
              <option value="5"> 5 </option>
              <option value="6"> 6 </option>
              <option value="7"> 7 </option>
              <option value="8"> 8 </option>
              <option value="9"> 9 </option>
              <option value="10+"> 10+ </option>
            </select></td><td></td></tr>	
				
				<tr><td>What Languages do you speak?</td><td><select name="languages[]" style="width:150px" data-component="dropdown"  multiple required>
              
  <option value="Afrikaans" <?php if($languages == "Afrikaans")echo "selected"?>>Afrikaans</option>
  <option value="Albanian" <?php if($languages == "Albanian")echo "selected"?>>Albanian</option>
  <option value="Arabic" <?php if($languages == "Arabic")echo "selected"?>>Arabic</option>
  <option value="Armenian" <?php if($languages == "Armenian")echo "selected"?>>Armenian</option>
  <option value="Basque" <?php if($languages == "Basque")echo "selected"?>>Basque</option>
  <option value="Bengali" <?php if($languages == "Bengali")echo "selected"?>>Bengali</option>
  <option value="Bulgarian" <?php if($languages == "Bulgarian")echo "selected"?>>Bulgarian</option>
  <option value="Catalan" <?php if($languages == "Catalan")echo "selected"?>>Catalan</option>
  <option value="Cambodian" <?php if($languages == "Cambodian")echo "selected"?>>Cambodian</option>
  <option value="Chinese" <?php if($languages == "Chinese")echo "selected"?>>Chinese (Mandarin)</option>
  <option value="Croatian" <?php if($languages == "Croatian")echo "selected"?>>Croatian</option>
  <option value="Czech" <?php if($languages == "Czech")echo "selected"?>>Czech</option>
  <option value="Danish" <?php if($languages == "Danish")echo "selected"?>>Danish</option>
  <option value="Dutch" <?php if($languages == "Dutch")echo "selected"?>>Dutch</option>
  <option value="English" <?php if($languages == "English")echo "selected"?>>English</option>
  <option value="Estonian" <?php if($languages == "Estonian")echo "selected"?>>Estonian</option>
  <option value="Fiji" <?php if($languages == "Fiji")echo "selected"?>>Fiji</option>
  <option value="Finnish" <?php if($languages == "Finnish")echo "selected"?>>Finnish</option>
  <option value="French" <?php if($languages == "French")echo "selected"?>>French</option>
  <option value="Georgian" <?php if($languages == "Georgian")echo "selected"?>>Georgian</option>
  <option value="German" <?php if($languages == "German")echo "selected"?>>German</option>
  <option value="Greek" <?php if($languages == "Greek")echo "selected"?>>Greek</option>
  <option value="Gujarati" <?php if($languages == "Gujarati")echo "selected"?>>Gujarati</option>
  <option value="Hebrew" <?php if($languages == "Hebrew")echo "selected"?>>Hebrew</option>
  <option value="Hindi" <?php if($languages == "Hindi")echo "selected"?>>Hindi</option>
  <option value="Hungarian" <?php if($languages == "Hungarian")echo "selected"?>>Hungarian</option>
  <option value="Icelandic" <?php if($languages == "Icelandic")echo "selected"?>>Icelandic</option>
  <option value="Indonesian" <?php if($languages == "Indonesian")echo "selected"?>>Indonesian</option>
  <option value="Irish" <?php if($languages == "Irish")echo "selected"?>>Irish</option>
  <option value="Italian" <?php if($languages == "Italian")echo "selected"?>>Italian</option>
  <option value="Japanese" <?php if($languages == "Japanese")echo "selected"?>>Japanese</option>
  <option value="Javanese" <?php if($languages == "Javanese")echo "selected"?>>Javanese</option>
  <option value="Korean" <?php if($languages == "Korean")echo "selected"?>>Korean</option>
  <option value="Latin" <?php if($languages == "Latin")echo "selected"?>>Latin</option>
  <option value="Latvian" <?php if($languages == "Latvian")echo "selected"?>>Latvian</option>
  <option value="Lithuanian" <?php if($languages == "Lithuanian")echo "selected"?>>Lithuanian</option>
  <option value="Macedonian" <?php if($languages == "Macedonian")echo "selected"?>>Macedonian</option>
  <option value="Malay" <?php if($languages == "Malay")echo "selected"?>>Malay</option>
  <option value="Malayalam" <?php if($languages == "Malayalam")echo "selected"?>>Malayalam</option>
  <option value="Maltese" <?php if($languages == "Maltese")echo "selected"?>>Maltese</option>
  <option value="Maori" <?php if($languages == "Maori")echo "selected"?>>Maori</option>
  <option value="Marathi" <?php if($languages == "Marathi")echo "selected"?>>Marathi</option>
  <option value="Mongolian" <?php if($languages == "Mongolian")echo "selected"?>>Mongolian</option>
  <option value="Nepali" <?php if($languages == "Nepali")echo "selected"?>>Nepali</option>
  <option value="Norwegian" <?php if($languages == "Norwegian")echo "selected"?>>Norwegian</option>
  <option value="Persian" <?php if($languages == "Persian")echo "selected"?>>Persian</option>
  <option value="Polish" <?php if($languages == "Polish")echo "selected"?>>Polish</option>
  <option value="Portuguese" <?php if($languages == "Portuguese")echo "selected"?>>Portuguese</option>
  <option value="Punjabi" <?php if($languages == "Punjabi")echo "selected"?>>Punjabi</option>
  <option value="Quechua" <?php if($languages == "Quechua")echo "selected"?>>Quechua</option>
  <option value="Romanian" <?php if($languages == "Romanian")echo "selected"?>>Romanian</option>
  <option value="Russian" <?php if($languages == "Russian")echo "selected"?>>Russian</option>
  <option value="Samoan" <?php if($languages == "Samoan")echo "selected"?>>Samoan</option>
  <option value="Serbian" <?php if($languages == "Serbian")echo "selected"?>>Serbian</option>
  <option value="Slovak" <?php if($languages == "Slovak")echo "selected"?>>Slovak</option>
  <option value="Slovenian" <?php if($languages == "Slovenian")echo "selected"?>>Slovenian</option>
  <option value="Spanish" <?php if($languages == "Spanish")echo "selected"?>>Spanish</option>
  <option value="Swahili" <?php if($languages == "Swahili")echo "selected"?>>Swahili</option>
  <option value="Swedish" <?php if($languages == "Swedish")echo "selected"?>>Swedish </option>
  <option value="Tamil" <?php if($languages == "Tamil")echo "selected"?>>Tamil</option>
  <option value="Tatar" <?php if($languages == "Tatar")echo "selected"?>>Tatar</option>
  <option value="Telugu" <?php if($languages == "Telugu")echo "selected"?>>Telugu</option>
  <option value="Thai" <?php if($languages == "Thai")echo "selected"?>>Thai</option>
  <option value="Tibetan" <?php if($languages == "Tibetan")echo "selected"?>>Tibetan</option>
 <option value="Tonga" <?php if($languages == "Tonga")echo "selected"?>>Tonga</option>
  <option value="Turkish" <?php if($languages == "Turkish")echo "selected"?>>Turkish</option>
  <option value="Ukrainian" <?php if($languages == "Ukrainian")echo "selected"?>>Ukrainian</option>
  <option value="Urdu" <?php if($languages == "Urdu")echo "selected"?>>Urdu</option>
  <option value="UzbekZ" <?php if($languages == "UzbekZ")echo "selected"?>>Uzbek</option>
  <option value="Vietnamese" <?php if($languages == "Vietnamese")echo "selected"?>>Vietnamese</option>
  <option value="Welsh" <?php if($languages == "Welsh")echo "selected"?>>Welsh</option>
  <option value="Xhosa" <?php if($languages == "Xhosa")echo "selected"?>>Xhosa</option>
				
            </select>
				<font size="-1" color='#767373'>*Press Ctrl to select more than one language</font></td><td></td></tr>	
				
<tr><td> Education</td><td>
<input type="radio"  name="education" required value="High School Diploma" <?php if (isset($trans) && $trans=="Y") echo "checked";?> />
                <label for="input_107_0"> High School Diploma </label></td><td></td></tr>	
				           
              	
	<tr><td></td><td> <input type="radio" aria-describedby="label_107"  name="education" value="Associate Degree or Certificate"  <?php if (isset($education) && $education=="Associate Degree or Certificate") echo "checked";?>/>
                <label id="label_input_107_1" for="input_107_1"> Associate Degree or Certificate </label></td><td></td></tr>
	
	<tr><td></td><td><input type="radio" aria-describedby="label_107" class="form-radio validate[required]" id="input_107_2" name="education" value="Bachelor Degree"  <?php if (isset($education) && $education=="Bachelor Degree") echo "checked";?>/>
                <label id="label_input_107_2" for="input_107_2"> Bachelor's Degree </label></td><td></td></tr>
				<tr><td></td><td><input type="radio" aria-describedby="label_107" class="form-radio validate[required]" id="input_107_3" name="education" value="Master Degree"  <?php if (isset($education) && $education=="Master Degree") echo "checked";?>/>
                <label id="label_input_107_3" for="input_107_3"> Master's Degree </label></td><td></td></tr>
				<tr><td></td><td><input type="radio" aria-describedby="label_107" class="form-radio validate[required]" id="input_107_4" name="education" value="Ph.D. or Advanced Professional Degree"  <?php if (isset($education) && $education=="Ph.D. or Advanced Professional Degree") echo "checked";?>/>
                <label id="label_input_107_4" for="input_107_4"> Ph.D. or Advanced Professional Degree </label></td><td></td></tr>
					<tr><td></td><td></td><td></td></tr>

	<tr><td> First Aid Training </td><td><input type="radio" required name="fAid" value="Yes" <?php if (isset($fAid) && $fAid=="Yes") echo "checked";?>>Yes  <input type="radio" name="fAid" value="No" <?php if (isset($fAid) && $fAid=="No") echo "checked";?>>No</td><td></td></tr>
<tr><td>CPR Training</td><td><input type="radio" name="CPR" required value="Yes" <?php if (isset($CPR) && $CPR=="Yes") echo "checked";?>>Yes  <input type="radio" name="CPR" value="No" <?php if (isset($CPR) && $CPR=="No") echo "checked";?>>No</td><td></td></tr>
	<tr><td>Upload Your File</td><td><input type="file" id="input_102" name="uploadfile[]"  accept="application/pdf"  required  multiple=""  data-imagevalidate="yes" data-file-accept="pdf" data-file-maxsize="10854" data-file-minsize="0" data-file-limit="" data-component="fileupload"/>
	  <font size="-1" color='#767373'>*Only pdf files</font></td><td></td></tr>			
				 
	<tr align="center" bgcolor="#f7942f"><td colspan="3"><h3>Service</h3></td></tr>
		<tr><td>Care Type </td><td><input type="radio" aria-describedby="label_45" name="careType" value="Children" <?php if (isset($careType) && $careType=="Children") echo "checked";?>  required/>
			<label id="label_input_45_0" for="input_45_0"> Children </label></td></tr>
				
				<tr><td></td><td><input type="radio" aria-describedby="label_45" name="careType" value="Elderly"  <?php if (isset($careType) && $careType=="Elderly") echo "checked";?>/>
			<label id="label_input_45_0" for="input_45_0"> Elderly </label></td></tr>
				
				<tr><td></td><td><input type="radio" aria-describedby="label_45" name="careType" value="both" <?php if (isset($careType) && $careType=="both") echo "checked";?> />
			<label id="label_input_45_0" for="input_45_0"> Both </label></td></tr>
				
				
				<tr><td>How Many Child </td><td><select  id="input_52" name="howManyC" style="width:150px" data-component="dropdown" required>
              <option value="">Select</option>
              <option value="1" <?php if($howManyC == "1")echo "selected"?>> 1 </option>
              <option value="2" <?php if($howManyC == "2")echo "selected"?>> 2 </option>
              <option value="3" <?php if($howManyC == "3")echo "selected"?>> 3 </option>
              <option value="4" <?php if($howManyC == "4")echo "selected"?>> 4 </option>
              <option value="5" <?php if($howManyC == "5")echo "selected"?>> 5 </option>
              <option value="6" <?php if($howManyC == "6")echo "selected"?>> 6 </option>
            </select></td></tr>
				
				
				
				<tr><td>The Age Range </td><td><select  id="input_52" name="ageRange" style="width:150px" data-component="dropdown" required>
              <option value="">Select</option>
              <option value="1-11 mo" <?php if($ageRange == "1-11 mo")echo "selected"?>> 1-11 mo </option>
              <option value="1-3 yrs" <?php if($ageRange == "1-3 yrs")echo "selected"?>> 1-3 yrs </option>
              <option value="4-6 yrs" <?php if($ageRange == "4-6 yrs")echo "selected"?>> 4-6 yrs </option>
              <option value="7-12 yrs" <?php if($ageRange == "7-12 yrs")echo "selected"?>> 7-12 yrs </option>
              
            </select></td></tr>
				
				
		<tr><td>Special Needs</td><td><input type="radio" name="sNeeds" value="Yes" <?php if (isset($sNeeds) && $sNeeds=="Yes") echo "checked";?> required>Yes <input type="radio" name="sNeeds" value="No" <?php if (isset($sNeeds) && $sNeeds=="No") echo "checked";?>>No</td><td></td></tr>		
		<tr><td>Hourly Rate $</td><td><select  id="input_52" name="hRate" style="width:150px" data-component="dropdown" required >
              <option  value="">Select</option>
              <option  value="13-18 USD" <?php if($hRate == "13-18 USD")echo "selected"?>>13-18 USD </option>
              <option value="19-24 USD" <?php if($hRate == "19-24 USD")echo "selected"?>> 19-24 USD </option>
              <option value="25-30 USD" <?php if($hRate == "25-30 USD")echo "selected"?>> 25-30 USD </option>
              <option value="31-36 USD" <?php if($hRate == "31-36 USD")echo "selected"?>> 31-36 USD </option>
              
            </select></td></tr>		
			
				
			<tr align="center" bgcolor="#f7942f"><td colspan="3"><h3>Sign in </h3></td></tr>	
			<tr><td>Username</td><td><input type="text"  name="username"  size="26"  maxlength="20" value="<?php echo $username;?>" required ></td><td><?php echo $usernameerror; ?></td></tr>
			<tr><td>Password</td><td><input type="password"  name="password"  size="26"  maxlength="20" value="<?php echo $password;?>" required></td><td><?php echo $passworderror; ?></td></tr>	
			<tr><td>Confirm Password</td><td><input type="password"  name="password2"  size="26"  maxlength="20" value="<?php echo $password2;?>" required></td><td><?php echo $passworderror1;?></td></tr>	
			
				
				
								
					<tr><td colspan="2" align="center"><hr></td></tr>
	
				
				
				
				
				
				
				
				
				
				

				<tr><td colspan="2" align="center"><input type="submit" class="submit" name='submit'></td></tr>
			
			</table >
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</form>
			</td></tr>
		
		
		
		
		
		
		
		
		
		
		
		
		<tr><td></td></tr>
	
	</table>
	
	
	 <div class="social">
	  
    <p class="social_icon"><a href='https://www.njhelps.org/'><img src="img/njhelp.gif" width="100" alt="" class="thumbnail"/></a></p>
    <p class="social_icon"><a href='https://www.njchildsupport.org/'><img src="img/logochild.png" width="100" alt="" class="thumbnail"/></a></p>
    <p class="social_icon"><a href='https://www.state.nj.us/humanservices/'><img src="img/s.jpg" width="100" alt="" class="thumbnail"/></a></p>
    <p class="social_icon"><a href='https://www.nj.gov/dcf/'><img src="img/ssss.png" width="100" alt="" class="thumbnail"/></a></p>
  </div>
  <footer class="secondary_header footer">
	  <div><p align="center"><font color="#E7E2E3" size="-1">Bridgeforcares.com does not employ any caregiver and is not responsible for the conduct of any user of our site. All information in member profiles, job posts, applications, and messages<br> is created by users of our site and not generated or verified by Bridgeforcares.com. You need to do your own diligence to ensure the job or caregiver you choose is appropriate for your needs and complies with applicable laws.</font></p></div><br>
	  <hr color="#000000">
    <div class="copyright">&copy;2022 -  BridgeForCares.com</div>
  </footer>
</body>
</html>