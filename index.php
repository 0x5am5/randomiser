
<html>
  <head>
    <title>Filmn Club Randomiser</title>
  </head>
  <body>
    <h1>Filmn Club Randomiser!</h1>
    <?php 
    $filmn = $_GET['filmn'];
    $file = 'log.txt';
    
    if ($filmn) {
      file_put_contents("log.txt", $filmn);
    }

    if (!file_exists($file)) { 
    ?>
      <form name="theForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" action="post">
        <p>Insert comma seperated list of films to be randomised!</p>
        <textarea name="" id="" cols="30" rows="10"></textarea>  
        <input type="hidden" name="filmn">
        <input type="button" value="Randomise!">
      </form>      
      <script>
        var d = document;
        var form = d.getElementsByTagName('form')[0];
        var textArea = form.querySelectorAll('textarea')[0];
        var button = form.querySelectorAll('input[type=button]')[0];
        var hidden = form.querySelectorAll('input[type=hidden]')[0];

        button.addEventListener('click', formSubmit, false);

        function formSubmit(e) {

          var filmns = textArea.value.split(',');
          var chosenFilmn = filmns[Math.floor(Math.random() * filmns.length)];

          var choice = confirm(chosenFilmn);        
          
          if (choice == true) {
            hidden.value = chosenFilmn;
          } else {
            hidden.value = chosenFilmn;   
          } 

          document.theForm.submit();
        }
      </script>
    <?php } else {
       echo '<h2>Chosen Filmn this week is... <span style="color:red;">';
       readfile($file);
       echo '</span></h2>';
    }
    ?>
  </body>
</html>