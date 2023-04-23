/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
  }
<script>
  // Get the button and the dropdown menu
  var button = document.getElementById("dropdownMenuButton");
  var dropdownMenu = document.querySelector(".dropdown-menu");

  // Add an event listener to the button
  button.addEventListener("click", function() {
    // Toggle the 'show' class on the dropdown menu
    dropdownMenu.classList.toggle("show");
  });

  // Close the dropdown menu if the user clicks outside of it
  window.addEventListener("click", function(event) {
    if (!event.target.matches(".dropdown-toggle")) {
      dropdownMenu.classList.remove("show");
    }
  });
</script>







