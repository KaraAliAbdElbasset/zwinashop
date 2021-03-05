<div class="tile">
    <form action="{{route('admin.settings.update')}}" method="POST" role="form">
        @csrf
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="address"><i class="fas fa-map-marker-alt mr-2"></i>Addresse</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Addresse"
                    id="address"
                    name="address"
                >{!! Config::get('settings.address') !!}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="phone"><i class="fas fa-mobile-alt mr-2"></i>numéro de téléphone</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="numéro de téléphone"
                    id="phone"
                    name="phone_1"
                    value="{{ config('settings.phone_1') }}"
                />
            </div>

            <div class="form-group">
                <label class="control-label" for="phone"><i class="fas fa-mobile-alt mr-2"></i>numéro de téléphone 2</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="numéro de téléphone"
                    id="phone"
                    name="phone_2"
                    value="{{ config('settings.phone_2') }}"
                />
            </div>

            <div class="form-group">
                <label class="control-label" for="fax"><i class="fas fa-phone-alt mr-2"></i>numéro de téléphone 3</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="numéro de téléphone"
                    id="fax"
                    name="fax"
                    value="{{ config('settings.fax') }}"
                />
            </div>


            <div class="form-group">
                <label class="control-label" for="city"><i class="fas fa-envelope mr-2"></i>Ville</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Ville"
                    id="city"
                    name="city"
                    value="{{ config('settings.city') }}"
                />
            </div>

            <div class="form-group">
                <label class="control-label" for="zip_code"><i class="fas fa-envelope mr-2"></i>Code postal</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Code postal"
                    id="zip_code"
                    name="zip_code"
                    value="{{ config('settings.zip_code') }}"
                />
            </div>

            <div class="form-group">
                <label class="control-label" for="country"><i class="fas fa-envelope mr-2"></i>Pays</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Pays"
                    id="country"
                    name="country"
                    value="{{ config('settings.country') }}"
                />
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
