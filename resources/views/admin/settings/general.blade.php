<div class="tile">
    <form action="{{route('admin.settings.update')}}" method="POST" role="form">
        @csrf
        <div class="">
            <div class="form-group">
                <label class="control-label" for="site_name"><i class="fas fa-globe-africa mr-2"></i>Nom du site web</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Nom du site web"
                    id="site_name"
                    name="site_name"
                    value="{{ config('settings.site_name') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="contact_email"><i class="fas fa-envelope mr-2"></i>E-mail de Contact</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="E-mail deContact"
                    id="contact_email"
                    name="contact_email"
                    value="{{ config('settings.contact_email') }}"
                />

            </div>
            <div class="form-group">
                <label class="control-label" for="contact_email"><i class="fas fa-envelope mr-2"></i>E-mail par defaut</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="E-mail par defaut"
                    id="default_email_address"
                    name="default_email_address"
                    value="{{ config('settings.default_email_address') }}"
                />

            </div>
            <div class="form-group">
                <label class="control-label" for="currency_code"><i class="fas fa-dollar-sign mr-2"></i>Devise de payement</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Devise de payement"
                    id="currency_code"
                    name="currency_code"
                    value="{{ config('settings.currency_code') }}"
                />
            </div>
        </div>
        <hr>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-info" type="submit" style="min-width: 135px">Modifier</button>
                </div>
            </div>
        </div>
    </form>

</div>
