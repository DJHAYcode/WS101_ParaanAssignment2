<?php

function calculate_withholding_tax($gross_pay) {
    if ($gross_pay <= 10000) {
        return $gross_pay * 0.05; 
    } elseif ($gross_pay <= 30000) {
        return 500 + ($gross_pay - 10000) * 0.10; 
    } elseif ($gross_pay <= 70000) {
        return 2500 + ($gross_pay - 30000) * 0.15; 
    } elseif ($gross_pay <= 140000) {
        return 8500 + ($gross_pay - 70000) * 0.20; 
    } elseif ($gross_pay <= 250000) {
        return 22500 + ($gross_pay - 140000) * 0.25; 
    } elseif ($gross_pay <= 500000) {
        return 50000 + ($gross_pay - 250000) * 0.30; 
    } else {
        return 125000 + ($gross_pay - 500000) * 0.34; 
    }
}


$pay_rates = [
    'Instructor I' => 890.75,
    'Instructor II' => 940.50,
    'Instructor III' => 1200.75,
    'Associate Professor I' => 1700.25,
    'Associate Professor II' => 5000.75,
    'Associate Professor III' => 7500.50
];


$employee_no = $_POST['employee_no'];
$name = $_POST['name'];
$position = $_POST['position'];
$hours_rendered = $_POST['hours_rendered'];
$deductions = isset($_POST['deductions']) ? $_POST['deductions'] : [];


$pay_rate = $pay_rates[$position];
$gross_pay = $hours_rendered * $pay_rate;


$total_deductions = 0;
foreach ($deductions as $deduction) {
    
    switch ($deduction) {
        case 'SSS':
            $total_deductions += 300; 
            break;
        case 'Pag-IBIG':
            $total_deductions += 100; 
            break;
        case 'PhilHealth':
            $total_deductions += 150;
            break;
    }
}


$withholding_tax = calculate_withholding_tax($gross_pay);


$net_pay = $gross_pay - ($total_deductions + $withholding_tax);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #00A1E0;
            font-family: 'Courier New', sans-serif; 
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px; 
        }
        .payslip-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .payslip-header h2 {
            color: #008bb5;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="logo">
            <img src="logo.png" alt="Logo"> 
        </div>
    <div class="container">
        <div class="payslip-header">
            <h2>PAYSLIP</h2>
            <p>Employee No: <?php echo htmlspecialchars($employee_no); ?></p>
            <p>Name: <?php echo htmlspecialchars($name); ?></p>
            <p>Position: <?php echo htmlspecialchars($position); ?></p>
        </div>

        <table class="table">
            <tr>
                <th>Hours Rendered</th>
                <td><?php echo htmlspecialchars($hours_rendered); ?></td>
            </tr>
            <tr>
                <th>Gross Pay</th>
                <td><?php echo number_format($gross_pay, 2); ?></td>
            </tr>
            <tr>
                <th>Total Deductions</th>
                <td><?php echo number_format($total_deductions + $withholding_tax, 2); ?></td>
            </tr>
            <tr>
                <th>Withholding Tax</th>
                <td><?php echo number_format($withholding_tax, 2); ?></td>
            </tr>
            <tr>
                <th>Net Pay</th>
                <td><?php echo number_format($net_pay, 2); ?></td>
            </tr>
        </table>

        <div class="text-center">
            <a href="payroll.php" class="btn btn-primary">Back to Payroll</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
