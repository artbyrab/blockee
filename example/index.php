<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require ('../vendor/autoload.php');

use artbyrab\blockee\Blockee;
use artbyrab\blockee\Block;

$blockee = new Blockee();
$blockee->addData("This is some more data added from the index file.");
$blockee->addData("Yet more data added from the index file.");
$blockee->addData("Even more data added from the index file.");
$blockee->addData("And there is more data added from the index file.");
$blockee->addData("Yet more data added from the index file.");

?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Blockee</title>
    <meta name="description" content="Blockee">
    <meta name="author" content="artbyrab">

    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <hr>
                <h1>Blockee</h1>
                <p>A PHP based blockchain</p>
                <hr>
                <ul>
                    <li>Current Blockchain size: <?php echo $blockee->getBlockSize();?> bytes</li>
                    <li>Current no of blocks in the Blockchain: <?php echo $blockee->getBlockCount();?></li>
                </ul>
                <p>
                    The current Blockee blockchain:
                </p>    
                
                <p>
    <?php echo "<pre>"; ?>
    <?php print_r($blockee); ?>
    <?php echo "</pre>"; ?>
                </p>
                <p>
                <?php $blockee->getChain()->verifyChain(); ?>
                </p>
            </div><!--/.col-->
        </div><!--/.row-->
    </div><!--/.container-->
</body>
</html>