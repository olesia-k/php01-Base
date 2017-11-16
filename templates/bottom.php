 <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

    <?

      if(!empty($scripts)) {
      foreach($scripts as $script) {
    ?>
        <script src="<?=$script?>"></script>
    <?      
      }
    }

    
      if ($_SESSION['user_id']) { // Если пользователь зашел авторизованным, подключить ему еще один скрипт
          ?>
            <script src="js/cabinet.js"></script>
          <?
      }
    ?>

  </body>

</html>