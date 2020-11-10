<?php

require_once "connect_db.php";

$err_msg = '';
$s_msg = '';


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $from_acc = (int)filter_input(INPUT_POST,"from_acc");
    $to_acc = (int)filter_input(INPUT_POST,"to_acc");
    $from_cust = filter_input(INPUT_POST,"from_cust");
    $to_cust = filter_input(INPUT_POST,"to_cust");
    $amt = (float)filter_input(INPUT_POST,"amount");

    $sql1 = "SELECT cust_name,acc_balance FROM customers WHERE acc_number = ".$from_acc;
    $sql2 = "SELECT cust_name,acc_balance FROM customers WHERE acc_number = ".$to_acc;

    $res1 = $conn->query($sql1);
    $res2 = $conn->query($sql2);

    if (($res1->num_rows > 0) and ($res2->num_rows > 0)) {

        $d1 = $res1->fetch_assoc();
        $d2 = $res2->fetch_assoc();

        if ((strcasecmp($d1['cust_name'],$from_cust) == 0) and (strcasecmp($d2['cust_name'],$to_cust) == 0)) {

            if ($amt <= $d1['acc_balance']) {

                $curr_bal = $d1['acc_balance'] - $amt;
                $new_amt = $d2['acc_balance'] + $amt;

                $upd1 = "UPDATE customers SET acc_balance = ".$curr_bal." WHERE acc_number = ".$from_acc;
                $upd2 = "UPDATE customers SET acc_balance = ".$new_amt." WHERE acc_number = ".$to_acc;

                if (($conn->query($upd1) == TRUE) and ($conn->query($upd2) == TRUE)) {

                    $trans = "INSERT INTO transaction_rec VALUES (NULL,".$from_acc.",".$to_acc.",".$amt.",'SUCCESSFUL')";

                    $s_msg = "Transaction Successful!";
                }
            } else {
                $trans = "INSERT INTO transaction_rec VALUES (NULL,".$from_acc.",".$to_acc.",".$amt.",'FAILED')";
                $err_msg = "The Entered Amount is Higher than Current Balance.<br>Transaction Cancelled!";
            }     
        } else {
            $trans = "INSERT INTO transaction_rec VALUES (NULL,".$from_acc.",".$to_acc.",".$amt.",'FAILED')";
            $err_msg = "Account details are Incorrect!<br>Please Verify and Try Again.";
        }
    } else {
        $err_msg = "Invalid Account Credentials!";
    }

    if ($err_msg != "Invalid Account Credentials!") {
        $conn->query($trans);
    }

    include "start-transaction.php";
}

?>