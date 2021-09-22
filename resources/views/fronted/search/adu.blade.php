<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<style>

</style>
<div class="container">
  <!-- Button to Open the Modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
</button> --}}
@if($solan > 0)
<a href="" data-toggle="modal" data-target="#myModal"><img src="././public/img/gift.jpg" alt="">
</a>
@else
<a href="" onclick="alert('bạn không còn lượt')" ><img src="././public/img/gift.jpg" alt="">
</a>
@endif
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Mã giảm giá</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <h2>Mã: {{$vc->cp_code}}</h2>
            <h2>Giảm: {{$vc->cp_condition * 100 .'%'}}</h2>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="clicka" >Đóng</button>
        </div>

      </div>
    </div>
  </div>

</div>

</body>

</html>

<script type="text/javascript">
$(document).ready(function() {
    $('#clicka').on('click', function(){
        window.location.reload();
    });
});
</script>
