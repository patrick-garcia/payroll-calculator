<?php
$stepInfo = [];
$stepInfo['Step 1'] = '
  The application will then subtract and display the amount of payroll tax the employee is to pay. The payroll tax is calculated based on 25% of the gross pay.
';
$stepInfo['Step 2'] = '
  The application will calculate overtime. To calculate the overtime: the first 40 hours worked will be calculated at the normal rate of pay. Every hour greater than 40 will be calculated at 1.5 times the rate of pay.
';
$stepInfo['Step 3'] = 'Break the programming into the following functions.';

$details = [];
$details['summary'] = 'Data Validation';
$details['list'] = [
  'All Inputs (first name, last name, hourly wage and hours workd) must be entered',
  'First Name can not have a length less than 2 characters',
  'Last Name cannot have a length less than 2 characters and cannot be more than 25',
  'Hourly wage must be greater than 10.00 and can only be numeric',
  'Hours worked can not exceed more than 60 hours for any given work period and must be numeric'
];

function displayStepInfo() {
  global $stepInfo, $details;
  foreach($stepInfo as $key => $val) {
    $string = '<section><h4>' . $key . '</h4>';
      $string .= '<p>' . $val . '</p>';
      $string .= $key == 'Step 3' ? '<details>' . displayDetails($details) . '</details>' : '';
    $string .= '</section>';
    echo $string;
}}

function displayDetails($array) {
  $string =  '<summary>' . $array['summary'] . '</summary>';
  foreach($array['list'] as $val) {
    $string .= '<li>' . $val . '</li>';
  }
  return $string;
}

?>
