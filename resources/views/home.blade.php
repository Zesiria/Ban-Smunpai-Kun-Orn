@extends('layouts.main')

@section('content')
    {{-- <div class="flex mt-10">
        <div>
            @include('layouts.service')
            @include('layouts.service')
            @include('layouts.service')
        </div>

        @include('layouts.location')
    </div> --}}

    <div>
        <div class="text-center text-6xl font-bold text-[#483838] m-20 uppercase space-y-10">
            <h1>ยินดีต้อนรับเข้าสู่เว็บไซต์</h1>
            <h1>บ้านสมุนไพรเพื่อสุขภาพ</h1>
        </div>
        <div class="text-center text-4xl font-bold text-[#483838] m-20 uppercase">
            <h1>เราบริการทุกท่านด้วยหัวใจ</h1>
        </div>
    </div>
    @if(!(Session::get('role_user') == 'Manager'))
    <div class="flex justify-center">
        <button onclick="{{ redirect('order') }}" class="bookNowButton m-10">
            <a href="order"><p class="m-4 font-semibold text-white mr-20 ml-20">จองคิว</p></a>
            
        </button>
    </div>
    @endif
    <div class="grid grid-cols-2 m-20">
        <div class="m-8">
            <h1 class="text-4xl font-semibold text-[#483838]">พบกับบริการของเรา</h1>
            <h2 class="text-[#483838]">การนวดแผนไทยมีประเพณีเก่าแก่หลายศตวรรษที่คุณควรจะสัมผัสเช่นกัน</h2>
            <p class="text-[#483838]">ไม่มีการมาเยือนประเทศไทยโดยไม่ได้เพลิดเพลินกับการนวดผ่อนคลาย กักตัวอยู่บ้าน ติดต่อเรา แล้วเราจะเอาบริการนวดมาให้คุณ เรามีบริการนวดในห้องพักหรือคอนโดของคุณอย่างสะดวกสบาย การสั่งซื้อการนวดแผนไทยไปที่ห้องของคุณมีข้อดีหลายประการ หลังการนวด คุณจะหลับและรู้สึกถึงสภาวะที่ผ่อนคลายของร่างกาย</p>
            <p class="text-[#483838]">กำลังมองหาร้านนวดที่ดีและราคาเป็นมิตร? เรามีทางออกสำหรับคุณ ให้การนวดมากับคุณ โดยผู้ที่มีประสบการณ์การนวดอย่างดี</p>
        </div>
        <div class="flex space-x-10">
            <div class="rectangleBox mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#FFFFFF" class="m-12 bi bi-line" viewBox="0 0 16 16">
                    <path d="M8 0c4.411 0 8 2.912 8 6.492 0 1.433-.555 2.723-1.715 3.994-1.678 1.932-5.431 4.285-6.285 4.645-.83.35-.734-.197-.696-.413l.003-.018.114-.685c.027-.204.055-.521-.026-.723-.09-.223-.444-.339-.704-.395C2.846 12.39 0 9.701 0 6.492 0 2.912 3.59 0 8 0ZM5.022 7.686H3.497V4.918a.156.156 0 0 0-.155-.156H2.78a.156.156 0 0 0-.156.156v3.486c0 .041.017.08.044.107v.001l.002.002.002.002a.154.154 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157Zm.791-2.924a.156.156 0 0 0-.156.156v3.486c0 .086.07.155.156.155h.562c.086 0 .155-.07.155-.155V4.918a.156.156 0 0 0-.155-.156h-.562Zm3.863 0a.156.156 0 0 0-.156.156v2.07L7.923 4.832a.17.17 0 0 0-.013-.015v-.001a.139.139 0 0 0-.01-.01l-.003-.003a.092.092 0 0 0-.011-.009h-.001L7.88 4.79l-.003-.002a.029.029 0 0 0-.005-.003l-.008-.005h-.002l-.003-.002-.01-.004-.004-.002a.093.093 0 0 0-.01-.003h-.002l-.003-.001-.009-.002h-.006l-.003-.001h-.004l-.002-.001h-.574a.156.156 0 0 0-.156.155v3.486c0 .086.07.155.156.155h.56c.087 0 .157-.07.157-.155v-2.07l1.6 2.16a.154.154 0 0 0 .039.038l.001.001.01.006.004.002a.066.066 0 0 0 .008.004l.007.003.005.002a.168.168 0 0 0 .01.003h.003a.155.155 0 0 0 .04.006h.56c.087 0 .157-.07.157-.155V4.918a.156.156 0 0 0-.156-.156h-.561Zm3.815.717v-.56a.156.156 0 0 0-.155-.157h-2.242a.155.155 0 0 0-.108.044h-.001l-.001.002-.002.003a.155.155 0 0 0-.044.107v3.486c0 .041.017.08.044.107l.002.003.002.002a.155.155 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156Z"/>
                </svg>
                <div class="space-y-2.5">
                    <h1 class="font-bold text-center text-[#483838]">LINE</h1>
                    <h1 class="font-bold text-center text-white">0912171407</h1>
                </div>
            </div>
            <div class="rectangleBox">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#FFFFFF" class="m-12 bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
                <div class="space-y-2.5">
                    <h1 class="font-bold text-center text-[#483838]">FACEBOOK</h1>
                    <h1 class="font-bold text-center text-white">บ้านสมุนไพร</h1>
                </div>
            </div>
            <div class="rectangleBox">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#FFFFFF" class="m-12 bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                </svg>
                <div class="space-y-2.5">
                    <h1 class="font-bold text-center text-[#483838]">EMAIL</h1>
                    <h1 class="font-bold text-center text-white">munpai@gmail.com</h1>
                </div>

            </div>
        </div>
    </div>

    <div>
        <div class="flex justify-center">
            <h1 class="text-4xl font-semibold m-10 text-[#483838]">อัตราค่าบริการ</h1>
        </div>
        <div class="grid grid-cols-3 justify-content-center text-[#483838] text-center">
            <div>
                <h1 class="">การอยู่ไฟหญิงหลังคลอด</h1>
                <li>3 วัน. – ฿ 5000</li>
            </div>
            <div>
                <h1 class="">การนวดสมุนไพร</h1>
                <li>60 min. – ฿ 2000</li>
            </div>
            <div>
                <h1 class="">นวดหน้าเด้ง</h1>
                <li>45 min. – ฿ 1000</li>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 m-20">
        <div class="space-y-5">
            <h1 class="font-semibold text-4xl text-[#483838]">นักบำบัดที่มีประสบการณ์</h1>
            <p class="text-[#483838]">เลือกนักบำบัดของเราและจองบริการนวดเพื่อสุขภาพที่ดีของตัวคุณ การนวดด้วยใจของเราจะโน้มน้าวใจคุณ</p>
        </div>
        <div class="flex justify-center">
            <img class="imgPost" src="/images/wait.jpeg" alt="Miracle Work" height="" width="300">
        </div>
    </div>


        {{-- <div class="rectangle"></div>    --}}

@endsection
