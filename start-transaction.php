<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Spark Transfer</title>
        <link rel="stylesheet" href="start-style.css">
        <link rel="stylesheet" href="common-style.css">
    </head>
    <body>
        <img src="Logo-PixTeller2.png" alt="logo" class="logo">
        <div class="container">
            <div class="leftcont">
                <h1 id="lheading">View All The Customers and Transfer Money to their Account</h1>
                <p><a href="viewcustomers.php" id="viewcc">View all Customers</a></p>
            </div>
            <div class="send-container">
                <form class="send-block" method="POST" action="process-transfer.php">
                    <table class="transtable">
                        <tr>
                            <th><h1>Enter Details to Transfer Money</h1></th>
                        </tr>
                        <tr>
                            <td>
                                <b class="bold">From</b>
                                <div class="from">
                                    <p>Account No. : <br>
                                        <input type="number" name="from_acc" id="a1" required list="acc-numbers"></p> 
                                    <p>Customer Name : <br>
                                        <input type="text" name="from_cust" id="cn1" required></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b class="bold">To</b>
                                <div class="to">
                                    <p>Account No. : <br>
                                        <input type="number" name="to_acc" id="a2" required list="acc-numbers"></p> 
                                    <p>Customer Name : <br>
                                        <input type="text" name="to_cust" id="cn2" required ></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><p class="amt">Amount (in Rs.) : 
                                    <input type="number" class="amt-i" name="amount" required >
                                </p></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="PROCEED" id="send" name="send">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        
        <datalist id="acc-numbers">
            <option value="11111100"></option>
            <option value="11111200"></option>
            <option value="11111300"></option>
            <option value="11111400"></option>
            <option value="11111500"></option>
            <option value="11111600"></option>
            <option value="11111700"></option>
            <option value="11111800"></option>
            <option value="11111900"></option>
            <option value="111111010"></option>
        </datalist>

        <?php if (!empty($err_msg) or!empty($s_msg)) { ?>
            <div class="message-container">
                <div class="message">
                    <?php
                    if (!empty($err_msg)) {
                        echo "<h2 style='color:red'>$err_msg</h2>";
                    } elseif (!empty($s_msg)) {
                        echo "<h2 style='color:green'>$s_msg</h2>";
                    }
                    ?>
                    <p style="text-align: center;"><button id="okbtn" onclick="document.querySelector('.message-container').style.display = 'none';">OK</button></p>
                </div>
            </div>
        <?php } ?>
        
    </body>
</html>