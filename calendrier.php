<script type="text/javascript">
$(document).ready(){
$( "#datepicker" ).datepicker({
    altField: "#datepicker",
    closeText: 'Fermer',
    firstDay: 1 ,
    dateFormat: 'yy-mm-dd'
    });$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] ); // texte en french marche pas
});
  
         
</script>