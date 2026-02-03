<?php
$pagetitle = 'Depreciation Calculator';
require('assets/header.php');
?>

<h1>Yearly Depreciation Calculator</h1>

<form action="" method="post">
    <label>Item Value (Naira): </label>
    <input type="number" name="itemValue" placeholder="Enter item value" /> <br /> <br />
    
    <label>Depreciation Rate (%): </label>
    <input type="number" name="rate" placeholder="Enter depreciation rate" /> <br /> <br />
    
    <label>Number of Years: </label>
    <input type="number" name="years" placeholder="Enter number of years" /> <br /> <br />
    
    <input type="submit" value="Calculate Depreciation" />
</form>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemValue = $_POST['itemValue'];
    $rate = $_POST['rate'];
    $years = $_POST['years'];
    
    // Validation
    if (empty($itemValue)) {
        exit('Please enter item value');
    }
    if (empty($rate)) {
        exit('Please enter depreciation rate');
    }
    if (empty($years)) {
        exit('Please enter number of years');
    }
    
    // Convert rate to decimal (10% = 0.10)
    $rateDecimal = $rate / 100;
    
    // Calculate depreciated value
    // Formula: New Value = Original Value × (1 - Rate)^Years
    $deprecatedValue = $itemValue * pow(1 - $rateDecimal, $years);
    
    // Calculate total depreciation
    $totalDepreciation = $itemValue - $deprecatedValue;
    
     echo "<hr>";
    echo "<h2>Results:</h2>";
    echo "Original Value: ₦" . number_format($itemValue, 2) . "<br>";
    echo "Depreciation Rate: " . $rate . "% per year<br>";
    echo "Number of Years: " . $years . "<br>";
    echo "<br>";
    echo "Total Depreciation: ₦" . number_format($totalDepreciation, 2) . "<br>";
    echo "<strong>Value After " . $years . " Year(s): ₦" . number_format($deprecatedValue, 2) . "</strong>";
}
?>

</body>
</html>
