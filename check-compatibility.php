<?php 
$db = new mysqli("localhost", "root", "", "components");

// Check for errors
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

function get_component_data($db, $table, $id) {
    $sql = "SELECT * FROM $table WHERE id = $id";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
      return $result->fetch_assoc();
    } else {
      return null;
    }
  }

// Get the component IDs from the form
$processor_id = $_POST['processor_id'];
$motherboard_id = $_POST['motherboard_id'];
$memory_id = $_POST['memory_id'];
$video_card_id = $_POST['video_card_id'];
$power_supply_unit_id = $_POST['power_supply_unit_id'];
$case_id = $_POST['case_id'];

// Retrieve the data for each component from the database
$processor_data = get_component_data($db, "processors", $processor_id);
$motherboard_data = get_component_data($db, "motherboards", $motherboard_id);
$memory_data = get_component_data($db, "memory", $memory_id);
$video_card_data = get_component_data($db, "video_cards", $video_card_id);
$power_supply_unit_data = get_component_data($db, "power_supply_units", $power_supply_unit_id);
$case_data = get_component_data($db, "cases", $case_id);

if ($power_supply_unit_data['form_factor'] != $case_data['form_factor']) {
  echo "Error: Power supply unit and case are not compatible. Power supply unit form factor: " . $power_supply_unit_data['form_factor'] . ", case form factor: " . $case_data['form_factor'];
  exit;
}

if ($video_card_data['expansion_slot'] != $motherboard_data['expansion_slot']) {
  echo "Error: Video card and motherboard are not compatible. Video card expansion slot: " . $video_card_data['expansion_slot'] . ", motherboard expansion slot: " . $motherboard_data['expansion_slot'];
  exit;
}

if ($memory_data['type'] != $motherboard_data['memory_type']) {
  echo "Error: Memory and motherboard are not compatible. Memory type: " . $memory_data['type'] . ", motherboard memory type: " . $motherboard_data['memory_type'];
  exit;
}

if ($memory_data['speed'] > $motherboard_data['memory_speed']) {
  echo "Error: Memory speed is too high for motherboard. Memory speed: " . $memory_data['speed'] . ", motherboard maximum memory speed: " . $motherboard_data['memory_speed'];
  exit;
}
if ($processor_data['socket'] != $motherboard_data['socket']) {
echo "Error: Processor and motherboard are not compatible. Processor socket: " . $processor_data['socket'] . ", motherboard socket: " . $motherboard_data['socket'];
exit;
}

if ($motherboard_data['form_factor'] != $case_data['form_factor']) {
echo "Error: Motherboard and case are not compatible. Motherboard form factor: " . $motherboard_data['form_factor'] . ", case form factor: " . $case_data['form_factor'];
exit;
}

if ($memory_data['type'] != $motherboard_data['memory_type'] || $memory_data['speed'] > $motherboard_data['memory_speed'] || $memory_data['speed'] > $processor_data['memory_speed']) {
echo "Error: Memory is not compatible with motherboard or processor. Memory type: " . $memory_data['type'] .
 ", motherboard memory type: " . $motherboard_data['memory_type'] . ", memory speed: " . $memory_data['speed'] .
  ", motherboard memory speed: " . $motherboard_data['memory_speed'] . ", processor memory speed: " . $processor_data['memory_speed'];
exit;
}
if ($power_supply_unit_data['form_factor'] != $case_data['form_factor']) {
echo "Error: Power supply unit and case are not compatible. Power supply unit form factor: " . $power_supply_unit_data['form_factor'] . ", case form factor: " . $case_data['form_factor'];
exit;
}

// Check if the video card's expansion slot is compatible with the motherboard
if ($video_card_data['expansion_slot'] != $motherboard_data['expansion_slot']) {
echo "Error: Video card and motherboard are not compatible. Video card expansion slot: " . $video_card_data['expansion_slot'] . ", motherboard expansion slot: " . $motherboard_data['expansion_slot'];
exit;
}

// Check if the memory's type and speed are compatible with the motherboard
if ($memory_data['type'] != $motherboard_data['memory_type'] || $memory_data['speed'] > $motherboard_data['memory_speed']) {
echo "Error: Memory and motherboard are not compatible. Memory type: " . $memory_data['type'] . ", motherboard memory type: " . $motherboard_data['memory_type'] . ", memory speed: " . $memory_data['speed'] . ", motherboard memory speed: " . $motherboard_data['memory_speed'];
exit;
}

// Check if the processor's socket is compatible with the motherboard
if ($processor_data['socket'] != $motherboard_data['socket']) {
echo "Error: Processor and motherboard are not compatible. Processor socket: " . $processor_data['socket'] . ", motherboard socket: " . $motherboard_data['socket'];
exit;
}
?>