 <!-- Jquery Core Js -->
    <script src="<?=  base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=  base_url()?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?=  base_url()?>assets/plugins/morrisjs/morris.js"></script>

<!-- Moment Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/momentjs/moment.js"></script>
    <!-- Sparkline Chart Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?=  base_url()?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
       
    <!-- Custom Js -->
    <script src="<?=  base_url()?>assets/js/admin.js"></script>
    <script src="<?=  base_url()?>assets/js/notifications.js"></script>
    <script type="text/javascript">
    $(function () {
        $('.datetimepicker').bootstrapMaterialDatePicker({
            format: 'dddd DD MMMM YYYY - HH:mm',
            clearButton: true,
            weekStart: 1
        });
    });
    function checkTerms(){
        if($('#termsCheck').prop( "checked" ) == false){
            showNotification('alert-danger', 'Please Select Terms condition.', 'top', 'center', '', '');
            return false
        }
        return true;
    }
    </script>