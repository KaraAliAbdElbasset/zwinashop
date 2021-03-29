<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <select name="attribute_id" class="form-control @error('attribute_id') is-invalid @enderror" id="atts">
                        @foreach($atts as $a)
                            <option value="{{$a->id}}" {{$a->id === $attribute->attribute_id ? 'selected' : ''}}>{{$a->name}}</option>
                        @endforeach
                    </select>
                    @error('attribute_id')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label " for="name">value</label>
                    <input
                        class="form-control @error("name") is-invalid @enderror"
                        type="text"
                        placeholder="name"
                        id="name"
                        name="name"
                        value="{{ $attribute->name }}"
                    />
                    @error("name")
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <a href="{{route('admin.attributes.index')}}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="submit" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
