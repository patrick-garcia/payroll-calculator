<?php
  
if (isset($_POST["submit"])) {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $hoursWorked = $_POST["hoursWorked"];
  $hourlyWage = $_POST["hourlyWage"];
  $taxRate = 25;
  $overtimeRate = 1.5;
  
  if ($hoursWorked > 40) {
    $regHoursWorked = 40;
    $overtimeHours = $hoursWorked - $regHoursWorked;
    $overtimeGrossPay = $overtimeHours * $hourlyWage * $overtimeRate;
    $overtimeTax = $overtimeGrossPay * ($taxRate / 100);
    $overtimeNetPay = $overtimeGrossPay - $overtimeTax;

    $grossPay = $regHoursWorked * $hourlyWage;
    $grossTax = $grossPay * ($taxRate / 100);
    $netPay = $grossPay - $grossTax;
    
  } else {
    $overtimeHours = 0;
    $overtimeGrossPay = 0;
    $overtimeTax = 0;
    $overtimeNetPay = 0;

    $grossPay = $hoursWorked * $hourlyWage;
    $grossTax = $grossPay * ($taxRate / 100);
    $netPay = $grossPay - $grossTax;
  }

  $total = $netPay + $overtimeNetPay;

} else {
  $firstName = "";
  $lastName = "";
  $hoursWorked = "";
  $hourlyWage = "";
  $grossPay = "";
  $grossTax = "";
  $netPay = "";

  $overtimeHours = "";
  $overtimeGrossPay = "";
  $overtimeTax = "";
  $overtimeNetPay = "";

  $total = "";
}

?>