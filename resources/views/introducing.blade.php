@extends('layouts.app')

@section('content')
@include('components.toast')

<!-- Page Title -->
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">About Us</h1>
        <p class="text-slate-500 mt-1">Next User eXperience</p>
    </div>
</div>

<!-- Main Card -->
<div class="bg-white rounded-xs border border-slate-200 overflow-hidden">
    <div class="p-6 md:p-8 space-y-8">
        <!-- Indonesian -->
        <div class="relative group">
            <div class="flex items-center gap-3 mb-3">
                <span class="bg-red-50 text-red-700 text-xs font-bold px-2.5 py-1 rounded-xs border border-red-200 uppercase tracking-wider">ID</span>
                <h2 class="text-xl font-semibold text-slate-800">Bahasa Indonesia</h2>
            </div>
            <p class="text-slate-600 leading-relaxed text-base transition-colors group-hover:text-slate-900">
                <strong class="text-slate-900">NUX (Next User eXperience)</strong>, dirancang untuk membawa pengalaman pengguna ke tingkat selanjutnya. Dengan mengutamakan inovasi, kesederhanaan, dan efisiensi, NUX hadir sebagai solusi yang memberdayakan pengguna untuk mencapai produktivitas optimal dalam setiap interaksi. Filosofi kami adalah menciptakan platform yang intuitif dan berorientasi masa depan, di mana teknologi bukan hanya alat, tetapi mitra dalam perjalanan menuju kesuksesan.
            </p>
        </div>

        <hr class="border-slate-100">

        <!-- English -->
        <div class="relative group">
            <div class="flex items-center gap-3 mb-3">
                <span class="bg-blue-50 text-blue-700 text-xs font-bold px-2.5 py-1 rounded-xs border border-blue-200 uppercase tracking-wider">EN</span>
                <h2 class="text-xl font-semibold text-slate-800">English</h2>
            </div>
            <p class="text-slate-600 leading-relaxed text-base transition-colors group-hover:text-slate-900">
                <strong class="text-slate-900">NUX (Next User eXperience)</strong>, is designed to elevate user experiences to the next level. By prioritizing innovation, simplicity, and efficiency, NUX serves as a solution that empowers users to achieve optimal productivity in every interaction. Our philosophy is to create an intuitive and future-oriented platform where technology is not just a tool but a partner in the journey toward success.
            </p>
        </div>

        <hr class="border-slate-100">

        <!-- Thai -->
        <div class="relative group">
            <div class="flex items-center gap-3 mb-3">
                <span class="bg-purple-50 text-purple-700 text-xs font-bold px-2.5 py-1 rounded-xs border border-purple-200 uppercase tracking-wider">TH</span>
                <h2 class="text-xl font-semibold text-slate-800">ภาษาไทย</h2>
            </div>
            <p class="text-slate-600 leading-relaxed text-base transition-colors group-hover:text-slate-900">
                <strong class="text-slate-900">NUX (Next User eXperience)</strong>, ถูกออกแบบมาเพื่อยกระดับประสบการณ์ของผู้ใช้งานให้ก้าวไปอีกขั้น ด้วยการให้ความสำคัญกับนวัตกรรม ความเรียบง่าย และประสิทธิภาพ NUX จึงเป็นโซลูชันที่ช่วยให้ผู้ใช้งานสามารถบรรลุประสิทธิผลสูงสุดในทุกการใช้งาน ปรัชญาของเราคือการสร้างแพลตฟอร์มที่ใช้งานง่ายและมุ่งสู่อนาคต ซึ่งเทคโนโลยีไม่ได้เป็นเพียงเครื่องมือ แต่เป็นคู่คิดในเส้นทางสู่ความสำเร็จ
            </p>
        </div>
    </div>
</div>
@endsection