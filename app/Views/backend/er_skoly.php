<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/d089b36c07.js" crossorigin="anonymous"></script>
  
</head>
<body>
<style>
     .line{
width: 112px;
height: 47px;
border-bottom: 1px solid black;
position: absolute;
}
</style>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/create') ?>" class="btn btn-success mb-2">Nová škola</a>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <a href="<?php echo site_url('/create_city') ?>" class="btn btn-success mb-2">Nové město</a>

        <div>&nbsp</div>

	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table" id="users-list">
        <thead>
          <tr class="Nazvy">
            <th scope="col">Název</th>
            <th scope="col">Město</th>
            <th scope="col">Obor</th>

            <th scope="col">Přijatí</th>
            <th scope="col">Geo-lat</th>
            <th scope="col">Geo-long</th>
            <th scope="col">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            </th>
            <th scope="col"></th>

          </tr>
        </thead>
        <tbody>
          <?php foreach ($skoly as $row) {
            $string = str_replace(' ', '', $row['nazev']); ?>
            <tr class="<?php echo $string; ?>" id="radek">
              <td><?php echo $row['skola']; ?></td>
              <td><?php echo $row['nazev']; ?></td>
              <td><?php echo $row['obor']; ?></td>

              <td><?php echo $row['pocet']; ?></td>

              <td><?php echo $row['geo-lat']; ?></td>
              <td><?php echo $row['geo-long']; ?></td>
              <td>
              <a href="<?php echo base_url('editZaklad/'.$row['id']);?>">Základní úprava</a>
              <br>
              <?php if($row['prijati_id']) { ?>
              <a href="<?php echo base_url('edit/'.$row['prijati_id']);?>">Vedlejší úprava</a>
                <?php } else {?>
                <a href="<?php echo base_url('novyObor/'.$row['id']);?>">Přidat obor</a>
                    <?php } ?>

              &nbsp
              </td>
              <td><a href="<?php echo base_url('delete/'.$row['id']);?>" style=color:red><i class="fas fa-times"></i></a></td>
            </tr>
          <?php  } ?>
        </tbody>
      </table>     
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
  } );
</script>
</body>
</html>