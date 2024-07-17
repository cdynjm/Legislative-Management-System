<!-- The Modal -->
<div class="modal fade" id="createfileModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New File</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-file'></div>
                    <form id="registerfile" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input name="parent_id" class="form-control" type="hidden" placeholder="" value='{{ $folderid }}' required>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category" class="form-label">Category/Type of Ordinance <span class="text-danger">*</span></label>
                                    @if($folderid != 0)
                                        <input id="category" name="category" class="form-control" type="text" value="{{ $foldername }}" readonly required>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Municipal Status <span class="text-danger">*</span></label>
                                    <select id="" name="status" class="form-control" type="text"  required>
                                        <option value=""></option>
                                        <option value="0">Draft Ordinance</option>
                                        <option value="1">Approved</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ordinance" class="form-label">Title of Ordinance <span class="text-danger">*</span></label>
                                    <textarea id="ordinance" name="ordinance_title" class="form-control" cols="30" rows="5" required></textarea>
                                </div>
                            
                                <div class="form-group">
                                    <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                                    <select id="author" name="author" class="form-control" type="text"  required>
                                        <option value=''></option>
                                        @if($folderid != 0)
                                        @foreach ($authors as $auth)
                                            <option value='{{ $auth->id }}'>{{ $auth->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                            
                                <div id="coauthors-container">
                                    <!-- Existing co-author field -->
                                    <div class="form-group">
                                        <label for="coauthor" class="form-label">Co-Author <span class="text-danger"></span></label>
                                        <select id="coauthor" name="co_author[]" class="form-control">
                                            <option value=''></option>
                                            @if($folderid != 0)
                                            @foreach ($authors as $auth)
                                            <option value='{{ $auth->id }}'>{{ $auth->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                                <button id="add-coauthor-btn" type="button" class="btn btn-sm bg-gradient-info text-capitalize">Add More Co-Author</button>

                                <div class="form-group">
                                    <label for="file" class="form-label">Upload File <span class="text-danger">*</span></label>
                                    <input id="file" name="file" class="form-control" type="file"  required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success"> Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 

<script>
    document.getElementById("add-coauthor-btn").addEventListener("click", function() {
        var container = document.getElementById("coauthors-container");
        var clone = container.firstElementChild.cloneNode(true);
        container.appendChild(clone);
    });
</script>