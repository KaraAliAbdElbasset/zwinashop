<div class="tile">
    <form action="" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="tile-body">
            <div class="row align-items-center">
                <div class="col-md-1">
                    @if (config('settings.site_logo') != null)
                        <img src="{{ asset('storage/'.config('settings.site_logo')) }}" id="logoImg" style="width: 100%; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="logoImg" style="width: 100%; height: auto;">
                    @endif
                </div>
                <div class="col-md-11 custom-file">
                    <div class="form-group">
                        <label class="control-label custom-file-label">Logo du site</label>
                        <input class="form-control custom-file-input" type="file" name="site_logo" id="logo"/>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-4">
                <div class="col-md-1">
                    @if (config('settings.site_favicon') != null)
                        <img src="{{ asset('storage/'.config('settings.site_favicon')) }}" id="faviconImg" style="width: 100%; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg" style="width: 100%; height: auto;">
                    @endif
                </div>
                <div class="col-md-11 custom-file">
                    <div class="form-group ">
                        <label class="control-label custom-file-label">Site Favicon</label>
                        <input class="form-control custom-file-input" type="file" name="site_favicon" id="favicon"/>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-info" type="submit" style="min-width: 135px">Mettre à jour</button>
                </div>
            </div>
        </div>
    </form>
</div>

