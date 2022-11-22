<?php
if(!defined('APP_ROOT')) {echo "access not allowed";  exit; }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Users</title>
  <link rel="stylesheet" href="/public/css/list.css">

</head>

<body>
  <section>
    <h1>List Users</h1>
    <table>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      <?php 
      foreach ($data["users"] as $user) {
        echo "<tr class='data'>";
        echo "<td class='username'>" . $user['username'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo '<td><a class="delete-user" href="/delete-user?user=' . $user['username'] . '"> Delete</a></td>';
        echo "<tr>";
      }
      ?>
    </table>

  </section>

  <div class="background-popup" id="popup-data-user">
    <div class="wrapper-popup">
      <h2>User's Data</h2>
      <div id="data-user">
        <p>
          <strong>Username</strong>: <span class="username"> </span> <br>
          <strong>Password</strong>: <span class="password"> </span> <br>
          <strong>Email</strong>: <span class="email"> </span> <br>
          <strong>Birthday</strong>: <span class="birthday"> </span> <br>
          <strong>URL</strong>: <a href=""><span class="url"> </span></a> <br>
          <strong>Phone Number</strong>: <span class="phone-number"> </span> <br>
        </p>
      </div>

      <div id="close-popup">X</div>

    </div>
  </div>

  <div class="background-popup" id="popup-delete-confirm">
    <div class="wrapper-popup">
      <h3>Are you sure you want to delete this item?</h3>

      <div class="button-wrapper">
        <button id="confirm-ok">OK</button>
        <button id="confirm-close">Close</button>

      </div>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(".username").click(function() {


      var userName = $(this).text().trim()

      $.get(`/get-user?user=${userName}`, function(data, status) {
        $("#data-user span").each(function(index) {
          var className = $(this).attr('class');
          $(this).text(data[className])
        });
        $("#data-user a").attr('href', data['url']);
      });
      $("#popup-data-user").addClass("active")

    })
    $("#close-popup").click(function() {
      $("#popup-data-user").removeClass("active")
    })

    $(".delete-user").click(function(event) {
      event.preventDefault()

      var urlDeleteItem = $(this).attr('href');

      $("#popup-delete-confirm").addClass("active")


      $("#confirm-ok").click(function() {
        $.get(`${urlDeleteItem}`, function(data, status) {
          location.reload();
        })
      })

      $("#confirm-close").click(function() {
        $("#popup-delete-confirm").removeClass("active")
      })

    })
  </script>

</body>

</html>