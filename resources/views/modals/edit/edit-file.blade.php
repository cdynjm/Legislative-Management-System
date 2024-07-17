<!-- The Modal -->
<div class="modal fade" id="editfileModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit File</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processingfile'></div>
                    <form id="editfile" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input name="file_id" id="fileid" class="form-control" type="hidden" placeholder="" value='' required>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category" class="form-label">Category/Folder <span class="text-danger">*</span></label>
                                    @if($folderid != 0)
                                        <input id="category" name="category" class="form-control" type="text" value="{{ $foldername }}" readonly required>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Municipal Status <span class="text-danger">*</span></label>
                                    <select id="edit-status" name="status" class="form-control" type="text"  required>
                                        <option value=""></option>
                                        <option value="0">Draft Ordinance</option>
                                        <option value="1">Approved</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Provincial Status <span class="text-danger"></span></label>
                                    <select id="edit-pro-status" name="status_sp" class="form-control" type="text">
                                        <option value=""></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Disapproved</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ordinance" class="form-label">Title of Ordinance <span class="text-danger">*</span></label>
                                    <textarea id="edit-ordinance" name="ordinance_title" class="form-control" cols="30" rows="5" required></textarea>
                                </div>
                            
                                <div class="form-group">
                                    <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                                    <select id="edit-author" name="author" class="form-control" type="text"  required>
                                        <option value=''></option>
                                        @if($folderid != 0)
                                        @foreach ($authors as $auth)
                                            <option value='{{ $auth->id }}'>{{ $auth->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div id="edit-coauthors-container">
                                    <!-- Existing co-author field -->
                                    <div class="form-group">
                                        <label for="coauthor" class="form-label">Co-Author <span class="text-danger"></span></label>
                                        <select id="coauthor" name="co_author[]" class="form-control">
                                            <option value=''>Select...</option>
                                            @if($folderid != 0)
                                            @foreach ($authors as $auth)
                                                <option value='{{ $auth->id }}'>{{ $auth->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                                <button id="edit-add-coauthor-btn" type="button" class="btn btn-sm bg-gradient-info text-capitalize">Add More Co-Author</button>

                                <p>Readings</p>

                                <div class="form-group">
                                    <label for="" class="form-label">First <span class="text-danger"></span></label>
                                    <input id="edit-first" name="first" class="form-control" type="date">
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Second <span class="text-danger"></span></label>
                                    <input id="edit-second" name="second" class="form-control" type="date">
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Third <span class="text-danger"></span></label>
                                    <input id="edit-third" name="third" class="form-control" type="date">
                                </div>

                                <div class="form-group">
                                    <label for="ordinancenumber" class="form-label">Ordinance Number <span class="text-danger"></span></label>
                                    <input id="edit-ordinance-number" name="ordinance_number" class="form-control" type="text">
                                </div>

                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="" class="form-label">Final Title (As Enacted) <span class="text-danger"></span></label>
                                    <textarea id="edit-final" name="final_title" class="form-control" cols="30" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Enactment Date <span class="text-danger"></span></label>
                                    <input id="edit-enactment" name="enactment_date" class="form-control" type="date">
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">LCE Approval <span class="text-danger"></span></label>
                                    <input id="edit-lce" name="lce_approval" class="form-control" type="date">
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Transmittal SP for Review <span class="text-danger"></span></label>
                                    <input id="edit-transmittal" name="transmittal" class="form-control" type="date">
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">SP-SL Review/Approval <span class="text-danger"></span></label>
                                    <input id="edit-sp" name="sp_sl" class="form-control" type="date">
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Posting and Publications <span class="text-danger"></span></label>
                                    <p class="ms-1 text-xs my-0 mb-2">Post Status</p>
                                    <select name="posted" id="edit-posted" class="form-control mb-3">
                                        <option value="">Not Yet</option>
                                        <option value="1">Posted</option>
                                    </select>
                                    <p class="ms-1 text-xs my-0 mb-2">Publish Status</p>
                                    <select name="published" id="edit-published" class="form-control">
                                        <option value="">Not Yet</option>
                                        <option value="1">Published</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="oldfile" class="form-label">Old File <span class="text-danger"></span></label>
                                    <input id="oldfile" name="oldfile" class="form-control" type="text" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="file" class="form-label">Upload New File <span class="text-danger"></span></label>
                                    <input id="file" name="file" class="form-control" type="file">
                                </div>
                               
                            </div>
                            
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success"> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 

<script>
    document.getElementById("edit-add-coauthor-btn").addEventListener("click", function() {
        var container = document.getElementById("edit-coauthors-container");
        var clone = container.firstElementChild.cloneNode(true);
        container.appendChild(clone);
    });
</script>