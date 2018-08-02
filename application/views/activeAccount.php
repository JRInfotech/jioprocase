<div class="container-fluid">
    <div class="block-header">
        <h2><?=$title; ?></h2>
    </div>
    <!-- Body Copy -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Application Information 
                    </h2>   
                </div>
                <div class="body">
                    <p class="lead">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                    </p>
                    
                    <div class="form-group">
                        <input type="checkbox" name="checkbox" id="termsCheck">
                        <label for="termsCheck">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>
                    <a class="btn btn-block btn-lg bg-purple  waves-effect" id="active-account" onclick="return checkTerms()" href="<?=  base_url('ActiveAccount/activePlane')?>">ACTIVE ACCOUNT</a>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Body Copy -->
</div>