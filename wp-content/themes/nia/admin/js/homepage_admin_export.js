jQuery(document).ready(function () {

 $("input[name=btnExport]").click(function () {
      //window.location = '?page=request_data&task=export_request_data';
	  //alert("Hiaaa");
      document.location.href =the_ajax_script.ajaxurl+"?action=export_csv_request";
  });
     
});