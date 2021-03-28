<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div>
                        <label for="pic">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="pic" accept="image/*">
                        @error('image')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="text-center my-2">
                        <img class="img-thumbnail img-fluid" id="pic_preview"
                             src="{{$c->image_url}}" width="150px" height="150px"
                             alt="Brand picture">
                    </div>
                </div>
                <div class="form-group">
                    <label for="state">State </label>
                    <input type="checkbox" name="state" id="state" {{$c->state ? 'checked' : ''}} value="on"  data-bootstrap-switch>
                    @error('state')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <a href="{{route('admin.carousel.index')}}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="submit" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
