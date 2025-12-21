

<?php
// Validation logic for all forms
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formType = $_POST['form_type'];

    // 1. Name Validation [cite: 9]
    if ($formType == "name_form") {
        $name = $_POST['name'];
        $words = explode(" ", trim($name));
        if (empty($name)) { $message = "Error: Cannot be empty [cite: 10]"; }
        elseif (count($words) < 2) { $message = "Error: Contains at least two words [cite: 11]"; }
        elseif (!preg_match("/^[a-zA-Z]/", $name)) { $message = "Error: Must start with a letter [cite: 12]"; }
        elseif (!preg_match("/^[a-zA-Z.- ]*$/", $name)) { $message = "Error: Can contain a-z, A-Z, period, dash only [cite: 13]"; }
        else { $message = "Success: Name is valid."; }
    }

    // 2. Email Validation [cite: 17]
    if ($formType == "email_form") {
        $email = $_POST['email'];
        if (empty($email)) { $message = "Error: Cannot be empty [cite: 18]"; }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $message = "Error: Must be a valid email address [cite: 19]"; }
        else { $message = "Success: Email is valid."; }
    }

    // 3. Date of Birth Validation [cite: 25]
    if ($formType == "dob_form") {
        $dd = $_POST['dd']; $mm = $_POST['mm']; $yyyy = $_POST['yyyy'];
        if (empty($dd) || empty($mm) || empty($yyyy)) { $message = "Error: Cannot be empty [cite: 26]"; }
        elseif ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yyyy < 1953 || $yyyy > 1998) { 
            $message = "Error: Must be valid numbers (dd: 1-31, mm: 1-12, yyyy: 1953-1998) [cite: 27, 28]"; 
        }
        else { $message = "Success: DOB is valid."; }
    }

    // 4. Gender Validation [cite: 34]
    if ($formType == "gender_form") {
        if (!isset($_POST['gender'])) { $message = "Error: At least one must be selected [cite: 39]"; }
        else { $message = "Success: Gender selected."; }
    }

    // 5. Degree Validation [cite: 43]
    if ($formType == "degree_form") {
        if (!isset($_POST['degree']) || count($_POST['degree']) < 2) { 
            $message = "Error: At least two of them must be selected [cite: 49]"; 
        }
        else { $message = "Success: Degrees selected."; }
    }

    // 6. Blood Group Validation [cite: 54]
    if ($formType == "blood_form") {
        if (empty($_POST['blood_group'])) { $message = "Error: Must be selected [cite: 55]"; }
        else { $message = "Success: Blood group selected."; }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation Lab</title>
</head>
<body>
    <p><strong>Status: <?php echo $message; ?></strong></p>

    <fieldset style="width: 300px;">
        <legend><b>NAME</b></legend>
        <form method="post">
            <input type="hidden" name="form_type" value="name_form">
            <input type="text" name="name"><br><hr>
            <input type="submit" name="submit" value="Submit">
        </form>
    </fieldset><br>

    <fieldset style="width: 300px;">
        <legend><b>EMAIL</b></legend>
        <form method="post">
            <input type="hidden" name="form_type" value="email_form">
            <input type="text" name="email"> <abbr title="hint: sample@example.com"><b>i</b></abbr><br><hr>
            <input type="submit" name="submit" value="Submit">
        </form>
    </fieldset><br>

    <fieldset style="width: 300px;">
        <legend><b>DATE OF BIRTH</b></legend>
        <form method="post">
            <input type="hidden" name="form_type" value="dob_form">
            <table>
                <tr>
                    <td><small>dd</small></td>
                    <td><small>mm</small></td>
                    <td><small>yyyy</small></td>
                </tr>
                <tr>
                    <td><input type="text" name="dd" size="2"> /</td>
                    <td><input type="text" name="mm" size="2"> /</td>
                    <td><input type="text" name="yyyy" size="4"></td>
                </tr>
            </table><hr>
            <input type="submit" name="submit" value="Submit">
        </form>
    </fieldset><br>

    <fieldset style="width: 300px;">
        <legend><b>GENDER</b></legend>
        <form method="post">
            <input type="hidden" name="form_type" value="gender_form">
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio" name="gender" value="Other"> Other [cite: 38]<br><hr>
            <input type="submit" name="submit" value="Submit">
        </form>
    </fieldset><br>

    <fieldset style="width: 300px;">
        <legend><b>DEGREE</b></legend>
        <form method="post">
            <input type="hidden" name="form_type" value="degree_form">
            <input type="checkbox" name="degree[]" value="SSC"> SSC
            <input type="checkbox" name="degree[]" value="HSC"> HSC
            <input type="checkbox" name="degree[]" value="BSc"> BSc
            <input type="checkbox" name="degree[]" value="MSc"> MSc [cite: 48]<br><hr>
            <input type="submit" name="submit" value="Submit">
        </form>
    </fieldset><br>

    <fieldset style="width: 300px;">
        <legend><b>BLOOD GROUP</b></legend>
        <form method="post">
            <input type="hidden" name="form_type" value="blood_form">
            <select name="blood_group">
                <option value=""></option>
                <option value="A+">A+</option>
                <option value="B+">B+</option>
                <option value="O+">O+</option>
                <option value="AB+">AB+</option>
            </select><br><hr>
            <input type="submit" name="submit" value="Submit">
        </form>
    </fieldset>
</body>
</html>