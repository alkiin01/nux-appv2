@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Banner/Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-12 text-center text-white">
            <h1 class="text-4xl font-bold mb-4 tracking-tight">About Us</h1>
            <p class="text-blue-100 text-lg font-medium">Next User eXperience</p>
        </div>

        <div class="p-8 md:p-12 space-y-10">
            <!-- Indonesian -->
            <div class="relative group">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-red-50 text-red-700 text-xs font-bold px-2.5 py-1 rounded-md border border-red-200 uppercase tracking-wider shadow-sm">ID</span>
                    <h2 class="text-xl font-semibold text-gray-800">Bahasa Indonesia</h2>
                </div>
                <p class="text-gray-600 leading-relaxed text-lg transition-colors group-hover:text-gray-900">
                    <strong class="text-gray-900">NUX (Next User eXperience)</strong>, dirancang untuk membawa pengalaman pengguna ke tingkat selanjutnya. Dengan mengutamakan inovasi, kesederhanaan, dan efisiensi, NUX hadir sebagai solusi yang memberdayakan pengguna untuk mencapai produktivitas optimal dalam setiap interaksi. Filosofi kami adalah menciptakan platform yang intuitif dan berorientasi masa depan, di mana teknologi bukan hanya alat, tetapi mitra dalam perjalanan menuju kesuksesan.
                </p>
            </div>

            <hr class="border-gray-100">

            <!-- English -->
            <div class="relative group">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-blue-50 text-blue-700 text-xs font-bold px-2.5 py-1 rounded-md border border-blue-200 uppercase tracking-wider shadow-sm">EN</span>
                    <h2 class="text-xl font-semibold text-gray-800">English</h2>
                </div>
                <p class="text-gray-600 leading-relaxed text-lg transition-colors group-hover:text-gray-900">
                    <strong class="text-gray-900">NUX (Next User eXperience)</strong>, is designed to elevate user experiences to the next level. By prioritizing innovation, simplicity, and efficiency, NUX serves as a solution that empowers users to achieve optimal productivity in every interaction. Our philosophy is to create an intuitive and future-oriented platform where technology is not just a tool but a partner in the journey toward success.
                </p>
            </div>

            <hr class="border-gray-100">

            <!-- Thai -->
            <div class="relative group">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-purple-50 text-purple-700 text-xs font-bold px-2.5 py-1 rounded-md border border-purple-200 uppercase tracking-wider shadow-sm">TH</span>
                    <h2 class="text-xl font-semibold text-gray-800">ภาษาไทย</h2>
                </div>
                <p class="text-gray-600 leading-relaxed text-lg transition-colors group-hover:text-gray-900">
                    <strong class="text-gray-900">NUX (Next User eXperience)</strong>, ถูกออกแบบมาเพื่อยกระดับประสบการณ์ของผู้ใช้งานให้ก้าวไปอีกขั้น ด้วยการให้ความสำคัญกับนวัตกรรม ความเรียบง่าย และประสิทธิภาพ NUX จึงเป็นโซลูชันที่ช่วยให้ผู้ใช้งานสามารถบรรลุประสิทธิผลสูงสุดในทุกการใช้งาน ปรัชญาของเราคือการสร้างแพลตฟอร์มที่ใช้งานง่ายและมุ่งสู่อนาคต ซึ่งเทคโนโลยีไม่ได้เป็นเพียงเครื่องมือ แต่เป็นคู่คิดในเส้นทางสู่ความสำเร็จ
                </p>
            </div>
        </div>
    </div>
</div>
@endsection