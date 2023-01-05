<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
	include("functions.php");
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "components";
    
    if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    
        die("failed to connect");}
    if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
        // User is not logged in as admin, redirect to default.php
        header("Location: default.php");
        exit;
    }
    // Connect to the database
$db = new mysqli("localhost", "root", "", "components");
// Check for errors
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
// Check for the value of the category field in the POST data
if (isset($_POST['category'])) {
  $selectedCategory = $_POST['category'];
}
// Check if the user has submitted the form to delete a component
if (isset($_POST['delete_component'])) {
  // Get the component ID from the form
  $component_id = $_POST['component_id'];

  // Get the component category from the form
  $category = $_POST['category'];

  // Delete the component from the appropriate table
  switch ($category)
  {
    case "processors":
      $sql = "DELETE FROM processors WHERE id = $component_id";
      break;
    case "motherboards":
      $sql = "DELETE FROM motherboards WHERE id = $component_id";
      break;
    case "memory":
      $sql = "DELETE FROM memory WHERE id = $component_id";
      break;
    case "video_cards":
      $sql = "DELETE FROM video_cards WHERE id = $component_id";
      break;
    case "power_supply_units":
      $sql = "DELETE FROM power_supply_units WHERE id = $component_id";
      break;
    case "cases":
      $sql = "DELETE FROM cases WHERE id = $component_id";
      break;
    default:
      $sql = "";
  }
  
  if ($db->query($sql) === TRUE) {
    echo "Component deleted successfully";
  } else {
    echo "Error deleting component: " . $db->error;
  }
  }

  // Check if the user has submitted the form to add a component
  if (isset($_POST['add_component'])) {
    // Get the component data from the form
   
    $name = $_POST['name'];
    $imglink = $_POST['imglink'];
    $socket = $_POST['socket'];
    $stock = $_POST['stock'];
    $model = $_POST['model'];
    $tdp = $_POST['tdp'];
    $price = $_POST['price'];
    $cores = $_POST['cores'];
    $threads = $_POST['threads'];
    $descr = $_POST['description'];
    $form_factor = $_POST['form_factor'];
    $memory_type = $_POST['memory_type'];
    $memory_speed = $_POST['memory_speed'];
    $expansion_slots = $_POST['expansion_slots'];
    $type = $_POST['type'];
    $speed = $_POST['speed'];
    $capacity = $_POST['capacity'];
    $expansion_slot = $_POST['expansion_slot'];
    $wattage = $_POST['wattage'];
    $connectors = $_POST['connectors'];
    $cooling = $_POST['cooling'];

    // Other component data goes here...
    $category = $_POST['category'];
    // Add the component to the appropriate table
    switch ($category) {
    case "processors":
      $sql = "INSERT INTO processors (name, imglink, stock, socket, model, price, tdp, cores, threads, descr) VALUES ('$name', '$imglink', '$stock', '$socket', '$model', '$price', '$tdp', '$cores', '$threads', '$descr')";
      break;
    case "motherboards":
      $sql = "INSERT INTO motherboards (name, imglink, stock, price, form_factor, socket, memory_type, memory_speed, expansion_slots, descr) VALUES ('$name', '$imglink', '$stock', '$price', '$form_factor', '$socket', '$memory_type', '$memory_speed', '$expansion_slots', '$descr')";
      break;
    case "memory":
      $sql = "INSERT INTO memory (name, imglink, stock, price, type, speed, capacity, descr) VALUES ('$name', '$imglink', '$stock', '$price', '$type', '$speed', '$capacity', '$descr')";
      break;
    case "video_cards":
      $sql = "INSERT INTO video_cards (name, imglink, stock, price, expansion_slot, model, tdp, descr) VALUES ('$name', '$imglink', '$stock', $price, '$expansion_slot', '$model', '$tdp', '$descr')";
      break;
    case "power_supply_units":
      $sql = "INSERT INTO power_supply_units (name, imglink, stock, price, wattage, form_factor, connectors, descr) VALUES ('$name', '$imglink', '$stock', '$price', '$wattage', '$form_factor', '$connectors', '$descr')";
      break;
    case "cases":
      $sql = "INSERT INTO cases (name, imglink, stock, price, form_factor, cooling, expansion_slots, descr) VALUES ('$name', '$imglink', '$stock', '$price', '$form_factor', '$cooling', '$expansion_slots', '$descr')";
      break;
    default:
      $sql = "";
  }
  
  if ($db->query($sql) === TRUE) {
    echo "Component added successfully";
  } else {
    echo "Error adding component: " . $db->error;
  }
  }
  
  // Close the connection
  $db->close();
  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="adminPage.css">
    <title>Admin Page</title>
