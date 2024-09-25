<?php 
include 'conectarbanco.php';
$conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);

$sql = "SELECT * FROM app";
$result2 = $conn->query($sql);
$result = $result2->fetch_assoc();

$google_ads_tag = $result['google_ads_tag'];
$facebook_ads_tag = $result['facebook_ads_tag'];
$conn->close();
?>

<!-- Meta Pixel Code -->

<!-- End Meta Pixel Code -->

<script async src="https://www.googletagmanager.com/gtag/js?id=<?php $google_ads_tag ?>"> </script>
<script>
    window.dataLayer = window.dataLayer | | [ ] ;
    function gtag ( ) {dataLayer.push (arguments ) ; }
    gtag ('js' , new Date ( ) ) ;
    gtag ('config', '<?php $google_ads_tag ?>') ;
</script>