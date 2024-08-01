<div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Creer par Senresto <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/themes/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/themes/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/themes/js/sidebarmenu.js"></script>
  <script src="assets/themes/js/app.min.js"></script>
  <script src="assets/themes/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/themes/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/themes/js/dashboard.js"></script>

  <!-- on va integrer le lien cdn de js  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <!-- on va personnaliser le toastr  -->
    <script>
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "timeOut": "5000"
      };

      // affichage du message 
      $(document).ready(function(){
        <?php 
            if(isset($_SESSION["toastr"])){
              $type = $_SESSION["toastr"]["type"];
              $message = $_SESSION["toastr"]["message"];

              echo "toastr.$type('$message');";
              unset($_SESSION["toastr"]);
            }
        ?>
      })
    </script>
</body>

</html>