
<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; Intercore Solutions <a href="http://intercoresolutions.com.ng">James</a> </div>
</div>

<!--end-Footer-part-->

{{ Html::script('js/jquery.min.js') }}
{{ Html::script('js/bootstrap.min.js') }}
{{ Html::script('js/matrix.form_validation.js') }}
{{ Html::script('js/jquery.peity.min.js') }}
{{ Html::script('js/matrix.interface.js') }}
{{ Html::script('js/excanvas.min.js') }}
{{ Html::script('js/jquery.ui.custom.js') }}
{{ Html::script('js/jquery.validate.js') }}
{{ Html::script('js/jquery.dataTables.min.js') }}
{{ Html::script('js/jquery.wizard.js') }}
{{ Html::script('js/jquery.uniform.js') }}
{{ Html::script('js/jquery.toggle.buttons.js') }}
{{ Html::script('js/jquery.flot.min.js') }}
{{ Html::script('js/jquery.flot.resize.min.js') }}
{{ Html::script('js/jquery.gritter.min.js') }}
{{ Html::script('js/matrix.js') }}
{{ Html::script('js/matrix.dashboard.js') }}

{{ Html::script('js/select2.min.js') }}
{{ Html::script('js/matrix.popover.js') }}
{{ Html::script('js/bootstrap-colorpicker.js') }}
{{ Html::script('js/bootstrap-datepicker.js') }}
{{ Html::script('js/fullcalendar.min.js') }}
{{ Html::script('js/matrix.chat.js') }}
{{ Html::script('js/matrix.tables.js') }}


<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>
