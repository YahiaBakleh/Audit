<!-- Vendor -->
<script src="/assets/vendor/jquery/jquery.js"></script>
<script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<script src="/assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/assets/javascripts/theme.init.js"></script>


<script src="/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>

<script src="/assets/sweetalert2/dist/sweetalert2.min.js"></script>

<script src="/assets/vendor/jquery-autosize/jquery.autosize.js"></script>
<script src="/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<!-- Vendor -->






<script type="text/javascript">

</script>

<script type="text/javascript">

    function triggerDeleteAlert(val) {
        Swal.fire({
            title: 'Are you sure ?',
            type: 'warning',
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            preConfirm: () => {
                $("#submiter"+val).submit();
            }
        })
    }
</script>
<script>
// //old toolbar for textarea editor

    tinymce.init({
        selector: 'textarea',
        height: 200,
        menubar: false,
         plugins: [
             'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
             'insertdatetime media table paste code help wordcount'
         ],
        toolbar: 'undo redo | formatselect | bold italic| fontsizeselect  fontselect| backcolor  forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | bullist numlist outdent indent | link image |help ',
      
    //   plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    //   toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        
        fontsize_formats: "8px 10px 12px 14px 18px 20px 24px 36px 40px",
        theme_advanced_fonts : "Andale Mono=andale mono,times;"+
            "Arial=arial,helvetica,sans-serif;"+
            "Arial Black=arial black,avant garde;"+
            "Book Antiqua=book antiqua,palatino;"+
            "Comic Sans MS=comic sans ms,sans-serif;"+
            "Courier New=courier new,courier;"+
            "Georgia=georgia,palatino;"+
            "Helvetica=helvetica;"+
            "Impact=impact,chicago;"+
            "Symbol=symbol;"+
            "Tahoma=tahoma,arial,helvetica,sans-serif;"+
            "Terminal=terminal,monaco;"+
            "Times New Roman=times new roman,times;"+
            "Trebuchet MS=trebuchet ms,geneva;"+
            "Verdana=verdana,geneva;"+
            "Webdings=webdings;"+
            "Wingdings=wingdings,zapf dingbats",
    });
    
    
</script>
<script>
    // tinymce.init({
    //   selector: 'textarea',
    //   plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    //   toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    //  });
</script>
