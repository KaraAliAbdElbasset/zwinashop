<div class="tile">
    <form action="{{route('admin.settings.update')}}" method="POST" role="form">
        @csrf
        <div class="tile-body">

            <div class="form-group">
                <label class="control-label" for="nis">NIS</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="NIS"
                    id="nis"
                    name="nis"
                    value="{{ config('settings.nis') }}"
                />
            </div>

            <div class="form-group">
                <label class="control-label" for="nif">NIF</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="nif"
                    id="nif"
                    name="nif"
                    value="{{ config('settings.nif') }}"
                />
            </div>

            <div class="form-group">
                <label class="control-label" for="account_number">account number</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="account number"
                    id="account_number"
                    name="account_number"
                    value="{{ config('account_number.account_number') }}"
                />
            </div>

            <div class="form-group">
                <label class="control-label" for="RC">RC</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="RC"
                    id="RC"
                    name="rc"
                    value="{{ config('settings.rc') }}"
                />
            </div>

            <hr>
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
