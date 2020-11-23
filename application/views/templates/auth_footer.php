<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/feather.min.js"></script>
<script>
  feather.replace();

  $(document).ready(function() {
    $("#check").on("click", function() {
      if ($(this).is(":checked")) {
        $("#password").attr("type", "text");
        $("#icon1").removeClass("d-none");
        $("#icon").addClass("d-none");
      } else {
        $("#password").attr("type", "password");
        $("#icon").removeClass("d-none");
        $("#icon1").addClass("d-none");
      }
    });

    $('.alert-pesan').alert().delay(3000).slideUp();
  });
</script>

</body>

</html>