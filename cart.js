// Get all the checkboxes
var checkboxes = document.querySelectorAll("input[type='checkbox']");

// Loop through the checkboxes
for (var i = 0; i < checkboxes.length; i++) {
  // Add an event listener to each checkbox
  checkboxes[i].addEventListener("change", function() {
    // Get the category of the selected component
    var category = this.value;
    
    // Loop through the checkboxes again
    for (var j = 0; j < checkboxes.length; j++) {
      // If the checkbox is in the same category as the selected component
      if (checkboxes[j].value == category) {
        // If the checkbox is not the selected component
        if (checkboxes[j] != this) {
          // Disable the checkbox
          checkboxes[j].disabled = true;
        }
      }
    }
  });
}