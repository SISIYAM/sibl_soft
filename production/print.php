<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){
    header('location:admin_login.php');
}
include 'php/auto.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/sibl-agent-banking.jpg" type="image/gif/png">
    <title>Social Islami Bank Limited.</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Styles for Printing -->
    <style>
        @page {
            size: A4;
            margin: 0; /* Remove default margin */
        }

        /* Apply to print view */
        @media print {
            body {
                font-size: 10pt;
                margin: 0;
                padding: 0;
            }

            .container, .main_container {
                width: 100%;
                margin: 0;
                padding: 0;
            }

            /* First Report Section: Top half of the page */
            .page-wrapper {
                height: 95vh; 
                padding: 5px;
            }

            /* Ensure the report section fits */
            .report-top {
                padding: 5px;
                margin-bottom: 5px;
                overflow: auto;       
                page-break-after: avoid; 
                font-size: 8pt;  /* Reduce font size for header */
            }

            .report-top h2 {
                font-size: 12pt;  /* Reduce title font size */
            }

            .report-top h4, .report-top p, .report-top h3 {
                font-size: 10pt;  /* Reduce font size for subtitle and other text */
            }

            .signature {
                text-align: right;
                margin-top: 10px;
                border-top: 2px solid black;
                padding-top: 5px;
            }

            /* Adjust elements like table for better fit */
            .table, .table th, .table td {
                padding: 4px;
                font-size: 9pt;
            }

            /* Hide unwanted content during printing */
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="clearfix"></div>

                    <div class="page-wrapper">
                        <!-- First Report Section -->
                        <div class="report-top">
                            <section class="content invoice">
                                <div style="text-align: center; font-size: 8pt;"> <!-- Reduced font size -->
                                    <h2 style="font-size: 12pt;">Social Islami Bank Limited.</h2> <!-- Smaller font for title -->
                                    <h4><b style="font-size: 10pt;">Bonpara Outlet</b></h4> <!-- Smaller font for subtitle -->
                                    <p style="font-weight:500; font-size: 8pt;">Bonpara Pouro Market 2nd floor, Bonpara, Natore <br>Phone: 01770078171</p> <!-- Reduced font size -->
                                    <h3><b style="border-bottom:2px solid black; font-size: 10pt;">Outlet Cash Report</b></h3> <!-- Reduced font size -->
                                </div>
                                <br><br>
                                <div class="" style="float:right; font-size: 8pt; padding-top: 5px;"> <!-- Reduced font size for print details -->
                                    <b>Print Date: <?php
                                        date_default_timezone_set('Asia/Kolkata');
                                        echo date('d/m/Y');
                                    ?></b><br>
                                    <b>Print Time: <?php 
                                        date_default_timezone_set('Asia/dhaka');
                                        echo date('h:i A');
                                    ?> </b><br>
                                    <b style="font-size:10pt;">Printed by: <?php echo $_SESSION['username']; ?> </b><br>
                                </div>

                                <?php 
                                    include 'dbcon.php';
                                    $pid = intval($_GET['pid']); 

                                    $ret = mysqli_query($con, "select * from calculator where id='$pid'");
                                    while($row = mysqli_fetch_array($ret)) {
                                ?>
                                <div class="col">
                                    <p class="lead" style="font-weight:500;font-size: 10pt">Cash Report Date: 
                                        <?php 
                                            $oldDate = $row['date']; 
                                            $newDate = date("d/m/Y", strtotime($oldDate));  
                                            echo " " . $newDate . " ";  
                                        ?>
                                    </p>

                                    <!-- Calculation -->
                                    <?php 
                                        $sum = $row['money'] + $row['deposit'] + $row['ac_dew'] + $row['commission'] + $row['bill'];
                                        $total = $row['withdraw'] + $row['remitance'] + $row['extra'] + $row['stamp'];
                                        $hand_cash = $sum - $total;
                                        $available = $hand_cash - $row['borrow'] - $row['bill'];
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th style="width:50%">নগদ প্রদান:</th>
                                                    <td><?php echo $row['money'];?> BDT</td>
                                                </tr>
                                                <tr>
                                                    <th>মোট জমা:</th>
                                                    <td><?php echo $row['deposit'];?> BDT</td>
                                                </tr>
                                                <tr>
                                                    <th>A/C Dew:</th>
                                                    <td><?php echo $row['ac_dew'];?> BDT</td>
                                                </tr>
                                                <tr>
                                                    <th>কমিশন:</th>
                                                    <td><?php echo $row['commission'];?> BDT</td>
                                                </tr>
                                                <tr>
                                                    <th>বিদ্যুৎ বিল:</th>
                                                    <td><?php echo $row['bill'];?> BDT</td>
                                                </tr>

                                                <tr>
                                                    <th>মোট উত্তোলন:</th>
                                                    <td><?php echo $row['withdraw'];?> BDT</td>
                                                </tr>
                                                <tr>
                                                    <th>রেমিটেন্স:</th>
                                                    <td><?php echo $row['remitance'];?> BDT</td>
                                                </tr>
                                                <tr>
                                                    <th>খরচ:</th>
                                                    <td><?php echo $row['extra'];?> BDT</td>
                                                </tr>
                                                <tr>
                                                    <th>রাজস্ব:</th>
                                                    <td><?php echo $row['stamp'];?> BDT</td>
                                                </tr>
                                                <tr>
                                                    <th>হাতে নগদ:</th>
                                                    <td><b><?php echo $hand_cash ?> BDT</b></td>
                                                </tr>
                                                <tr>
                                                    <th>ধার দেওয়া হয়েছে:</th>
                                                    <td><?php echo $row['borrow'];?> BDT</td>
                                                </tr>
                                                <tr>
                                                    <th>ব্যাংকে জমা:</th>
                                                    <td><?php echo $row['bank_deposit'];?> BDT</td>
                                                </tr>

                                                <tr>
                                                    <th>অবশিষ্ট টাকা:</th>
                                                    <td>    
                                                        <b style="font-size:20px; color:#9D0707;"><?php echo $available; ?> BDT</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>In Words</th>
                                                    <td><?php include 'php/num.php'; echo convertNumber($available); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                            </section>
                             <!-- Signature Field will remain below the first report -->
                             <div style="float:right; margin:50px;">
                                <p style="border-top:2px solid black;">Signature of Manager</p>
                            </div>
                        
                        </div>
                       
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    

    <script>
        window.print();
    </script>
</body>
</html>
