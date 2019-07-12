<?php
$contact = [];
$contact['name'] = 'Patrick Garcia';
$contact['gbc'] = [
  'Student ID' => '101045030',
  'Course Code' => 'COMP 9649',
  'Course Title' => 'PHP Foundations'
];
$contact['contactInfo'] = [
  ['Phone Number', 'tel:2892427858', '289.242.7858'],
  ['Email', 'mailto:pg@patrickgarcia.ca', 'pg@patrickgarcia.ca'],
  ['My Website', 'http://patrickgarcia.ca/', 'patrickgarcia.ca']
];

function displayGBC() {
  global $contact;
  foreach ($contact['gbc'] as $key => $val) {
    $string = '<li>' . $key . ': ';
    $string .= $val . '</li>';
    echo $string;
}}

function displayContactInfo() {
  global $contact;
  foreach($contact['contactInfo'] as $val) {
    $tab = $val[0] == 'My Website' ? ' target="_blank"' : '';
    $infoString = '<li>' . $val[0] . ': '; 
    $infoString .= '<a href="' . $val[1] . '"';
    $infoString .= $tab . '>';
    $infoString .= $val[2] . '</a></li>';
    echo $infoString;
}}

?>