<script>
  $('#patient_name,#patient_gender,#patient_email,#patient_dob,#patient_country_code,#patient_phoneno,#appointment_date,#no_patient,#patient_country,#patient_state,#patient_city').on('focusout', function() {
    var name = $("#patient_name").val();
    var gender = $("#patient_gender").val();
    var email = $("#patient_email").val();
    var dob = $("#patient_dob").val();
	var code = $("#patient_country_code").val();
	var phone = $("#patient_phoneno").val();
	var appdate = $("#appointment_date").val();
	var count = $("#no_patient").val();
	var country = $("#patient_country").val();
	var state = $("#patient_state").val();
	var city = $("#patient_city").val();
   
    if(name !== '' && gender !== '' && email !== '' && dob !== '' && code !== '' && phone !== '' && appdate !== '' && count !== '' && country !== '' && state !== '' && city !== ''){
        jQuery.ajax({
            type: 'post', 
            url: 'https://drgalen.org/wp-content/themes/pearl-medicalguide/covid_test/autostore.php',
            data: { name: name, gender: gender, email: email, dob: dob, code: code, phone: phone, appdate: appdate, count: count, country: country, state: state, city: city },
            success: function(successData) {
            console.log(successData);
            }
       });
    }
 });
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "2v7!wGxrQAv!";
$dbname = "covid_test";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$ip = $_SERVER["HTTP_CF_CONNECTING_IP"] ?? $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Kolkata');
$date_time = date('d-m-y H:i:s');

$patient_name = mysqli_real_escape_string($conn, $_POST['name']);
$patient_gender = mysqli_real_escape_string($conn, $_POST['gender']);
$patient_email = mysqli_real_escape_string($conn, $_POST['email']);
$patient_dob = mysqli_real_escape_string($conn, $_POST['dob']);
$patient_country_code = mysqli_real_escape_string($conn, $_POST['code']);
$patient_phoneno = mysqli_real_escape_string($conn, $_POST['phone']);
$appointment_date = mysqli_real_escape_string($conn, $_POST['appdate']);
$no_patient = mysqli_real_escape_string($conn, $_POST['count']);
$patient_country = mysqli_real_escape_string($conn, $_POST['country']);
$patient_state = mysqli_real_escape_string($conn, $_POST['state']);
$patient_city = mysqli_real_escape_string($conn, $_POST['city']);
 
$sql = "INSERT INTO autostore (patient_name,patient_gender,patient_email,patient_dob,patient_country_code,patient_phoneno,appointment_date,no_patient,patient_country,patient_state,patient_city,ip,date_time)Values('$patient_name','$patient_gender','$patient_email','$patient_dob','$patient_country_code','$patient_phoneno','$appointment_date','$no_patient','$patient_country','$patient_state','$patient_city','$ip','$date_time')";

$result=$conn->query($sql);

?>

SCRIPT:
CREATE TABLE `covid_test`.`autostore` ( `id` INT NOT NULL AUTO_INCREMENT , `patient_name` VARCHAR(50) NOT NULL , `patient_gender` VARCHAR(10) NOT NULL , `patient_email` VARCHAR(50) NOT NULL , `patient_dob` VARCHAR(10) NOT NULL , `patient_country_code` VARCHAR(5) NOT NULL , `patient_phoneno` VARCHAR(15) NOT NULL , `appointment_date` VARCHAR(10) NOT NULL , `no_patient` VARCHAR(5) NOT NULL , `patient_country` VARCHAR(15) NOT NULL , `patient_state` VARCHAR(15) NOT NULL , `patient_city` VARCHAR(15) NOT NULL , `ip` VARCHAR(50) NOT NULL , `date_time` VARCHAR(25) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
