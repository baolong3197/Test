<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css\style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Calculator</title>

</head>

<body>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );

    }
	function disable(){}
</script>
  <?php
    $db = new PDO('mysql:host=localhost;dbname=tamAnSale;charset=utf8','root','');

    $last_num = $db->prepare("SELECT * FROM `test` order by `id` DESC ");
    $last_num->execute();
    $num = $last_num->fetchAll();
    $last_num->closeCursor();

    if(isset($_POST['hidden_result'])){
      $target_num = $_POST['hidden_result'];
      $insert = $db->prepare("INSERT INTO `test` (test_num) VALUES ('$target_num')");
      $insert->execute();
      $insert->closeCursor();

      echo '<meta http-equiv="refresh" content="0">';
    }
  ?>
<!-- <div class="jumbotron text-center">
  <h1 class="font-weight-lighter">Calculator</h1>
</div> -->
<div class="container mb-5 mt-5">

  <!-- Calculator -->
  <form method="post">
  <div class="d-flex flex-row justify-content-center">
    <div class="col-3 border border-secondary" style="height: 400px;border-radius: 10px;background-color:#e67e22">
      <div class="d-flex flex-row justify-content-center">
        <div class="col-12 m-2 border" style="height:50px;border-radius: 10px;background-color:#ecf0f1">
          <h1 class="font-weight-lighter text-right" id="result">0</h1>
          <input type="hidden" name="hidden_result" id="hidden_result" value="">
        </div>
      </div>

      <div class="d-flex flex-row justify-content-start border" style="height: 315px;border-radius: 10px;background-color:#ecf0f1">
        <div class="col-10 p-2 mt-1">



            <div class="row">
              <div class="col-3">
                <button type="button" name="button" class="btn btn btn-light rounded-circle">AC</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn btn-light rounded-circle">+/-</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn btn-light rounded-circle">%</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn btn-light rounded-circle">%</button>
              </div>
            </div>

            <div class="row" style="padding-top:5px">
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">1</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">2</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn btn-light rounded-circle">3</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn btn-light rounded-circle">x</button>
              </div>
            </div>

            <div class="row" style="padding-top:5px">
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">4</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">5</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">6</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">-</button>
              </div>
            </div>

            <div class="row" style="padding-top:5px">
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">7</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">8</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">9</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">+</button>
              </div>
            </div>

            <div class="row" style="padding-top:5px">
              <div class="col-6">
                <button type="button" name="button" class="btn btn-light rounded-circle">0</button>
              </div>
              <div class="col-3">
                <button type="button" name="button" class="btn btn-light rounded-circle">,</button>
              </div>
              <div class="col-3">
                <button type="submit" name="button" class="btn btn-light rounded-circle">=</button>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
  </form>
  <!-- eof Calculator -->

  <div class="d-flex flex-row justify-content-center mt-5">
    <div class="col-5 border" style="height: 100px;">

      <p>Số cuối bạn nhập là: <?php echo $num[0]['test_num']; ?></p>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
  $( document ).ready(function() {
      $('.btn').click(function(){
        if($('#result').text() === "0"){
          if(!$.isNumeric($(this).text())){
            $('#result').text("0");
          }
          else{
            $('#result').text($(this).text());
          }
        }
        else{
          if($(this).text() === "AC"){
            $('#result').text("0");
          }
          else if($(this).text() === "="){
            $('#last_num').text($('#result').text());
          }
          else{
            $('#result').append($(this).text());
          }
        }
        $('#hidden_result').val($('#result').text());
      });


  });
</script>
</body>
</html>