</head>
<body>
    <div class="navbar">
        <ul class="navbar-menu">
            <li class="navbar-item-left" id="navbar-hamburger"><button id="hamburger-menu"></button></li>
            <li class="navbar-item-left" id="navbar-logo"><a href="./index.php"><img src="./navbar-images/logo.png" alt="" id="logo-img"></a></li>
            <li class="navbar-item-right" id="navbar-shopping-cart"><a href="./cart.html"><img src="./navbar-images/cart.png" alt="" id="shoppingcart-img"></a></li>
        </ul>
    </div>
    <div class="container">
    
    <div id="main-form">
        <form action="adminPage.php" method="post">
            <label for="category">Component category:</label><br>
            <select name="category" id="category">
            <option value="processors" <?php if (isset($selectedCategory) && $selectedCategory == 'processors') echo 'selected'; ?>>Processors</option>
            <option value="motherboards" <?php if (isset($selectedCategory) && $selectedCategory == 'motherboards') echo 'selected'; ?>>Motherboards</option>
            <option value="memory" <?php if (isset($selectedCategory) && $selectedCategory == 'memory') echo 'selected'; ?>>Memory</option>
            <option value="video_cards" <?php if (isset($selectedCategory) && $selectedCategory == 'video_cards') echo 'selected'; ?>>Video cards</option>
            <option value="power_supply_units" <?php if (isset($selectedCategory) && $selectedCategory == 'power_supply_units') echo 'selected'; ?>>Power supply units</option>
            <option value="cases" <?php if (isset($selectedCategory) && $selectedCategory == 'cases') echo 'selected'; ?>>Cases</option>
            </select><br><br>
            <input type="submit" value="Select">
        </form>
    </div>
    <?php
