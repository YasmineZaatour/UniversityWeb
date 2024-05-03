<?php
    include 'db_connexion.php';
    // Handle delete and insert operations
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["idAdmin"])) {
            $idAdmin = $_POST["idAdmin"];

            $sql = "DELETE FROM admin WHERE idAdmin=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idAdmin);
            $stmt->execute();
        } elseif (isset($_POST["emailAdmin"], $_POST["passwordAdmin"])) {
            $emailAdmin = $_POST["emailAdmin"];
            $passwordAdmin = $_POST["passwordAdmin"];

            $sql = "INSERT INTO admin (emailAdmin, passwordAdmin) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $emailAdmin, $passwordAdmin);
            $stmt->execute();
        }
    }

    $sql = "SELECT * FROM admin";
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
    <title>Admins Data</title>
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
      function insertAdmin() {
        var emailAdmin = prompt("Enter email");
        var passwordAdmin = prompt("Enter password");

        if (emailAdmin && passwordAdmin) {
          var form = document.createElement("form");
          form.setAttribute("method", "post");
          form.setAttribute("action", "admin_data.php");

          var fields = ["emailAdmin", "passwordAdmin"];
          var values = [emailAdmin, passwordAdmin];

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
        <button onclick="insertAdmin()" 
        style="background-color: #42b5f2;
            color: white;
            margin-left:1400px;
            padding: 15px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer">Insert</button>
      </nav>
      <table class="admin-table">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['idAdmin']; ?></td>
                <td><?php echo $row['emailAdmin']; ?></td>
                <td><?php echo $row['passwordAdmin']; ?></td>
                <td>
                    <form method="post" action="admin_data.php">
                        <input type="hidden" name="idAdmin" value="<?php echo $row['idAdmin']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </section>

    

  </body>
</html>

