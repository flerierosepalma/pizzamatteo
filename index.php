<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Welcome Page</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_ico.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
        }

        .red-background,
        .white-background {
            width: 100%;
        }

        .red-background {
            flex: 1;
            background: linear-gradient(to right, #8A1C14 5%, black 70%);
            display: flex;
            flex-wrap: wrap; /* Ensure content wraps on smaller screens */
        }

        .white-background {
            background-color: #F0F2F5;
            padding: 20px;
        }

        .white-background h2 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #8A1C14;
            text-align: center;
            font-size: 40px;
        }

        .column {
            flex: 1;
            display: flex;
            flex-direction: column;
            color: white;
            padding: 0 10px;
            box-sizing: border-box; /* Ensure padding is included in width */
        }

        .column h3 {
            font-weight: bold;
            font-size: 75px;
            margin-top: 40px;
            margin-left: 60px;
            margin-bottom: 0;
            color: #FFCC00;
            text-align: left;
        }

        .column p {
            font-size: 25px;
            margin-left: 60px;
            margin-top: 0;
            margin-bottom: 70px;
            color: white;
            text-align: left;
        }

        .home-logo {
            max-width: 50%;
            max-height: 50%;
            border-radius: 50px;
            margin-top: 40px;
            margin-bottom: 20px;
            align-self: center;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            transition: transform 0.5s ease;
        }
        .home-logo:hover {
            transform: scale(1.05); 
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.9);
        }
        
        .pizza-background {
            max-width: 100%;
            max-height: 100%;
            border-radius: 10px;
            margin: auto;
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .buttons-container button {
            padding: 10px 40px;
            margin: 0 30px;
            font-size: 16px;
            cursor: pointer;
            border: 2px solid white;
            background-color: transparent;
            color: white;
        }

        .buttons-container button:hover {
            background-color: #FFCC00;
            box-shadow: 0 5px 5px black;
            transform: scale(1.02); 
            color: #8A1C14;
        }

        @media only screen and (max-width: 768px) {
            .red-background {
                flex-direction: column;
            }

            .column {
                width: 100%;
                padding: 20px;
            }

            .column h3 {
                font-size: 40px;
                margin-top: 10px;
            }
            
            .column p {
                font-size: 15px;
                margin-bottom: 10px;
            }
    
            .buttons-container button {
                margin: 10px 10px;
                font-size: 12px;
            }

            .home-logo {
                max-width: 60%;
                margin-top: 20px;
                margin-bottom: 20px;
            }
        }

        .pizza-menu {
            margin-top: 50px;
            padding: 0 20px;
        }

        .menu-container {
            display: grid;
            margin: 0 auto;
            max-width: 80%;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
        }

        @media only screen and (max-width: 768px) {
            .menu-container {
                max-width: 90%;
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            }
        }

        .menu-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f9f9f9;
            padding: 0;
            border: 1px solid #DDDDDD;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            overflow: hidden;
            text-align: center;
        }

        .menu-image-container {
            width: 100%;
            padding-top: 60%;
            position: relative;
        }

        .menu-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .menu-details {
            flex-grow: 1;
            padding: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .menu-item:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .menu-item h3 {
            font-weight: bold;
            font-size: 15px;
            margin-top: 0;
            color: #333;
        }

        .menu-item h1 {
            font-weight: bold;
            color: #8A1C14;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .menu-item p {
            margin-bottom: 5px;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="red-background">
        <div class="column" data-aos="fade-right">
            <img class="home-logo" src="assets/logosss.png" alt="Logos">
            <h3>DELICIOUS, HOT AND FRESH</h3>
            <p>Craving a pizza slice of happiness? <br> Place your order now!</p>
            <div class="buttons-container">
                <a href="customer_signup.php"><button>Sign Up</button></a>
                <a href="login.php"><button>Login</button></a>
            </div>
        </div>
        <div class="column" data-aos="fade-left">
            <img class="pizza-background" src="assets/pizzaz.png" alt="Pizzas">
        </div>
    </div>
    <div class="white-background">
        <div class="pizza-menu" data-aos="fade-up">
            <h2 class="text-center">Pizza Menu</h2>
            <div class="menu-container">
                <?php
                $sql_select_menu = "SELECT * FROM menu";
                $result_menu = mysqli_query($connect, $sql_select_menu);

                if (mysqli_num_rows($result_menu) > 0) {
                    while ($row = mysqli_fetch_assoc($result_menu)) {
                        $item_id = $row['item_id'];
                        $item_name = $row['item_name'];
                        $item_description = $row['item_description'];
                        $item_price = $row['item_price'];
                        echo '<div class="menu-item" data-aos="fade-up">';
                        echo '    <div class="menu-image-container">';
                        echo '        <img src="assets/menu/' . $row["item_picture"] . '" alt="' . $row["item_name"] . '" class="menu-image">';
                        echo '    </div>';
                        echo '    <div class="menu-details">';
                        echo '        <h3>' . $row["item_name"] . '</h3>';
                        echo '        <h1>₱' . number_format($row["item_price"], 2) . '</h1>';
                        echo '        <p>' . $row["item_description"] . '</p>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo "No items found.";
                }
                ?>
            </div>
        </div>
    </div>

    <?php require_once('_footer.php'); ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // Animation duration in milliseconds
            once: true, // Whether animation should happen only once
        });
    </script>
</body>
</html>