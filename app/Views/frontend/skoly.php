<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<style>
  h3 {
    text-align: center;
  }

  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
  }

  .vlevo {
    position: relative;
    width: 200px;
    border: 0px;
  }
  .control {
    font-weight: bold;
  }
</style>

<div>&nbsp </div>
<h3>Školy</h3>
<div>&nbsp </div>

<div class="container">
  <div class="row">
    <div class="vlevo">
      <div class="col-sm">
        <div id="checkboxes">
          <?php foreach ($mesta as $row) {
            $string = str_replace(' ', '', $row['nazev']);
          ?>
            <div class="form-check">
              <input class="form-check-input" id="checkbox" type="checkbox" value="" name="<?php echo $string; ?>">
              <?php echo $row['nazev']; ?>
            </div>

          <?php  } ?>
        </div>

      </div>
    </div>

    <div class="col-sm">

      <table class="table" id="table_ids">
        <thead>
          <tr class="Nazvy">
            <th scope="col">Název</th>
            <th scope="col">Město</th>
            <th scope="col">Obor</th>

            <th scope="col">Přijatí</th>
            <th scope="col">Geo-lat</th>
            <th scope="col">Geo-long</th>
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
            </tr>
          <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<script>

  var checkboxes = $('input[id="checkbox"]');
  const names = '';
  const tlacitka = [];
  checkboxes.on("click", function() {
     //var table = $('#table_id').DataTable(); 
    //table.search('').columns(0).order('asc').draw();

    if (tlacitka.includes(this.name)) {
      var index = tlacitka.indexOf(this.name);
      if (index !== -1) {
        tlacitka.splice(index, 1);
      }
    } else {

      tlacitka.push(this.name)

    }

    let text = tlacitka.join(', .');
    console.log(text);

    $("tr").show();
    var $checked = checkboxes.filter(":checked"),
      checkedValues = $checked.map(function() {
        $("tr:not(." + text + ", .Nazvy)").hide();
      }).get();

  });
</script>

