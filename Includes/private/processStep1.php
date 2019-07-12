<?php
if (isset($_POST["submit"])) {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $hoursWorked = $_POST["hoursWorked"];
  $hourlyWage = $_POST["hourlyWage"];
  $grossPay = $hoursWorked * $hourlyWage;
  $taxRate = 25;
  $payrollTax = $grossPay * ($taxRate / 100);
  $netPay = $grossPay - $payrollTax;

} else {
  $firstName = "";
  $lastName = "";
  $hoursWorked = "";
  $hourlyWage = "";
  $grossPay = "";
  $payrollTax = "";
  $netPay = "";
}

?>