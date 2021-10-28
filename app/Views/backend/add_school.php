<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  <?php $db = \Config\Database::connect(); ?>

  <style>
    .container-sm {
      text-align: center;
      max-width: 400px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body>
  <div class="container-sm mt-3">
    <form method="post" id="addname" name="addname" action="/store">
      <div class="form-group">
        <label>Název</label><br>
        <input type="text" name="skola" id="skola" class="form-control">
      </div>
      <label>Město</label><br>
      <select class="form-control" name="mesto" id="mesto">
        <?php
        $query = $db->query("SELECT * FROM mesto");
        foreach ($query->getResult() as $row) { ?>
          <option value=<?php echo $row->id ?>> <?php echo $row->nazev;
                                              } ?></option>
      </select>
      <div>&nbsp</div>
      <label>Obor</label><br>

      <select class="form-control" name="obor">
      <option> </option>

        <?php
        $query = $db->query("SELECT * FROM obor");
        foreach ($query->getResult() as $row) { ?>
          <option value=<?php echo $row->id ?>> <?php echo $row->nazev;
                                              } ?></option>
      </select>
      <div>&nbsp</div>
      <div class="form-group">
        <label>Počet přijatých</label><br>
        <input type="number" name="pocet" class="form-control">
      </div>

      <div class="form-group">
        <label>Geo-lat</label><br>
        <input type="number" name="geo-lat" class="form-control">
      </div>
      <div class="form-group">
        <label>Geo-long</label><br>
        <input type="number" name="geo-long" class="form-control">
      </div>    
      <div class="form-group">
        <button type="submit" class="btn btn-success">Přidat</button>
      </div>

    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
</body>

</html>