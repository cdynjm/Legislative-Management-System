<!-- The Modal -->
<div class="modal fade" id="createSuggestModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Suggestion Box</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-category'></div>
                    <form id="submit-suggestion" action="">
                        @csrf
                        <p class="text-xs">Submit your ordinance/resolution suggestions here</p>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Name <span class="text-danger">(Optional)</span></label>
                                    <input id="name" name="name" class="form-control" type="text" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Suggestion <span class="text-danger">*</span></label>
                                    <textarea name="suggestion" id="" class="form-control" cols="30" rows="10" required></textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success"> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 