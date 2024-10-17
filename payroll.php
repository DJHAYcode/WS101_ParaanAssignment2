<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Form</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <style>
        body {
            background-color: #00A1E0; 
            font-family: 'Courier New', sans-serif; 
        }
        .container {
            margin-top: 80px;
            max-width: 700px;
            background-color: #ffffff;
            padding: 40px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px; 
        }
        .form-group label {
            font-weight: 500;
            color: #008bb5; 
        }
        .form-control, .form-select {
            border: 1px solid #008bb5; 
        }
        .form-control:focus, .form-select:focus {
            border-color: #005f7a; 
            box-shadow: none;
        }
        .btn-custom {
            background-color: #008bb5; 
            border: none;
            color: white;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #005f7a; 
        }
        .deductions-group label {
            color: #008bb5; 
        }
        .deductions-group input[type="checkbox"] {
            margin-right: 10px;
        }
        
        .form-row {
            align-items: center;
            margin-bottom: 15px;
        }
        .form-label {
            width: 150px;
            text-align: right;
            padding-right: 20px;
        }
        .btn-white {
            background-color: #ffffff;
            color: #000; 
            border: 1px solid #00A1E0; 
            padding: 5px 20px; 
            font-size: 18px; 
            border-radius: 5px; 
        }

        .btn-white:hover {
            background-color: #f0f0f0; -
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="logo.png" alt="Logo"> 
        </div>
        <form action="payslip.php" method="post">
            <div class="row form-row">
                <label for="employee_no" class="form-label col-sm-4">Employee No.</label>
                <div class="col-sm-8">
                    <input type="text" id="employee_no" name="employee_no" class="form-control" required>
                </div>
            </div>
            <div class="row form-row">
                <label for="name" class="form-label col-sm-4">Name</label>
                <div class="col-sm-8">
                    <input type="text" id="name" name="name" class="form-control" required minlength="100">
                </div>
            </div>
            <div class="row form-row">
                <label for="position" class="form-label col-sm-4">Position</label>
                <div class="col-sm-8">
                    <select id="position" name="position" class="form-select" required>
                        <option value="">Select Position</option>
                        <option value="Instructor I">Instructor I</option>
                        <option value="Instructor II">Instructor II</option>
                        <option value="Instructor III">Instructor III</option>
                        <option value="Associate Professor I">Associate Professor I</option>
                        <option value="Associate Professor II">Associate Professor II</option>
                        <option value="Associate Professor III">Associate Professor III</option>
                    </select>
                </div>
            </div>
            <div class="row form-row">
                <label for="hours_rendered" class="form-label col-sm-4">Hours Rendered</label>
                <div class="col-sm-8">
                    <input type="number" id="hours_rendered" name="hours_rendered" class="form-control" required>
                </div>
            </div>

            <div class="row form-row">
                <label class="form-label col-sm-4">Deductions</label>
                <div class="col-sm-8 deductions-group">
                    <div>
                        <input type="checkbox" id="sss" name="deductions[]" value="SSS">
                        <img src="pagibig_logo.png" alt="Pag-IBIG Logo" style="width: 20px; height: 20px; margin-right: 5px;">
                        <label for="sss">Pag-Ibig</label>
                    </div>
                    <div>
                        <input type="checkbox" id="pagibig" name="deductions[]" value="Pag-IBIG">
                        <img src="gsis_logo.svg" alt="GSIS Logo" style="width: 20px; height: 20px; margin-right: 5px;">
                        <label for="pagibig">GSIS</label>
                    </div>
                    <div>
                        <input type="checkbox" id="philhealth" name="deductions[]" value="PhilHealth">
                        <img src="philhealth_logo.png" alt="PhilHealth Logo" style="width: 20px; height: 20px; margin-right: 5px;">
                        <label for="philhealth">PhilHealth</label>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-white btn-lg">COMPUTE PAYROLL</button>
            </div>
        </form>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
