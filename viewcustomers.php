<?php
require_once "connect_db.php";
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Spark Transfer</title>
        <link rel="stylesheet" href="common-style.css">
        <link rel="stylesheet" href="trans-style.css">
        <style>
            ::-webkit-scrollbar {
                width: 4px;
            }
            .customers {
                width: 100%;
            }
            #viewhistory {
                position: absolute;
                top: 1%;
                right: 1%;
                width: 18vw;
                height: 3vw;
                font-size: 1.2vw;
                cursor: pointer;
                background-color: rgba(231, 216, 216, 0.03);
                border: none;
                color: white;
                transition: all 0.15s;
                border-radius: 6px;
                opacity: 0.8;
            }
            #heading {
                margin-top: 10vh;
            }
            #viewhistory:hover {
                background: rgba(231, 216, 216, 0.13);
            }
            .tables-container {
                width: 80%;
                padding: 0;
                margin-left: 10%;
            }
            th {
                border-bottom: 1px solid rgba(250,250,250,0.5);
                padding-bottom: 1%;
                color: antiquewhite;
            }
            td {
                padding: 1% 0%;
            }
            tr:hover {
                background-color: rgba(68, 78, 156 ,0.3);
            }
            .ttt {
                padding: 0;
                border: none;
            }
            .customers {
                padding: 0;
                margin:0;
                height: 60vh;
                overflow-y:scroll ;
                color: whitesmoke;
                border-radius: 2px;
                background-color: rgba(250,250,250,0.2);
            }
        </style>
    </head>
    <body>
        <a href="home-page.php"><img src="Logo-PixTeller2.png" alt="logo" class="logo"></a>
        <h1 id="heading">
            Customer Details
        </h1>
        <div class="tables-container">
            <div class="customers" style="background:rgba(68, 78, 156 ,0.1)">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Account Number</th>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Account Balance</th>
                    </tr>
                    <?php
                    /* Quering the Database */
                    $sql = "SELECT cust_name,acc_number,email_id,acc_balance FROM customers";
                    $result = $conn->query($sql);
                    if (($result->num_rows) > 0) {
                        $i = 1;
                        while ($data = $result->fetch_assoc()) {
                            echo '
                        <tr id = "c' . $i . '">
                            <td class="ttt">' . $i . '</td>
       
                            <td>' . $data["acc_number"] . '</td>
                                                   
                            <td>' . $data["cust_name"] . '</td>
                                                    
                            <td>' . $data["email_id"] . '</td>
                                                   
                            <td>' . $data['acc_balance'] . '</td>
                        </tr>';
                            $i++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <p class="tbtn"><a href="start-transaction.php"><button>Transfer Money</button></a></p>
    </body>
</html>
