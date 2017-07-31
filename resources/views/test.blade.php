<!DOCTYPE html>
<html>
<head>
    <title>PAKO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<br /><br />
<div class="container">
    <h3>
        <select name="brand" id="brand">
            <option value="">Show All Product</option>
            <option value="">Category 1</option>
            <option value="">Category 2</option>
        </select>
        <br /><br />
        <div class="row" id="show_product">

        </div>
    </h3>
</div>
</body>
</html>
<script>
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $('#brand').change(function(){
            var brand_id = $(this).val();
            $.ajax({
                url:"/test_ajax",
                method:"POST",
                data:{brand_id:brand_id},
                success:function(data){
                    $('#show_product').html(data);
                }
            });
        });
    });
</script>