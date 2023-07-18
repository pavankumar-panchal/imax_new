<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        
    <?php
    //  $pagetitle = getpagetitle($_GET['a_link']); echo ($pagetitle);
     ?>
</title>
    <?php include('../inc/stylesnscripts.php'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        /* Header */
        #header {
            background-color: #FFFFFF;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        #logo {
            width: 30%;
        }

        #logo img {
            width: 100px;
            height: 100px;
        }

        #version {
            width: 70%;
            text-align: right;
            font-size: 14px;
            color: #6C82FA;
        }

        /* Navigation */
        #navigation {
            background-color: #F0EADE;
            padding: 10px;
            border-top: 1px solid #C6C3C6;
            border-bottom: 1px solid #C6C3C6;
        }

        .nav-title {
            font-size: 18px;
            font-weight: bold;
        }

        .nav-link {
            display: block;
            padding: 5px 0;
            cursor: pointer;
            color: #000;
            text-decoration: none;
        }

        .nav-link:hover {
            background-color: #F0F0F0;
        }

        /* Content */
        #content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .left-sidebar {
            flex: 0 0 25%;
            background-color: #F0EADE;
            padding: 10px;
        }

        .right-sidebar {
            flex: 0 0 25%;
            background-color: #F0EADE;
            padding: 10px;
        }

        .main-content {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #C6C3C6;
        }

        .content-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Footer */
        #footer {
            background-color: #E1E1E1;
            padding: 10px;
            color: #777;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="header">
        <div id="logo">
            <img src="../images/ssm-new-logo.jpg" alt="SSM Logo" />
        </div>
        <div id="version">
            <strong>Saral SSM - Version 2.00</strong>
            <br />
            Logged In as: <?php echo (ucwords(strtolower($loggedusername)) . '   &nbsp;[ <u>' . ucwords(strtolower($usertype)) . '</u> ]'); ?>
            | <span class="logout-text"><a href="../logout.php" onclick="<?php if ($usertype == "ADMIN" || $usertype == "MANAGEMENT" || $usertype == "GUEST") { ?> SetCookie('navigationcookie','1|tabgroup1|home-nav|home-nav-div-line|home-nav-sub-div'); <?php } ?>">Logout</a></span>
        </div>
    </div>
    <div id="navigation">
        <div class="nav-title">Options</div>
        <a href="./index.php?a_link=authorize_records" class="nav-link">Record Authorization</a>
        <div class="nav-title">Reports</div>
        <a href="./index.php?a_link=report_callstatistics" class="nav-link">Stats &amp; Reports</a>
        <a href="./index.php?a_link=report_bugstatistics" class="nav-link">Error Report</a>
        <a href="./index.php?a_link=report_requirementstatistics" class="nav-link">Requirement Report</a>
        <a href="./index.php?a_link=report_onsitestatistics" class="nav-link">Onsite Report</a>
        <a href="./index.php?a_link=report_statisticschart" class="nav-link">Chart View</a>
        <?php if ($usertype <> 'GUEST') { ?>
            <a href="./index.php?a_link=attendance_report" class="nav-link">Attendance</a>
        <?php } ?>
        <a href="./index.php?a_link=report_dailyreport" class="nav-link">Daily Report</a>
    </div>
    <div id="content">
        <div class="left-sidebar">
            <strong>About:</strong>
            <p>Product: Saral SSM</p>
            <p>Version: 2.00</p>
            <p>Members, who have/had logged in today:</p>
            <?php echo $membergrid; ?>
        </div>
        <div class="main-content">
            <div class="content-header">Home > Dashboard</div>
            <?php if (!$_GET['a_link'] || $_GET['a_link'] == 'home_dashboard') { ?>
                <!-- Your dashboard content here -->
            <?php } else { $pagelink = getpagelink($_GET['a_link']); include($pagelink); } ?>
        </div>
        <div class="right-sidebar">
            <!-- Add content for right sidebar here -->
        </div>
    </div>
    <div id="footer">
        A product of Relyon Web Management | Copyright © 2012 Relyon Softech Ltd. All rights reserved.
    </div>
</body>
</html>
