<?php
if (isset($_POST["submit"])) {
  $firstName =  firstNameCheck($_POST["firstName"]);
  $lastName = lastNameCheck($_POST["lastName"]);
  $hoursWorked = hrsDataCheck($_POST["hoursWorked"]);
  $hourlyWage = wageDataCheck($_POST["hourlyWage"]);
  $taxRate = 25;
  $overtimeRate = 1.5;
  
  if ($hoursWorked > 40) {
    $regHoursWorked = 40;
    $overtimeHours = $hoursWorked - $regHoursWorked;
    $overtimeGrossPay = calcOvertimePay($overtimeHours, $hourlyWage, $overtimeRate);
    $overtimeTax = calcTaxes($overtimeGrossPay, $taxRate);
    $overtimeNetPay = calcNetPay($overtimeGrossPay, $overtimeTax);

    $grossPay = calcRegPay($regHoursWorked, $hourlyWage);
    $grossTax = calcTaxes($grossPay, $taxRate);
    $netPay = calcNetPay($grossPay, $grossTax);
    
  } else {
    $overtimeHours = 0;
    $overtimeGrossPay = 0;
    $overtimeTax = 0;
    $overtimeNetPay = 0;

    $grossPay = calcRegPay($hoursWorked, $hourlyWage);
    $grossTax = calcTaxes($grossPay, $taxRate);
    $netPay = calcNetPay($grossPay, $grossTax);
  }

  $total = calcTotal($netPay, $overtimeNetPay);

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

/* calculations: calcRegPay, calcOvertimePay, calcTaxes, calcNetPay, calcTotal */
function calcRegPay($hrs, $wage) {
  return is_numeric($hrs) && is_numeric($wage) ? $hrs * $wage : '';
};

function calcTaxes($gross, $taxRate) {
  return is_numeric($gross) && is_numeric($taxRate) ? $gross * ($taxRate / 100) : '';
};

function calcOvertimePay($hrs, $wage, $overtimeRate) {
  if (is_numeric($hrs) && is_numeric($wage) && is_numeric($overtimeRate)) {
    return $hrs * $wage * $overtimeRate;
  } else {
    return "";
  }
};

function calcNetPay ($gross, $tax) {
  return is_numeric($gross) && is_numeric($tax) ? $gross - $tax : '';
};

function calcTotal($x, $y) {
  return is_numeric($x) && is_numeric($y) ? $x + $y : '';
};

/* ^^^^ */
/* data validation functions */

/* no less than 2 characters */
function firstNameCheck($userInput) {
  $userInput = strtolower(trim($userInput));

  if (strlen($userInput) < 2) {
    return "invalid entry";
  } else {
    return ucfirst($userInput);
  }
};

/* no less than 2 characters, cannot be greater than 25 */
function lastNameCheck($userInput) {
  $userInput = strtolower(trim($userInput));
  if (strlen($userInput) < 2 || strlen($userInput)> 25) {
    return "invalid entry";
  } else {
    return ucfirst($userInput);
  }
};

/* wage must be greater than 10, must be number */
function wageDataCheck($userInput) {
  $userInput = trim($userInput);
  if (is_numeric($userInput)) {
    if ($userInput > 10) {
      return number_format(floatval($userInput), 2);
    } else {
      return "must be > 10";
    }
  } else {
    return "invalid entry";
  };
};

/* hrs cannot exceed 60hrs */
function hrsDataCheck($userInput) {
  $userInput = trim($userInput);
  if (is_numeric($userInput)) {
    if ($userInput > 60) {
      return "cannot exceed 60 hrs";
    } else {
      return number_format(floatval($userInput), 2);
    }
  } else {
    return "invalid entry";
  }
};

/* convert to 2 decimal and currency format */
function numFrmtDecimal($num) {
  return !empty($num) ? number_format(floatval($num), 2) : '';
};

function numCurrency($num) {
  return !empty($num) ? '$' . numFrmtDecimal($num) : '';
};

?>