<header id="page-topbar">
    <div
        style="width: 100%;height: 12vh;display: flex;justify-content: center;align-items: center;background-color: black;">
        <div
            style="clip-path: polygon(0 0, 100% 0, 88% 100%, 11% 100%);width:50%;height:12vh;background-color:#222222;display: flex;justify-content: center;align-items: center; ">
            <div style="width: 70%;height: 12vh;">
                <div class="row">
                    <div class="col col-lg-4"
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;height: 100px;text-align: center;">
                        {{-- <img src="{{ asset('property/arwics.png') }}" alt=""> --}}
                        <h1 style="color:blue">LOGO ARWICS</h1>
                    </div>
                    <div class="col col-lg-4"
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;flex-direction: column;">
                       <div class="row">

                            @php
                            $tanggal = mktime(date('m'), date("d"), date('Y'));
                            @endphp
                           <h6> {{ \Carbon\Carbon::parse($tanggal)->isoFormat('dddd, D MMMM Y') }}</h6>
                       </div>
                       <div class="row">
                        <h3 class="jam"></h3>
                    </div>
                    </div>
                    @if(session('logo_asuransi'))
                    <div class="col col-lg-4"
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;">
                        <img src="{{ asset('property/', session()->get('logo_asuransi')) }}" alt="">
                    </div>
                    @else

                    <div class="col col-lg-4"
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;">
                        {{-- <img src="{{ asset('property/car.png') }}" alt=""> --}}
                        <h1 style="color:blue">LOGO CAR</h1>
                    </div>

                    @endif
                </div>

            </div>
        </div>
    </div>


</header>
