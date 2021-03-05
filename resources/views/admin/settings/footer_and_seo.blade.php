<div class="tile">
    <form action="" method="POST" role="form">
        @csrf
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="footer_copyright_link">Footer Copyright Link</label>
                <input type="text"
                       id="footer_copyright_link"
                       class="form-control"
                       placeholder="Enter footer copyright link"
                       name="footer_copyright_link"
                       value="{{ config('settings.footer_copyright_link') }}">

            </div>
            <div class="form-group">
                <label class="control-label" for="footer_copyright_text">Footer Copyright Text</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter footer copyright text"
                    id="footer_copyright_text"
                    name="footer_copyright_text"
                >{{ config('settings.footer_copyright_text') }}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="seo_meta_title">SEO Meta Title</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter seo meta title for store"
                    id="seo_meta_title"
                    name="seo_meta_title"
                    value="{{ config('settings.seo_meta_title') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="seo_meta_description">SEO Meta Description</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter seo meta description for store"
                    id="seo_meta_description"
                    name="seo_meta_description"
                >{{ config('settings.seo_meta_description') }}</textarea>
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
