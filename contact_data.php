<?php
    include 'db_connexion.php';
    // Handle delete operation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];

            $sql = "DELETE FROM contact WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
        } elseif (isset($_POST["name"], $_POST["email"], $_POST["subject"], $_POST["message"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];

            $sql = "INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $email, $subject, $message);
            $stmt->execute();
        }
    }

    $sql = "SELECT * FROM contact";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Contacts Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table{
            width: 80%;
            background-color: white;
            margin-left: 160px;
            border-radius: 15px;
        }
        td{
            border-collapse: collapse;
            border: 1px solid #42b5f2;
            background-color: white;  
            border-radius: 0px;
            text-align: center;
            width: 60px;
            
        }
        th{
            width: 100%;
            height: 20px;
            text-align: center;
            padding: 10px;
            color: #42b5f2;
            
        }
        button[type="submit"] {
            background-color: #42b5f2;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #d23a30;
        }
    </style>
    <script>
      function insertRow() {
        var name = prompt("Enter name");
        var email = prompt("Enter email");
        var subject = prompt("Enter subject");
        var message = prompt("Enter message");

        if (name && email && subject && message) {
          var form = document.createElement("form");
          form.setAttribute("method", "post");
          form.setAttribute("action", "contact_data.php");

          var fields = ["name", "email", "subject", "message"];
          var values = [name, email, subject, message];

          for (var i = 0; i < fields.length; i++) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", fields[i]);
            hiddenField.setAttribute("value", values[i]);

            form.appendChild(hiddenField);
          }

          document.body.appendChild(form);
          form.submit();
        }
      }
    </script>
  </head>
  <body>
  <section class="header">
      <nav>
        <img href="admin_dashboad.php" src="image/logoI.png" />
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="admin_data.php">ADMIN</a></li>
            <li><a href="users_data.php">USERS</a></li>
            <li><a href="contact_data.php">CONTACT</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
      <nav>
        <button onclick="insertRow()" 
        style="background-color: #42b5f2;
            color: white;
            margin-left:1400px;
            padding: 15px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer">Insert</button>
      </nav>
      <table class="contact-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td>
                    <form method="post" action="contact_data.php">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </section>

    

  </body>
</html>