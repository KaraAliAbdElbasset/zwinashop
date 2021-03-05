<footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Service Après Vente</h4>
          <ul>
           @if(config('settings.phone_1'))
               <li><i class="fa fa-phone"></i> <a href="tel:{{config('settings.phone_1')}}">{{config('settings.phone_1')}}</a></li>
            @endif
                @if(config('settings.phone_2'))
                  <li><i class="fa fa-phone"></i> <a href="tel:{{config('settings.phone_2')}}">{{config('settings.phone_2')}}</a></li><li></li>
                @endif
                @if(config('settings.fax'))
                  <li><i class="fa fa-phone"></i> <a href="tel:{{config('settings.fax')}}">{{config('settings.fax')}}</a></li>
                @endif
                 @if(config('settings.contact_email'))
                  <li><i class="fa fa-envelope"></i> <a href="mailto:{{config('settings.contact_email')}}">{{config('settings.contact_email')}}</a></li>
                @endif
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Liens Rapide</h4>
          <ul>
            <li><a href="{{route('shop')}}">Shop</a></li>
            <li><a href="{{route('shop')}}">Marques</a></li>
            <li><a href="{{route('shop')}}">Categories</a></li>
            <li><a href="{{route('shop')}}">en vedette</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Nouveautés</h4>
          <ul>
        <li><a href="{{route('shop')}}">Superbes Offres</a></li>
        </ul>
          <div class="form-wrap" >
            <form method="post" action="{{route('newsletter.store')}}"
              class="form-inline">
                @csrf
              <input class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Email '" required type="email" >
              <button class="click-btn btn btn-default" type="submit">Inscription</button>
              <div style="position: absolute; left: -5000px;">
                <input name="#" tabindex="-1" value="" type="text">
              </div>

              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="footer-bottom row align-items-center">
        <p class="footer-text m-0 col-lg-8 col-md-12">
Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="#" target="_blank"> DEVELOP/IT & R/EVOLUTION </a>
</p>
        <div class="col-lg-4 col-md-12 footer-social">
            @if(config('settings.social_facebook'))
                <a href="{{config('settings.social_facebook')}}"><i class="fa fa-facebook"></i></a>
            @endif
                @if(config('settings.social_instagram'))
                    <a href="{{config('settings.social_instagram')}}"><i class="fa fa-instagram"></i></a>
                @endif
                @if(config('settings.social_twitter'))
                    <a href="{{config('settings.social_twitter')}}"><i class="fa fa-twitter"></i></a>
                @endif
                @if(config('settings.social_linkedin'))
                    <a href="{{config('settings.social_linkedin')}}"><i class="fa fa-linkedin"></i></a>
                @endif
                @if(config('settings.social_youtube'))
                    <a href="{{config('settings.social_youtube')}}"><i class="fa fa-youtube"></i></a>
                @endif
        </div>
      </div>
    </div>
 
  </footer>

