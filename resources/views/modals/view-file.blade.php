<!-- The Modal -->
<div class="modal fade" id="viewfileModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Ordinance</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    
                   
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category" class="form-label">Category/Folder <span class="text-danger"></span></label>
                                    @if(Request::is('file-manager'))
                                    @if($folderid != 0)
                                        <input id="category" name="category" class="form-control bg-white" type="text" value="{{ $foldername }}" readonly required>
                                    @endif
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Municipal Status <span class="text-danger"></span></label>
                                    <select id="view-status" name="status" class="form-control bg-white" type="text"  disabled>
                                        <option value=""></option>
                                        <option value="0">Draft Ordinance</option>
                                        <option value="1">Approved</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Provincial Status <span class="text-danger"></span></label>
                                    <select id="view-pro-status" name="status_sp" class="form-control bg-white" type="text" disabled>
                                        <option value=""></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Disapproved</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ordinance" class="form-label">Title of Ordinance <span class="text-danger"></span></label>
                                    <textarea id="view-ordinance" name="ordinance_title" class="form-control bg-white" cols="30" rows="5" disabled></textarea>
                                </div>
                            
                                <div class="form-group">
                                    <label for="author" class="form-label">Author <span class="text-danger"></span></label>
                                    <select id="view-author" name="author" class="form-control bg-white" type="text"  disabled>
                                        <option value=''></option>
                                        @if(Request::is('file-manager'))
                                        @if($folderid != 0)
                                        @foreach ($authors as $auth)
                                            <option value='{{ $auth->id }}'>{{ $auth->name }}</option>
                                        @endforeach
                                        @endif
                                        @else
                                        @foreach ($authors as $auth)
                                            <option value='{{ $auth->id }}'>{{ $auth->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group" style="display: none;">
                                    <label for="coauthor" class="form-label">Co-Author <span class="text-danger">(Optional)</span></label>
                                    <select id="view-coauthor" name="co_author" class="form-control bg-white" type="text" disabled>
                                        <option value=''></option>
                                        @if(Request::is('file-manager'))
                                        @if($folderid != 0)
                                        @foreach ($authors as $auth)
                                            <option value='{{ $auth->id }}'>{{ $auth->name }}</option>
                                        @endforeach
                                        @endif
                                        @else
                                        @foreach ($authors as $auth)
                                            <option value='{{ $auth->id }}'>{{ $auth->name }}</option>
                                        @endforeach
                                        @endif
                                        
                                    </select>
                                </div>

                                <div id="view-coauthors-container">
                                    <!-- Existing co-author field -->
                                    <div class="form-group">
                                        <label for="coauthor" class="form-label">Co-Authors <span class="text-danger"></span></label>
                                        
                                    </div>
                                </div>

                                <p>Readings</p>

                                <div class="form-group">
                                    <label for="" class="form-label">First <span class="text-danger"></span></label>
                                    <input id="view-first" name="first" class="form-control bg-white" type="text" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Second <span class="text-danger"></span></label>
                                    <input id="view-second" name="second" class="form-control bg-white" type="text" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Third <span class="text-danger"></span></label>
                                    <input id="view-third" name="third" class="form-control bg-white" type="text" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="ordinancenumber" class="form-label">Ordinance Number <span class="text-danger"></span></label>
                                    <input id="view-ordinance-number" name="ordinance_number" class="form-control bg-white" type="text" disabled>
                                </div>

                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="" class="form-label">Final Title (As Enacted) <span class="text-danger"></span></label>
                                    <textarea id="view-final" name="final_title" class="form-control bg-white" cols="30" rows="5" disabled></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Enactment Date <span class="text-danger"></span></label>
                                    <input id="view-enactment" name="enactment_date" class="form-control bg-white" type="text" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">LCE Approval <span class="text-danger"></span></label>
                                    <input id="view-lce" name="lce_approval" class="form-control bg-white" type="text" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Transmittal SP for Review <span class="text-danger"></span></label>
                                    <input id="view-transmittal" name="transmittal" class="form-control bg-white" type="text" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">SP-SL Review/Approval <span class="text-danger"></span></label>
                                    <input id="view-sp" name="sp_sl" class="form-control bg-white" type="text" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Posting and Publications <span class="text-danger"></span></label>
                                    <p class="ms-1 text-xs my-0 mb-2">Post Status</p>
                                    <select name="posted" id="view-posted" class="form-control bg-white mb-3" disabled>
                                        <option value="">Not Yet</option>
                                        <option value="1">Posted</option>
                                    </select>
                                    <p class="ms-1 text-xs my-0 mb-2">Publish Status</p>
                                    <select name="published" id="view-published" class="form-control bg-white" disabled>
                                        <option value="">Not Yet</option>
                                        <option value="1">Published</option>
                                    </select>
                                </div>

                             
                               
                            </div>
                            
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div> 