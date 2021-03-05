<div class="tile">
    <form action="{{route('admin.settings.update')}}" method="POST" role="form">
        @csrf
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="social_facebook"><i class="fab fa-facebook-square mr-2"></i>Link To Facebook</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Lien Facebook"
                    id="social_facebook"
                    name="social_facebook"
                    value="{{ config('settings.social_facebook') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_twitter"><i class="fab fa-twitter-square mr-2"></i>Lien Twitter</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Lien Twitter"
                    id="social_twitter"
                    name="social_twitter"
                    value="{{ config('settings.social_twitter') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_instagram"><i class="fab fa-instagram mr-2"></i>Lien Instagram </label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Lien Instagram"
                    id="social_instagram"
                    name="social_instagram"
                    value="{{ config('settings.social_instagram') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_linkedin"><i class="fab fa-linkedin mr-2"></i>Lien LinkedIn </label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Lien LinkedIn"
                    id="social_linkedin"
                    name="social_linkedin"
                    value="{{ config('settings.social_linkedin') }}"
                />
            </div>

            <div class="form-group">
                <label class="control-label" for="social_youtube"><i class="fab fa-youtube mr-2"></i>Lien Youtube </label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Lien Youtube"
                    id="social_youtube"
                    name="social_youtube"
                    value="{{ config('settings.social_youtube') }}"
                />
            </div>
        </div>
        <hr>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-info" type="submit" style="min-width: 135px">Valider</button>
                </div>
            </div>
        </div>
    </form>
</div>
