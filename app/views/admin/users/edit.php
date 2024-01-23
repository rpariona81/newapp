<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">General Elements</li>
                    </ol>
                </div>
                <h4 class="page-title">General Elements</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <h4 class="header-title mb-4">Input Types</h4>

                <div class="row">
                    <div class="col-xl-6">
                    <?= form_open('admin/users/update', array('id' => 'form_edit')); ?>
                    <input type="hidden" id="id" name="id" value="<?= $user->id ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" value="<?= $user->email ?>" name="email" id="email" placeholder="Enter email">
                                <small class="text-muted">We'll never share your email with anyone
                                    else.
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone mobile</label>
                                <input type="text" class="form-control"  value="<?= $user->mobile ?>" name="mobile" id="mobile" placeholder="Enter mobile">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Example select</label>
                                <?= form_dropdown('role_id', $roles, $user->role_id, array('class'=>'form-control input-sm', 'id'=>'role_id')); ?>
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect2">Example multiple select</label>
                                <select multiple class="form-control" id="exampleSelect2">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Example textarea</label>
                                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Example Readonly</label>
                                <input class="form-control" type="text" placeholder="Readonly input here…" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div><!-- end col -->

                    <div class="col-xl-6">
                        <form>
                            <fieldset disabled>
                                <div class="form-group">
                                    <label for="disabledTextInput">Disabled input</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                                </div>
                                <div class="form-group">
                                    <label for="disabledSelect">Disabled select menu</label>
                                    <select id="disabledSelect" class="form-control">
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                            </fieldset>

                            <div>
                                <label>Example Control sizing</label>
                                <input class="form-control form-control-lg mb-3" type="text" placeholder=".form-control-lg">
                                <input class="form-control mb-3" type="text" placeholder="Default input">
                                <input class="form-control form-control-sm mb-3" type="text" placeholder=".form-control-sm">

                                <div class="row">
                                    <div class="col-2">
                                        <input type="text" class="form-control mb-3" placeholder=".col-2">
                                    </div>
                                    <div class="col-3">
                                        <input type="text" class="form-control mb-3" placeholder=".col-3">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control mb-3" placeholder=".col-4">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label>Select menu</label>

                                <select class="custom-select mb-3">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                                <label> <i class="fa fa-star"></i> Checkboxes and Radios</label>

                                <div class="mt-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Check this custom checkbox</label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
                                    </div>
                                </div>

                            </div>
                        <?=form_close()?>
                    </div><!-- end col -->

                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>