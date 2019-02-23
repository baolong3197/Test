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
    $db = new PDO('mysql:host=localhost;dbname=haigym_test;charset=utf8','haigym_haigym','hai123');

    $last_num = $db->prepare("SELECT * FROM `test2` order by `id` DESC LIMIT 10");
    $last_num->execute();
    $num = $last_num->fetchAll();
    $last_num->closeCursor();

    if(isset($_POST['text'])){
      $text_form = $_POST['text'];
      $insert = $db->prepare("INSERT INTO `test2` (`text`) VALUES ('$text_form');");
      $insert->execute();
      $insert->closeCursor();
    }
  ?>
<!-- <div class="jumbotron text-center">
  <h1 class="font-weight-lighter">Calculator</h1>
</div> -->

<div class="container" >
  <div class="d-flex justify-content-center" id="container_window">
    <div class="col-5 border mt-5" style="height:300px" id="chat_window">
      <?php
        foreach ($num as $text) {
          echo $text['text'] . "<br>";
        }
      ?>
    </div>
  </div>

  <div class="d-flex justify-content-center mt-5">
    <div class="col-6">
      <form method="post" id="text_form">
        <input id="mesage" type="text"  style="width:100%"/>
      </form>
    </div>
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    function reload(){
      $("#container_window").load(" #chat_window");
      console.log('running');
    }
    setInterval(reload, 100);

    $(document).on('keypress',function(e) {
        if(e.which == 13) {
          $( "#text_form" ).submit(function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            var text = $("#mesage").val();
            $.ajax({
              url: "index.php",
              type: "POST",
              data:{ text : text },
              success: function(){
                $("#container_window").load(" #chat_window");
                console.log(text);
              }
            });
            return false;
          });
        }
    });
});
</script>
</body>
</html>
