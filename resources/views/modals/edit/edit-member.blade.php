<!-- The Modal -->
<div class="modal fade" id="editmemberModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Official</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processingmember'></div>
                    <form id="editmember" action="" enctype="multipart/form-data">
                        @csrf
                        <input name="memberid" id="memberid" type="hidden" class="form-control">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit-name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input id="edit-name" name="name" class="form-control" type="text" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="edit-birthdate" class="form-label">Birthdate <span class="text-danger">*</span></label>
                                    <input id="edit-birthdate" name="birthdate" class="form-control" type="date" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="edit-address" class="form-label">Address <span class="text-danger">*</span></label>
                                    <input id="edit-address" name="address" class="form-control" type="text" placeholder="" required>
                                </div>
                               
                                <div class="form-group">
                                    <label for="edit-civil" class="form-label">Civil Status <span class="text-danger">*</span></label>
                                    <select class="form-control" name="civil" id="edit-civil">
                                        <option value="Single">Single</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Married">Married</option>
                                        <option value="Separated">Separated</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="edit-position" class="form-label">Position <span class="text-danger">*</span></label>
                                    <select name="position" id="edit-position" class="form-control" required>
                                        <option value=""></option>
                                        <option value="1">Mayor</option>
                                        <option value="2">Vice Mayor</option>
                                        <option value="3">SB Member</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="edit-gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender" id="edit-gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="LGBTQIA+">LGBTQIA+</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="edit-status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" name="status" id="edit-status">
                                        <option value='1'>Active</option>
                                        <option value='0'>Inactive</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="edit-mail" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input id="edit-email" name="email" class="form-control" type="text" placeholder="" required>
                                </div>

                                <div class="form-group">
                                    <label for="edit-password" class="form-label">Chnage New Password <span class="text-danger">*</span></label>
                                    <input id="edit-password" name="password" class="form-control" type="text" placeholder="">
                                </div>
                               

                                <div class="form-group">
                                    <label for="edit-photo" class="form-label">Old Photo <span class="text-danger"></span></label>
                                    <input id="edit-photo" name="oldphoto" class="form-control" type="text" placeholder="" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="photo" class="form-label">Upload New Photo <span class="text-danger">*</span></label>
                                    <input id="photo" name="photo" class="form-control" type="file" >
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