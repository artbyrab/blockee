<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require ('../vendor/autoload.php');

use artbyrab\blockee\Blockee;
use artbyrab\blockee\Block;

$blockee = new Blockee();
$blockee->addData("Transfer $10 from wallet a to wallet b");
$blockee->addData("Transfer $20 from wallet a to wallet b");
$blockee->addData("Transfer $10 from wallet c to wallet d");
$blockee->addData("Transfer $5 from wallet a to wallet d");
$blockee->addData("Transfer $20 from wallet f to wallet a");
$blockee->addData("Transfer $2 from wallet b to wallet c");
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
                <img style="margin:10px;" src="../files/graphics/blockee-logo.png">
                <hr>
                <h1>Blockee</h1>
                <p>
                    Blockee is a experimental blockchain built in PHP. 
                </p>
                <p>
                    Blockee is an experiment to see if i could build some basic 
                    functionality of a blockchain in PHP in a small time frame. 
                    I took as little inspiration as possible by trying not to 
                    look at other people's implementations of a blockchain. 
                    Therefore, i may have built this in a non traditional way 
                    or wholly misunderstood basic concepts. The sources i used 
                    as full or partial inspiration are in the resources section 
                    of this file.
                </p>
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