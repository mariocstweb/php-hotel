<?php
require 'data/data.php';

// Recupero il valore del filtro parcheggi
$filterdParking = $_GET['parking_opions'] ?? '';

// Nuovo array vuoto dove pusho gli hotel filtrati
$filteredHotels = [];

//Filtro gli hotel in base alla select
if ($filterdParking === '2') {
  // Filtro gli Hotel con parcheggio
  foreach ($hotels as $hotel) {
    // Se "parking" è true pusho nel nuovo array
      if ($hotel['parking']) {
          $filteredHotels[] = $hotel;
      }
  }
} elseif ($filterdParking === '3') {
  // Filtro gli Hotel senza parcheggio
  foreach ($hotels as $hotel) {
    // Se "parking" è false pusho nel nuovo array
      if (!$hotel['parking']) {
          $filteredHotels[] = $hotel;
      }
  }
} else {
  //Non applico nessun filtro
  $filteredHotels = $hotels;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Hotel</title>
</head>
<body>
  <div class="container d-flex justify-content-end p-3">
    <form action="" method="GET" class="d-flex">
      <select class="form-select" name="parking_opions">
      <option selected>Choose</option>
      <option value="1">All</option>
      <option value="2">Parking</option>
      <option value="3">No Parking</option>
      </select>
      <button type="submit" class="btn btn-primary ms-3">Search</button>
    </form>
  </div>
  <div class="container p-5">
  <h1 class="text-center">Hotels</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Parking</th>
          <th scope="col">Vote</th>
          <th scope="col">Distance to center</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($filteredHotels as $index => $hotel) : ?>
        <tr>
          <td><?= $hotel['name'] ?></td>
          <td><?= $hotel['description'] ?></td>
          <td><?= $hotel['parking'] ? '<i class="fa-regular fa-circle-check"></i>' : '<i class="fa-regular fa-circle-xmark"></i>' ?></td>
          <td><?= $hotel['vote'] ?></td>
          <td><?= $hotel['distance_to_center'] ?> km</td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>