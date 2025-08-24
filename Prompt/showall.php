<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output Page</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #DBFAFE; margin: 0; padding: 0; }
        .header { background-color: #4169E1; padding: 20px; text-align: right; }
        .header button { background-color: #1E3A8A; color: white; border: none; padding: 10px 20px; margin: 10px; cursor: pointer; font-size: 18px; }
        .container { width: 80%; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        .search-bar { display: flex; justify-content: center; margin-bottom: 20px; }
        .search-bar input { width: 60%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .search-bar button { background-color: #3B82F6; color: white; border: none; padding: 10px; cursor: pointer; font-size: 16px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid #ccc; text-align: center; }
        th, td { padding: 10px; }
        .action-button { background-color: #1E3A8A; color: white; border: none; padding: 5px 10px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="header">
        <button onclick="window.location.href='index.php'">Input</button>
        <button onclick="window.location.href='showall.php'">Show All</button>
    </div>
    <br><br>
    <div class="container">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search...">
            <button onclick="search()">Search</button>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Visit</th>
                    <th>Tags</th>
                    <th>Tut</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "aiList";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                if ($search) {
                    $stmt = $conn->prepare("SELECT * FROM allAi WHERE tags LIKE ?");
                    $likeSearch = "%$search%";
                    $stmt->bind_param("s", $likeSearch);
                } else {
                    $stmt = $conn->prepare("SELECT * FROM allAi");
                }
                
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><a href='<?php echo $row['link'] ?>' target='_blank'><button class='action-button'>Visit</button></a></td>
                            <td><?php echo $row['tags']?></td>
                            <td><a href='https://www.youtube.com/results?search_query=<?php echo $row['name']?>+tutorial' target='_blank'><button class='action-button'>Tutorial</button></a></td>
                            <td>
                                <button onclick="setName('<?php echo $row['name']; ?>')" class='action-button'>Details</button>
                            </td>
                          </tr>;
                        <?php
                }
                
                $stmt->close();
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    
    <script>
        function search() {
            let searchQuery = document.getElementById("searchInput").value;
            localStorage.setItem("search", searchQuery);
            window.location.href = "showall.php?search=" + searchQuery;
        }
        
        function setName(name) {
            localStorage.setItem("name", name);
            window.location.href = 'details.php?name=' + name;
            
        }
        
        document.addEventListener("DOMContentLoaded", function() {
            let savedSearch = localStorage.getItem("search");
            if (savedSearch) {
                document.getElementById("searchInput").value = savedSearch;
            }
        });
    </script>
</body>
</html>
