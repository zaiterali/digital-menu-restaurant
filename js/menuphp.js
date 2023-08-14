// GET NEW ITEMS ON DOCUMENT LOAD
$(document).ready(function () {
  // Send data to the PHP file using AJAX
  $.ajax({
    url: "../config/getnewtomenu.php",
    method: "POST",
    success: function (response) {
      // Handle the response from the PHP file
      alert(response);
      $("#itemsDiv").html(response);
      // You can perform further actions here, such as displaying a success message or updating the UI
    },
    error: function (xhr, status, error) {
      // Handle error
      console.error(xhr.responseText);
    },
  });
});
