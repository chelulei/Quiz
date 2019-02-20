<form method="post" action="{{url('questions')}}" id="form">
@csrf
<!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">

                    <h5 class="modal-title">Uefa Champion League</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="category">Category:</label>
                            <input type="text" class="form-control" name="category" id="category">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="Title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="body">Explain Your Question:</label>
                            <input type="text" class="form-control" name="body" id="body">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  class="btn btn-success" id="ajaxSubmit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>