<section class="bg0 p-t-104 p-b-116">

    <div class="container">

        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form wire:submit.prevent="sendEmail" method="post">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Send Us A Message
                    </h4>

                @if(session()->has('success'))
                    <div class="alert alert-success text-center">{{session('success')}}</div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger text-center">{{session('error')}}</div>
                    @endif
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30  " type="text" wire:model="email" placeholder="Your Email Address">

                        <img class="how-pos4 pointer-none" src="{{asset('assets/site/images/icons/icon-email.png')}}" alt="ICON">
                    </div>
                    @error('email')
                    <div class="text-danger  m-b-20 how-pos4-parent">{{$message}}</div>
                    @enderror
                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25 "  wire:model="message" placeholder="How Can We Help?"></textarea>

                    </div>
                    @error('message')
                    <div class="text-danger  m-b-20 how-pos4-parent">{{$message}}</div>
                    @enderror


                    <button type="submit"   class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        <span wire:loading.remove wire:target="sendEmail">Submit</span>
                        <span wire:loading.flex wire:target="sendEmail"> ... </span>

                    </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

                    <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            Zwina Store ,Constantine
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

                    <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Contactez Nous
							</span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            +213 54432 34 34
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

                    <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Service après Vente
							</span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            contact@ZwinaStore.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
