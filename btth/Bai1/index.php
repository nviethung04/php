<?php
session_start();

$flowers = $_SESSION['flowers'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .flower-card {
            border: 1px solid #ddd;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }
        .flower-card img {
            width: 150px;
            height: 150px;
            margin-right: 15px;
        }
    </style>

</head>
<body>
<h1>Danh sách hoa</h1>
<?php foreach ($flowers  as $flower): ?>
    <div class="flower-card">
        <img src="<?php echo $flower['image']; ?>"  alt="<?php echo $flower['name']; ?>">
   
        <div>
                <h2><?php echo $flower['name']; ?></h2>
                <p><?php echo $flower['description']; ?></p>
            </div>
    </div>
    <?php endforeach; ?>
</body>
</html>