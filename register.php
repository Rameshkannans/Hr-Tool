<?php
require_once('db.php');
require_once('user.php');
require_once('dohr.php');

$dohr = new Hr($conn);
$gemail = $dohr->getemail();

$emails = [];
while ($row = $gemail->fetch_assoc()) {
    $emails[] = $row['email'];
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $lastName = $_POST['last_name'];
    $primaryContact = $_POST['primary_contact'];
    $secondaryContact = $_POST['secondary_contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $nationality = $_POST['nationality'];
    $school10thName = $_POST['school_10th_name'];
    $school10thYear = $_POST['school_10th_year'];
    $school10thPercentage = $_POST['school_10th_percentage'];
    $school12thName = $_POST['school_12th_name'];
    $school12thYear = $_POST['school_12th_year'];
    $school12thPercentage = $_POST['school_12th_percentage'];
    $collegeName = $_POST['college_name'];
    $universityName = $_POST['university_name'];
    $graduationPercentage = $_POST['graduation_percentage'];
    $graduationYear = $_POST['graduation_year'];
    $stream = $_POST['stream'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $certifications = $_POST['certifications'];
    $languages = $_POST['languages'];
    $backlog = $_POST['backlog'];
    $noofexp = $_POST['noofexp'];

    if ($password == $confirm_password) {
        if (isset($_FILES['dp']) && $_FILES['dp']['error'] === UPLOAD_ERR_OK) {
            $dp_name = $_FILES['dp']['name'];
            $dp_tmp_path = $_FILES['dp']['tmp_name'];
            $dp_storage_path = "user_profile/" . $dp_name;

            if (move_uploaded_file($dp_tmp_path, $dp_storage_path)) {
                
                        $user = new User($conn);
                        $user->register(
                            $name, $lastName, $primaryContact, $secondaryContact, $email, $password,
                            $confirm_password, $dp_storage_path, $dob, $address, $gender, $state,
                            $city, $nationality, $school10thName, $school10thYear, $school10thPercentage,
                            $school12thName, $school12thYear, $school12thPercentage, $collegeName,
                            $universityName, $graduationPercentage, $graduationYear, $stream, $experience,
                            $skills, $certifications, $languages, $backlog, $noofexp
                        );

                        header('Location: https://dalztek.com/hr/');
                        exit();

                    
            } else {
                echo "Error uploading profile photo.";
            }
        } else {
            echo "Please upload a valid profile photo.";
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <style>
    body{
      background-image: url("img2.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }
    </style>
</head>

<body>
    <div class="container mt-5">

    <div class="row justify-content-center mb-5">
        <div class="col-md-10 col-sm-12">
        <div class="card bg-transparent shadow-lg">
            <div class="card-header">
                <h2 class="text-center text-light">User Registration</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="register.php" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label text-primary">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-z\s]+" title="Please enter a valid name (only letters and spaces allowed)" required oninput="validateInput(this, 'nameError')" placeholder="Enter first name">
                        <p class="text-danger" id="nameError"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-primary">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" pattern="[A-Za-z\s]+" title="Please enter a valid Last name (only letters and spaces allowed)" required oninput="validateInput(this, 'lnameError')" required placeholder="Enter last name">
                        <p class="text-danger" id="lnameError"></p>
                    </div>

                   
                    <div class="mb-3">
                        <label class="form-label text-primary">Primary Contact:</label>
                        <input type="tel" class="form-control" id="mobile" name="primary_contact" pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number" required oninput="validateInput(this, 'mobileError')" placeholder="Enter Personal mobile number">
                        <p class="text-danger" id="mobileError"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-primary">Secondary Contact:</label>
                        <input type="text" class="form-control" id="secondary_contact" name="secondary_contact" pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number" required oninput="validateInput(this, 'smobileError')" placeholder="Enter secondary mobile number">
                        <p class="text-danger" id="smobileError"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-primary">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address" required oninput="validateInput(this, 'emailerror')" placeholder="Enter your email">
                        <p class="text-danger" id="emailerror"></p>
                        <div class="form-text" id="emailMessage"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-primary">Password:</label>
                        <span class=" input-group">
                        <input type="password" class="form-control" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-zA-Z]).{8,}$" title="Password must be at least 8 characters long and contain at least one number and one letter." required oninput="validatePassword()" required placeholder="Enter password">
                        <span class="input-group-text"><i class="bi bi-eye-slash" id="togglePassword"></i></span></span>
                        <p class="text-danger" id="passwordError"></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-primary">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" pattern="^(?=.*\d)(?=.*[a-zA-Z]).{8,}$" title="Password must be at least 8 characters long and contain at least one number and one letter." required oninput="validateConfirmPassword()" required placeholder="Enter confirm password">
                        <p class="text-danger" id="confirmPasswordError"></p>
                    </div>

                   
                    <div class="mb-3">
                        <label class="form-label text-primary">Date of Birth:</label>
                        <input type="date" class="form-control" name="dob" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-primary">Address:</label>
                        <textarea class="form-control" name="address" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-primary">Gender:</label>
                        <select class="form-control" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">State:</label>
                            <input type="text" class="form-control" name="state" required placeholder="State">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">City:</label>
                            <input type="text" class="form-control" name="city" required placeholder="City">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">Nationality:</label>
                            <input type="text" class="form-control" name="nationality" required placeholder="Nationality">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">10th School Name:</label>
                            <input type="text" class="form-control" name="school_10th_name" required placeholder="enter 10th school Name">
                        </div>


                        <div class="mb-3">
                            <label class="form-label text-primary">10th Completion Year:</label>
                            <input type="number" id="year" min="1900" max="2100" class="form-control" name="school_10th_year" required placeholder="Completion year">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">10th Percentage:</label>
                            <input type="text" class="form-control" name="school_10th_percentage" id="percentage"  pattern="^(\d{1,2}(\.\d{1,2})?|100(\.0{1,2})?)$" title="Please enter a valid percentage value" required oninput="validateInput(this, '10percentageError')" placeholder="Percentage">
                            <p class="text-danger" id="10percentageError"></p>

                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">12th School Name:</label>
                            <input type="text" class="form-control" name="school_12th_name" required placeholder="enter 12th school Name">
                        </div>


                        <div class="mb-3">
                            <label class="form-label text-primary">12th Completion Year:</label>
                            <input type="number" id="year" min="1900" max="2100" class="form-control" name="school_12th_year" required placeholder="Completion year">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">12th Percentage:</label>
                            <input type="text" id="percentage" class="form-control" pattern="^(\d{1,2}(\.\d{1,2})?|100(\.0{1,2})?)$" title="Please enter a valid percentage value" required oninput="validateInput(this, '12percentageError')" name="school_12th_percentage" placeholder="Percentage">
                            <p class="text-danger" id="12percentageError"></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">Graduation College Name:</label>
                            <input type="text" class="form-control" name="college_name" required placeholder="Enter ug College Name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">University Name:</label>
                            <input type="text" class="form-control" name="university_name" required placeholder="Enter university name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">Percentage:</label>
                            <input type="text" id="percentage" class="form-control" pattern="^(\d{1,2}(\.\d{1,2})?|100(\.0{1,2})?)$" title="Please enter a valid percentage value" required oninput="validateInput(this, 'ugpercentageError')" name="graduation_percentage" placeholder="percentage">
                            <p class="text-danger" id="ugpercentageError"></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">Graduation Completion Year:</label>
                            <input type="number" id="year" min="1900" max="2100" class="form-control" name="graduation_year" required placeholder="completion year">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">Stream:</label>
                            <input type="text" class="form-control" name="stream" required placeholder="Enter stream">
                        </div>

                    <div class="form-group">
                        <label for="experience">Experience or Fresher</label>
                        <select class="form-control" id="experience" name="experience" required>
                            <option value="fresher">Fresher</option>
                            <option value="experience">Experience</option>
                        </select>
                    </div>

                    <div class="form-group" id="experienceYearsGroup" style="display: none;">
                        <label for="experienceYears">Number of Years of Experience</label>
                        <input type="number" class="form-control" id="experienceYears" name="noofexp" placeholder="Enter years of experience">
                    </div>


                        <div class="mb-3">
                            <label class="form-label text-primary">Skills:</label>
                            <input type="text" class="form-control" name="skills" required placeholder="Enter your skills">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">Certifications:</label>
                            <input type="text" class="form-control" name="certifications">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-primary">Languages:</label>
                            <input type="text" class="form-control" name="languages" required placeholder="Language known">
                        </div>

                        <!-- Backlog -->
                        <div class="mb-3">
                            <label class="form-label text-primary">Backlog:</label>
                            <input type="text" class="form-control" name="backlog" required placeholder="Any backlog">
                        </div>


                    <div class="mb-3">
                        <label class="form-label text-primary">Profile Photo:</label>
                        <input type="file" class="form-control" name="dp" accept="image/*" required>
                    </div>


                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-success mb-4" id="submitBtn">Register</button><br>
                         <a href="index.php" class="btn btn-danger">Go to login</a>
                    </div>
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>


        <script>
        // Experience or Fresher
        document.getElementById('experience').addEventListener('change', function () {
            var experienceYearsGroup = document.getElementById('experienceYearsGroup');
            if (this.value === 'experience') {
                experienceYearsGroup.style.display = 'block';
            } else {
                experienceYearsGroup.style.display = 'none';
            }
        });

        // Input validation
        function validateInput(input, errorId) {
            var errorElement = document.getElementById(errorId);

            if (!input.checkValidity()) {
                errorElement.textContent = input.title;
            } else {
                errorElement.textContent = '';
            }

            var email = document.getElementById('email').value;
            var emailMessage = document.getElementById('emailMessage');
            var submitBtn = document.getElementById('submitBtn');

            var emailExists = <?php echo json_encode($emails); ?>.includes(email);

            if (emailExists) {
                emailMessage.innerText = 'Email is already registered';
                submitBtn.disabled = true;
            } else {
                emailMessage.innerText = '';
                submitBtn.disabled = false;
            }

        }

        // Password Validation
            function validatePassword() {
                document.getElementById("passwordError").textContent = "";
            }

            function validateConfirmPassword() {
                var password = document.getElementById("password").value;
                var confirmPassword = document.getElementById("confirm_password").value;

                if (password !== confirmPassword) {
                    document.getElementById("confirmPasswordError").textContent = "Passwords do not match!";
                } else {
                    document.getElementById("confirmPasswordError").textContent = "";
                }
            }

            // Email validation
            function validateForm() {
                return true;
            }


            // password visibility
            const togglePassword = document
            .querySelector('#togglePassword');
            const password = document.querySelector('#password');
            togglePassword.addEventListener('click', () => {
                // Toggle the type attribute using
                // getAttribure() method
                const type = password
                    .getAttribute('type') === 'password' ?
                    'text' : 'password';
                password.setAttribute('type', type);
                // Toggle the eye and bi-eye icon
                this.classList.toggle('bi-eye');
            });

    </script>


</body>
</html>