// Check if the user has submitted the form to select a component category
    if (isset($_POST['category'])) {
    // Get the component category from the form
    $category = $_POST['category'];

    // Display a form for a component from the selected category
    switch ($category) {
        case "processors":
            // Display the form for a processor component
            ?>
            <!-- Form for deleting a component -->
            <div id="del-form">
                <form action="adminPage.php" method="post">
                <input type="hidden" name="category" value="<?php echo $category; ?>">
                <label for="component_id">Component ID:</label><br>
                <input type="text" name="component_id" id="component_id"><br><br>
                <input type="submit" name="delete_component" value="Delete">
                </form>
            </div>
        
            <!-- Form for adding a component -->
            <div id="add-form">
                <form action="adminPage.php" method="post">
                <label for="name">Name:</label><br>
                <input type="text" name="name" id="name"><br>
                <label for="imglink">Image link:</label><br>
                <input type="text" name="imglink" id="imglink"><br>
                <label for="stock">Stock:</label><br>
                <input type="text" name="stock" id="stock"><br>
                <label for="price">Price:</label><br>
                <input type="text" name="price" id="price"><br>
                <label for="socket">Socket:</label><br>
                <input type="text" name="socket" id="socket"><br>
                <label for="cores">Cores:</label><br>
                <input type="text" name="cores" id="cores"><br>
                <label for="threads">Threads:</label><br>
                <input type="text" name="threads" id="threads"><br>
                <label for="clock_speed">Clock speed:</label><br>
                <input type="text" name="clock_speed" id="clock_speed"><br>
                <label for="tdp">TDP:</label><br>
                <input type="text" name="tdp" id="tdp"><br>
                <label for="description">Details:</label><br>
                <textarea name="description" id="description"></textarea><br><br>
                <input type="submit" name="add_component" value="Add">
                </form>
            </div>
        <?php break;
        case "motherboards": ?>
                <!-- Form for deleting a component -->
                <div id="del-form">
                    <form action="adminPage.php" method="post">
                    <input type="hidden" name="category" value="motherboards">
                    <label for="component_id">Component ID:</label><br>
                    <input type="text" name="component_id" id="component_id"><br><br>
                    <input type="submit" name="delete_component" value="Delete">
                    </form>
                </div>

                <!-- Form for adding a component -->
                <div id="add-form">
                    <form action="adminPage.php" method="post">
                    <input type="hidden" name="category" value="motherboards">
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="imglink">Image link:</label><br>
                    <input type="text" name="imglink" id="imglink"><br>
                    <label for="stock">Stock:</label><br>
                    <input type="text" name="stock" id="stock"><br>
                    <label for="price">Price:</label><br>
                    <input type="text" name="price" id="price"><br>
                    <label for="form_factor">Form factor:</label><br>
                    <input type="text" name="form_factor" id="form_factor"><br>
                    <label for="socket">Socket:</label><br>
                    <input type="text" name="socket" id="socket"><br>
                    <label for="memory_type">Memory type:</label><br>
                    <input type="text" name="memory_type" id="memory_type"><br>
                    <label for="memory_speed">Memory speed:</label><br>
                    <input type="text" name="memory_speed" id="memory_speed"><br>
                    <label for="expansion_slots">Expansion slots:</label><br>
                    <input type="text" name="expansion_slots" id="expansion_slots"><br>
                    <label for="description">Details:</label><br>
                    <textarea name="description" id="description"></textarea><br><br>
                    <input type="submit" name="add_component" value="Add">
                    </form>
                </div>
        <?php break;
        case "memory": ?>
                <!-- Form for deleting a component -->
                <div id="del-form">
                    <form action="adminPage.php" method="post">
                    <input type="hidden" name="category" value="memory">
                    <label for="component_id">Component ID:</label><br>
                    <input type="text" name="component_id" id="component_id"><br><br>
                    <input type="submit" name="delete_component" value="Delete">
                    </form>
                </div>

                <!-- Form for adding a component -->
                <div id="add-form">
                    <form action="adminPage.php" method="post">
                    <input type="hidden" name="category" value="memory">
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="imglink">Image link:</label><br>
                    <input type="text" name="imglink" id="imglink"><br>
                    <label for="stock">Stock:</label><br>
                    <input type="text" name="stock" id="stock"><br>
                    <label for="price">Price:</label><br>
                    <input type="text" name="price" id="price"><br>
                    <label for="type">Type:</label><br>
                    <input type="text" name="type" id="type"><br>
                    <label for="speed">Speed:</label><br>
                    <input type="text" name="speed" id="speed"><br>
                    <label for="capacity">Capacity:</label><br>
                    <input type="text" name="capacity" id="capacity"><br>
                    <label for="description">Details:</label><br>
                    <textarea name="description" id="description"></textarea><br><br>
                    <input type="submit" name="add_component" value="Add">
                    </form>
                </div>
        <?php break;
        case "video_cards": ?>
                <!-- Form for deleting a component -->
                <div id="del-form">
                    <form action="adminPage.php" method="post">
                    <input type="hidden" name="category" value="video_cards">
                    <label for="component_id">Component ID:</label><br>
                    <input type="text" name="component_id" id="component_id"><br><br>
                    <input type="submit" name="delete_component" value="Delete">
                    </form>
                </div>

                <!-- Form for adding a component -->
                <div id="add-form">
                    <form action="adminPage.php" method="post">
                    <input type="hidden" name="category" value="video_cards">
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="imglink">Image link:</label><br>
                    <input type="text" name="imglink" id="imglink"><br>
                    <label for="stock">Stock:</label><br>
                    <input type="text" name="stock" id="stock"><br>
                    <label for="price">Price:</label><br>
                    <input type="text" name="price" id="price"><br>
                    <label for="expansion_slot">Expansion slot:</label><br>
                    <input type="text" name="expansion_slot" id="expansion_slot"><br>
                    <label for="model">Model:</label><br>
                    <input type="text" name="model" id="model"><br>
                    <label for="tdp">TDP:</label><br>
                    <input type="text" name="tdp" id="tdp"><br>
                    <label for="description">Details:</label><br>
                    <textarea name="description" id="description"></textarea><br><br>
                    <input type="submit" name="add_component" value="Add">
                    </form>
                </div>
        <?php break;
        case "power_supply_units": ?>
                <!-- Form for deleting a component -->
                <div id="del-form">
                    <form action="adminPage.php" method="post">
                    <input type="hidden" name="category" value="power_supply_units">
                    <label for="component_id">Component ID:</label><br>
                    <input type="text" name="component_id" id="component_id"><br><br>
                    <input type="submit" name="delete_component" value="Delete">
                    </form>
                </div>

                <!-- Form for adding a component -->
                <div id="add-form">
                    <form action="adminPage.php" method="post">
                    <input type="hidden" name="category" value="power_supply_units">
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="imglink">Image link:</label><br>
                    <input type="text" name="imglink" id="imglink"><br>
                    <label for="stock">Stock:</label><br>
                    <input type="text" name="stock" id="stock"><br>
                    <label for="price">Price:</label><br>
                    <input type="text" name="price" id="price"><br>
                    <label for="wattage">Wattage:</label><br>
                    <input type="text" name="wattage" id="wattage"><br>
                    <label for="form_factor">Form factor:</label><br>
                    <input type="text" name="form_factor" id="form_factor"><br>
                    <label for="connectors">Connectors:</label><br>
                    <input type="text" name="connectors" id="connectors"><br>
                    <label for="description">Details:</label><br>
                    <textarea name="description" id="description"></textarea><br><br>
                    <input type="submit" name="add_component" value="Add">
                    </form>
                </div>
        <?php break;
        case "cases": ?>
                <!-- Form for deleting a component -->
                <div id="del-form">
                    <form action="adminPage.php" method="post">
                    <input type="hidden" name="category" value="cases">
                    <label for="component_id">Component ID:</label><br>
                    <input type="text" name="component_id" id="component_id"><br><br>
                    <input type="submit" name="delete_component" value="Delete">
                    </form>
                </div>

                <!-- Form for adding a component -->
                <div id="add-form">
                    <form action="adminPage.php" method="post">
                    <input type="hidden" name="category" value="cases">
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label for="imglink">Image link:</label><br>
                    <input type="text" name="imglink" id="imglink"><br>
                    <label for="stock">Stock:</label><br>
                    <input type="text" name="stock" id="stock"><br>
                    <label for="price">Price:</label><br>
                    <input type="text" name="price" id="price"><br>
                    <label for="form_factor">Form factor:</label><br>
                    <input type="text" name="form_factor" id="form_factor"><br>
                    <label for="cooling">Cooling:</label><br>
                    <input type="text" name="cooling" id="cooling"><br>
                    <label for="expansion_slots">Expansion slots:</label><br>
                    <input type="text" name="expansion_slots" id="expansion_slots"><br>
                    <label for="description">Details:</label><br>
                    <textarea name="description" id="description"></textarea><br><br>
                    <input type="submit" name="add_component" value="Add">
                    </form>
                </div>
    <?php
    break;
    }
        
        // Fetch data from database
        $sql = "SELECT * FROM $category";
        $result = mysqli_query($conn, $sql);

        // Get column names
        $columnNames = array();
        while ($fieldInfo = mysqli_fetch_field($result)) {
            $columnNames[] = $fieldInfo->name;
        }

        // Create table
        echo '<div id="table-div">';
        echo '<table>';
        echo '<tr>';
        foreach ($columnNames as $columnName) {
            echo '<th>' . $columnName . '</th>';
        }
        echo '</tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            foreach (array_keys($row) as $key) {
                echo '<td>' . $row[$key] . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
        mysqli_close($conn);
    
    }?>
    
    </div>
    <div id="menu">
        <h1>Meniu</h1>
        <div class="menu-options">
                <button class="menu-option" id="menu-btn1">Componente PC</button>
                <div class="submenu-options" id="sub-op1">
                    <button class="submenu-option" id="submenu1-btn1"><a href="./pagini-produse/placi-video/pv.html">Placi video</a></button>
                    <button class="submenu-option" id="submenu1-btn2"><a href="./pagini-produse/placi-de-baza/pdb.html">Placi de baza</a></button>
                    <button class="submenu-option" id="submenu1-btn3"><a href="./pagini-produse/procesoare/procesoare.html">Procesoare</a></button>
                </div>
                <button class="menu-option" id="menu-btn2">Despre noi</button>
                <button class="menu-option" id="menu-btn3">Contact</button>

        </div>
    </div>
    
    <script type="module" src="menu.js"></script>
</body>
</html>
