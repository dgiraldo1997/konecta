@if($errors->any())<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <ul>
        @foreach($errors->all() as $error)
        <li style='font-size:1.5em;'>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif