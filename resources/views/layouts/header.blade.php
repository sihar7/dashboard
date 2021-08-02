<header id="page-topbar">
    <div
        style="width: 100%;height: 12vh;display: flex;justify-content: center;align-items: center;background-color: black;">
        <div
            style="clip-path: polygon(0 0, 100% 0, 88% 100%, 11% 100%);width:50%;height:12vh;background-color:#222222;display: flex;justify-content: center;align-items: center; ">
            <div style="width: 70%;height: 12vh;">
                <div class="row">
                    <div class="col col-lg-4"
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;height: 100px;text-align: center;">
                        <img src="{{ asset('property/arwics.png') }}" alt="">
                    </div>
                    <div class="col col-lg-4"
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;flex-direction: column;">
                       <div class="row">
                           <h6>Thuesday, 18 july 2021</h6>
                       </div>
                       <div class="row">
                        <h3>12 : 12 : 12</h3>
                    </div>
                    </div>
                    @if(session('logo_asuransi'))
                    <div class="col col-lg-4"
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;">
                        <img src="{{ asset('property/', session()->get('nama_asuransi')) }}" alt="">
                    </div>
                    @else

                    <div class="col col-lg-4"
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;">
                        <img src="{{ asset('property/car.png') }}" alt="">
                    </div>

                    @endif
                </div>

            </div>
        </div>
    </div>


</header>
