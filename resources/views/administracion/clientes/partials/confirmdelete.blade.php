<div class="modal fade" id="confirmdelete" tabindex="-1" role="dialog" aria-labelledby="sinpermisosLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading"><h4><span style='color:#a94442;'class="glyphicon glyphicon-trash"></span> Eliminar Clientes<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4></div>
                    <div class="panel-body text-center">
                        <h4>¿Está seguro que desea eliminar el cliente?</h4>
                        
                        {!! Form::open(['route'=>['administracion.clientes.destroy'],'method'=>'DELETE']) !!}
                        <div class="modal-body"><input type="hidden" name="id"></div>
                        <table align='center'>
                            <tr>
                                <td>

                                    <button type='submit' class='btn btn-danger'>Eliminar</button>
                                    {!! Form::close() !!}
                                </td>
                                <td style='padding-left:4px;'>
                                    <a title='Cancelar' data-dismiss="modal" class='btn btn-primary'>Cancelar</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#confirmdelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('id'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        //modal.find('.modal-title').text('New message to ' + recipient);
        modal.find('.modal-body input').val(recipient);
    });
</script>