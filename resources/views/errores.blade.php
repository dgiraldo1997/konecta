@if($errors->any())
<div class="alert alert-danger alert-dismissible" role="alert" id='success-alert'>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <p><strong>Por favor corrige los errores:</strong></p>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<script>
    $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
    $("#success-alert").alert('close');
});
</script>